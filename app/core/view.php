<?php

class View
{

    function generate ( $content_view, $template_view, $data = array() )
    {

        foreach ( $data as $row ) {
            $data[ ] = $row;
        }
        $data = array_filter( $data );


        ob_start();
        include 'app/views/' . $template_view;
        $hz = ob_get_contents();
        ob_end_clean();

        $lang = 'en';
        $language = new Lang( $lang );
        $langArray = $language->getLang();
        $language->addToReplace( $langArray );
        echo $language->templateRender( $hz );

    }


}