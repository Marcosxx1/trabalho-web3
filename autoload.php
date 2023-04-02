<?php

  function autoload($class_name) {
    $dirs = array(
              'Models/',
              'Controller/',
              'Services/',
          );

        foreach( $dirs as $dir ) {
            if (file_exists($dir.$class_name.'.php')) {
                require_once($dir.$class_name.'.php');
                return;
            }
        }
    }

    spl_autoload_register("autoload");
 ?>
