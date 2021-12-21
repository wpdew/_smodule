<?php

//
function PLNAME_plugin_home(){
    $installerss = new PLENGINE\App\Controllers\Home;
    $installerss->init();
}


//
function PLNAME_plugin_settings(){
    $installerss = new PLENGINE\App\Controllers\Settings;
    $installerss->init();
}

//
function PLNAME_plugin_faq(){
    $installerss = new PLENGINE\App\Controllers\Faq;
    $installerss->init();
}




add_action( 'PLNAME_wp_enqueue_scripts', 'PLNAME_my_scripts_method' );
function PLNAME_my_scripts_method(){
	wp_enqueue_script( 'jquery' );
}


//Add donate lincks
add_filter( 'plugin_row_meta', 'PLNAME_add_plugin_row_meta', 10, 2);
function PLNAME_add_plugin_row_meta($meta, $file) {
	if ($file == PLUGINCONSTANTNAME_BASENAME) {
		$meta[] = sprintf('<a href="%s" target="_blank">%s</a>', 'https://www.wpdew.ru/donate', __( 'Donate', '_plnamesmol' ));
	}
	return $meta;
}

