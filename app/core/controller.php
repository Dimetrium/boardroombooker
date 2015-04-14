<?php

class Controller
{
    /**
     * @var View holder of View Controller instance
     */
    protected $view;
    protected $lang;

    /**
     * Constructor
     *
     * Get instance of View Controller
     * @param int from controller category id
     */
    function __construct ()
    {

        /**
         * TEST SECTION
         */
//        if ( !isset( $this->lang ) )
//            $this->lang = 'en';
//
//        if ( !'' == $_POST[ 'lang' ] ) {
//            $lang = $_POST[ 'lang' ];
//            switch ( $lang ) {
//                case 'en':
//                    echo 'English selected';
//                    break;
//                case 'ru':
//                    echo 'Russian selected';
//                    break;
//
//            }
//        }
        /**
         * END TEST SECTION
         */

        $this->view = new View();

    }

    // the action caused the default
    function action_index ()
    {
    }
}
