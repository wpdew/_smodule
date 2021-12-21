<?php
/**
 * Plugin Name: PLNAME
 * Description: This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Plugin URI:  PLURI
 * Author URI:  _plautoruri
 * Author:      _plautornam
 *
 * Text Domain: _plnamesmol
 *
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * Version:     1.0.0
 */


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 
//defined( 'ABSPATH' ) or die( 'Silence is golden!' ); // prevent direct access

//Получает URL папки (директории, каталога), где находится указанный файл плагина (со слэшем на конце).
define( 'PLUGINCONSTANTNAME_PLUGIN_URL', plugin_dir_url(__FILE__)  );

//Получает системный путь до директории, где находится указанный файл (со слэшем на конце).
define( 'PLUGINCONSTANTNAME_PLUGIN_DIR',    plugin_dir_path( __FILE__ ) );
//Получаем путь до главного файла плагина
define( 'PLUGINCONSTANTNAME_BASENAME',   plugin_basename(__FILE__));

//Пространство имён
define( 'PLUGINCONSTANTNAME_ENGINE',   'PLENGINE');


//Автолоадер классов
require_once( PLUGINCONSTANTNAME_PLUGIN_DIR . 'App/autoload.php' );

//
load_plugin_textdomain( '_plnamesmol', false, PLUGINCONSTANTNAME_PLUGIN_DIR . 'App/Languages/' );

//run plugin
$plugin = new PLENGINE\System\Plugin();

//
require_once( PLUGINCONSTANTNAME_PLUGIN_DIR . 'functions.php' );

//Template_Loader
if(!class_exists('Gamajo_Template_Loader')){
    require PLUGINCONSTANTNAME_PLUGIN_DIR . '/System/template-loader/class-gamajo-template-loader.php';
}
require PLUGINCONSTANTNAME_PLUGIN_DIR . '/System/template-loader/template-loader.php';
require PLUGINCONSTANTNAME_PLUGIN_DIR . '/System/meta-box-class/meta-box-class.php';

//update-checker.php
require_once PLUGINCONSTANTNAME_PLUGIN_DIR . '/System/update-checker/update-checker.php';
//$my_update_checker = \Puc_v4_Factory::buildUpdateChecker( 'https://api.sait.com/plugins/withoutwater/version.json', __FILE__, SSS_PLUGIN_DIR );
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/usergit/_plnamesmol',
	__FILE__,
	'_plnamesmol'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

//Optional: If you're using a private repository, specify the access token like this:
//$myUpdateChecker->setAuthentication('your-token-here');

