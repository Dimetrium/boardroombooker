<?php
spl_autoload_register( function ( $class )
        {
            include __DIR__ . '/core/' . strtolower($class) . '.php';

        });

Router::start();
