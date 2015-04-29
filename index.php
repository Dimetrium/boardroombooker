<?php
if ( !ini_get( 'date.timezone' ) ) {
    date_default_timezone_set( 'GMT' );
}

require_once 'config.php';

require_once 'app/bootstrap.php';
