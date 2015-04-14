<?php

class View
{


    function generate ( $content_view, $template_view, $data = array() )
    {

        foreach ( $data as $row ) {
            $data[ ] = $row;
        }
        $data = array_filter( $data );
        $genres = self::GenreMenu();
        $authors = self::AuthorMenu();

        ob_start();
        include 'app/views/' . $template_view;
        $hz = ob_get_contents();
        ob_end_clean();

        $lang = 'ru';
        $language = new Lang( $lang );
        $langArray = $language->getLang();
        $language->addToReplace( $langArray );
        echo $language->templateRender( $hz );

    }

    /**
     * temporary 'kostely' for generate category/author list
     *
     * TODO: Move this 'kostyl's' to main model
     *
     */
    function GenreMenu ()
    {
        $dbh = DBConnect::getInstance();
        $dbh->getConnection();
        $query = <<<SQL
            SELECT *
            FROM  `xyz_genres`
            ORDER BY  `genre_id`;
SQL;
        $genres = $dbh->getRows( $query );
        $dbh = NULL;

        return $genres;

    }

    function AuthorMenu ()
    {
        $dbh = DBConnect::getInstance();
        $dbh->getConnection();

        $query = <<<SQL
            SELECT *
            FROM  `xyz_authors`
            ORDER BY  `author_title`;
SQL;
        $author = $dbh->getRows( $query );
        $dbh = NULL;

        return $author;

    }
    /**
     * End 'Kostyl'
     */
}