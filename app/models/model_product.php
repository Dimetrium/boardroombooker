<?php

class Model_Product extends Model
{
  /**
   * Get selected single book details
   *
   * @return array
   */
  public function get_data ()
  {
    return $this->getBook();
  }

  /**
   * @return array
   */
  public function getBook ()
  {
    /**
     * Parse URI for get ID of book
     * @var $param stored book id
     */
    $segments = explode( '/', trim( $_SERVER[ 'REQUEST_URI' ], '/' ) );
    $param = $segments[ 2 ];
    $query = <<<SQL
    SELECT DISTINCT xyz_books.book_id, price, book_title, img, full_text,
    GROUP_CONCAT(DISTINCT author_title) AS author_title,
    GROUP_CONCAT(DISTINCT genre_title SEPARATOR ', ') AS genre_title
    FROM xyz_books, xyz_authors, xyz_genres
    INNER JOIN xyz_byauth, xyz_bycat
    WHERE xyz_books.book_id = xyz_byauth.book_id
    AND xyz_authors.author_id = xyz_byauth.auth_id
    AND xyz_books.book_id = xyz_bycat.book_id
    AND xyz_genres.genre_id = xyz_bycat.cat_id
    AND xyz_books.book_id = :id
    GROUP BY book_title;
SQL;

    $result = $this->dbh->getRows( $query, array( 'id' => $param ) );
    $this->dbh = null;

    return $result[0];

  }

}
