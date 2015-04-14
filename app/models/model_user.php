<?php

class Model_User extends Model
{
    private $param;

    public function __construct ()
    {
        parent::__construct();

        // Get id from URI
        $segments = explode( '/', trim( $_SERVER[ 'REQUEST_URI' ], '/' ) );
        $this->param = $segments[ 2 ];
    }

    /**
     * @return array
     */
    public function get_data ()
    {
        $query = <<<SQL
            SELECT
              xyz_cart_order.order_id,
              discount,
              price,
              name,
              book_title,
              pay_status_name,
              quantity,
              pay_method_name,
              date
            FROM
              xyz_users,
              xyz_books,
              xyz_cart_order,
              xyz_orders,
              xyz_pay_status,
              xyz_payment_method
            WHERE xyz_users.user_id = :id
            AND xyz_cart_order.book_id = xyz_books.book_id
            AND xyz_orders.pay_status_id = xyz_pay_status.pay_status_id
            AND xyz_cart_order.order_id = xyz_orders.order_id
            AND xyz_orders.pay_method_id = xyz_payment_method.pay_method_id
SQL;

        if ( true == ( $last_id = $this->new_user() ) ) {
            $data = $this->dbh->getRows( $query, array( 'id' => $last_id ) );
            $this->dbh = null;
        } else {
            $data = $this->dbh->getRows( $query, array( 'id' => $this->param ) );
            $this->dbh = null;
        }

        return $data;
    }

    /**
     * Creates a new user and return its id.
     *
     * @return int
     */
    private function new_user ()
    {

        if ( !null == ( $_POST[ 'name' ] && $_POST[ 'password' ] ) ) {
            $name = trim( $_POST[ 'name' ] );
            $password = trim( $_POST[ 'password' ] );
        }

        $query = <<<SQL
            INSERT INTO xyz_users (name, password)
			VALUES (:name, :password);
SQL;
        $this->dbh->insertRow( $query, array(
            'name' => $name,
            'password' => $password ) );
        return $this->dbh->lastInsertId();

    }

    /**
     * Get user details
     *
     * @return array
     */
/*    public function getUser ()
    {


        $query = <<<SQL
        SELECT *
        FROM xyz_books, xyz_authors
		INNER JOIN xyz_byauth
		WHERE xyz_books.book_id = xyz_byauth.book_id
        AND xyz_authors.author_id = xyz_byauth.auth_id
        AND author_id = :id ;
SQL;
        $data = $this->dbh->getRows( $query, array( 'id' => $this->param ) );
        $this->dbh = null;

        return $data;
    }*/

}
