<?php

    session_start();

    require_once('config/config.php');

    require_once('helpers/database.php');
    require_once('helpers/format.php');
    require_once('helpers/system.php');

    spl_autoload_register(
        function($class_name){
            require_once('libraries/'. $class_name . '.php');
        }
    );