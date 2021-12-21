<?php 

/**
 * autoload.
 * @param $className
 */

function PLNAME_engine_loaders( $className ) {

    
    $ds = DIRECTORY_SEPARATOR;
    $dir = PLUGINCONSTANTNAME_PLUGIN_DIR;
    $numnamespase = intval(strlen(PLUGINCONSTANTNAME_ENGINE) + '1');
    $className = str_replace('\\', $ds, substr($className, $numnamespase));
    $file = "{$dir}{$ds}{$className}.php";
      
    if (is_readable($file)) require_once $file;
    
}
spl_autoload_register( 'PLNAME_engine_loaders', true, true );
