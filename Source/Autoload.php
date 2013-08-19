<?php

spl_autoload_register(function ( $class ) {

    $root = __DIR__;

    if('Test' === substr($class, 0, strpos($class, '\\')))
        $root = dirname(__DIR__);

    require $root . DIRECTORY_SEPARATOR .
            str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
});
