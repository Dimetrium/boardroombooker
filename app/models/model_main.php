<?php

/**
 * Class Model_Main
 *
 * Gets all books from db
 */
class Model_Main extends Model
{

    /**
     * @return array
     */
    public function get_data ()
    {

        return $this->getAllBooks();

    }

    /**
     * @return array
     */
    public function getAllBooks ()
    {

        $query = <<<SQL
            SELECT book_id, book_title, img, price, full_text
            FROM xyz_books;
SQL;
        $result = $this->dbh->getRows( $query );
        $this->dbh = NULL;

        return $result;

    }


}