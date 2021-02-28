<?php

    require_once __DIR__ . "/support/config.php";
    require_once __DIR__ . "/support/helper.php";

    spl_autoload_register(function($class) {
        $nameSpace = "source\\";
        $diretorioRaiz = __DIR__."/";
        $len = strlen($nameSpace);

        if(strncmp($nameSpace, $class, $len) !== 0){
            return;
        }

        $relativeClass = substr($class, $len);
        $file = $diretorioRaiz . str_replace("\\", "/", $relativeClass) . ".php";

        if(file_exists($file)){
            require $file;
        }
    });



