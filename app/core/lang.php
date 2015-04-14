<?php

class Lang
{
    private $file;
    private $data;
    private $template;
    private $forRender;

    public function __construct ( $lang )
    {
        $this->file = simplexml_load_file( 'app/views/lang/' . $lang . '.string' );
        $this->loadData();
//        var_dump($this->loadData());

    }

    private function loadData ()
    {
        foreach ( $this->file->children() as $pairs ) {
            $lang_key[ ] = $pairs->KEY;
            $lang_value[ ] = $pairs->VALUE;
        }

        return $this->data = array_combine( (array)$lang_key, (array)$lang_value );

    }

    public function getLang ()
    {
        return $this->data;
    }

    public function addToReplace ( $keys )
    {
        foreach ( $keys as $key => $val ) {
            $this->forRender[ $key ] = $val;
        }
        return $this->forRender;
    }

    public function templateRender (/*$template, */$ob_data)
    {
        $this->template = /*file_get_contents( 'app/views/' . $template ) |*/ $ob_data;

        foreach ( $this->forRender as $key => $val ) {
            $this->template = str_replace( $key, $val,  $this->template );
        }
        return $this->template;
    }


}
