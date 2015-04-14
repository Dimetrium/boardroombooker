<?php

class Model_Admin extends Model
{
    protected $data = array();

    public function get_data ()
    {
        self::getAllBooks();
        return $this->data;
    }

    public function getAllBooks ()
    {
        $query = <<<SQL
        SELECT book_id, book_title, img, price, full_text
		FROM xyz_books;
SQL;
        $this->data = $this->dbh->getRows($query);
        $this->dbh = null;

    }

    public function getBook ()
    {
        $segments = explode( '/', trim( $_SERVER[ 'REQUEST_URI' ], '/' ) );
        $param = $segments[ 4 ];

        $query = <<<SQL
            SELECT DISTINCT xyz_books.book_id, price, book_title, img, full_text, GROUP_CONCAT(DISTINCT author_title)
		as author_title, GROUP_CONCAT(DISTINCT genre_title SEPARATOR ', ')
		as genre_title
		FROM xyz_books, xyz_authors, xyz_genres
		INNER JOIN xyz_byauth, xyz_bycat
		WHERE xyz_books.book_id = xyz_byauth.book_id
		and xyz_authors.author_id = xyz_byauth.auth_id
		and xyz_books.book_id = xyz_bycat.book_id
		and xyz_genres.genre_id = xyz_bycat.cat_id
		and xyz_books.book_id = :id
		GROUP BY book_title;
SQL;

        $data = $this->dbh->getRows( $query, array( 'id' => $param ) );
        $this->dbh = null;
        return $data;

    }


}
