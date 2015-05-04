<?php

class Lang
{
    private $xmlFile;

    public function __construct ( $lang )
    {

        $this->xmlFile = simplexml_load_file( 'app/views/lang/' . $lang . '.string' );

    }

    /**
     * @param $ob_data - the output buffering data (HTML) with {{REP_KEY}} placeholder.
     *
     * @return mixed html page with replaced placeholders
     */
    public function templateRender ( $ob_data )
    {

        foreach ( $this->addToReplace() as $key => $val ) {
            $ob_data = str_replace( $key, $val, $ob_data );
        }

        return $ob_data;

    }

    /**
     * @param array - sets {{REP_KEY}}
     *
     * @return array
     */
    public function addToReplace ()
    {

        foreach ( $this->loadData() as $key => $val ) {
            $forRender[ $key ] = $val;
        }

        return $forRender;

    }

    /**
     * @return array
     */
    private function loadData ()
    {

        foreach ( $this->xmlFile->children() as $pairs ) {
            $lang_key[ ] = $pairs->KEY;
            $lang_value[ ] = $pairs->VALUE;
        }

        return array_combine( (array)$lang_key, (array)$lang_value );

    }


}
