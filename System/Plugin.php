<?php
namespace PLENGINE\System;
use PLENGINE\System\Controller;
/**
 *  Plugin
 * @package PLENGINE\System
 */
class Plugin {

	
	/**
	 * Plugin constructor.
	 */
	public function __construct() {
	  
      add_action( 'admin_menu',  array( $this , 'PLNAME_main_menu' )  );

      wp_enqueue_style( 'jquery_magnific_popup', PLUGINCONSTANTNAME_PLUGIN_URL . 'App/View/main/assets/css/magnific-popup.css' );
      wp_enqueue_style( 'frontend_css', PLUGINCONSTANTNAME_PLUGIN_URL . 'App/View/main/assets/css/frontend.css' );
      wp_enqueue_script( 'jquery_magnific_popup', PLUGINCONSTANTNAME_PLUGIN_URL . 'App/View/main/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ) );  
      wp_enqueue_script( 'jquery_main', PLUGINCONSTANTNAME_PLUGIN_URL . 'App/View/main/assets/js/frontend.js', array( 'jquery' ) );    

      wp_enqueue_style( 'at-meta-box', PLUGINCONSTANTNAME_PLUGIN_URL . '/System/meta-box-class/css/meta-box.css' );
      wp_enqueue_style( 'at-meta-box-codemirir', PLUGINCONSTANTNAME_PLUGIN_URL . '/System/meta-box-class/js/codemirror/codemirror.css' );
      wp_enqueue_style( 'at-code-css-dark', PLUGINCONSTANTNAME_PLUGIN_URL .'/System/meta-box-class/js/codemirror/solarizedDark.css',array(),null);
      wp_enqueue_style( 'at-code-css-light', PLUGINCONSTANTNAME_PLUGIN_URL .'/System/meta-box-class/js/codemirror/solarizedLight.css',array(),null);
      // Enqueue Meta Box Scripts
      wp_enqueue_script( 'at-meta-box', PLUGINCONSTANTNAME_PLUGIN_URL . '/System/meta-box-class/js/meta-box.js', array( 'jquery' ), null, true );
      wp_enqueue_script( 'at-meta-box-codemirror-js', PLUGINCONSTANTNAME_PLUGIN_URL . '/System/meta-box-class/js/codemirror/codemirror.js', array( 'jquery' ), null, true );
      wp_enqueue_script( 'at-meta-box-xml-js', PLUGINCONSTANTNAME_PLUGIN_URL . '/System/meta-box-class/js/codemirror/xml.js', array( 'jquery' ), null, true );
      wp_enqueue_script( 'at-meta-box-javascript-js', PLUGINCONSTANTNAME_PLUGIN_URL . '/System/meta-box-class/js/codemirror/javascript.js', array( 'jquery' ), null, true );
      wp_enqueue_script( 'at-meta-box-css-js', PLUGINCONSTANTNAME_PLUGIN_URL . '/System/meta-box-class/js/codemirror/css.js', array( 'jquery' ), null, true );
      wp_enqueue_script( 'at-meta-box-php-js', PLUGINCONSTANTNAME_PLUGIN_URL . '/System/meta-box-class/js/codemirror/php.js', array( 'jquery' ), null, true );

      wp_enqueue_script( 'media-upload' );
      add_thickbox();
      wp_enqueue_script( 'jquery-ui-core' );
      wp_enqueue_script('jquery-ui-datepicker');
      wp_enqueue_script( 'jquery-ui-sortable' );  

      $plugin_file = PLUGINCONSTANTNAME_BASENAME;
      add_filter( "plugin_action_links_$plugin_file", array( $this , 'PLNAME_settings_link' )  );
      
      register_setting( '_plnamesmol_plugin_options', '_plnamesmol_plugin_options' );
      register_setting( '_plnamesmol_plugin_comment', '_plnamesmol_plugin_comment' );
      register_setting( '_plnamesmol_plugin_meta', '_plnamesmol_plugin_meta' );

	}
    
    
    function PLNAME_settings_link($links) { 
        $settings_link = sprintf('<a href="%s">%s</a>', admin_url('admin.php?page=_plnamesmol_plugin_settings'), __( 'Settings', '_plnamesmol' )); 
        array_unshift( $links, $settings_link ); 
        return $links; 
    }

    
    
    function PLNAME_main_menu() {
         
        
        
        add_menu_page( 
            __( '_plnamesmol', '_plnamesmol' ), 
            __( '_plnamesmol', '_plnamesmol' ), 
            'edit_others_posts', 
            '_plnamesmol_plugin_home', 
            '_plnamesmol_plugin_home', 
            'dashicons-awards', 
            90 
        );

        add_submenu_page( 
            '_plnamesmol_plugin_home', //Название (slug) родительского меню в которое будет добавлен пункт или название файла админ-страницы WordPress.
            __( 'Settings', '_plnamesmol' ),  //Текст, который будет использован в теге title на странице.
            __( 'Settings', '_plnamesmol' ),  //Текст, который будет использован как название пункта меню.
            'manage_options',  //Возможность пользователя, чтобы иметь доступ к меню.
            '_plnamesmol_plugin_settings',   //Уникальное название (slug), по которому затем можно обращаться к этому меню.
            '_plnamesmol_plugin_settings',    //Название функции которая будет вызваться, чтобы вывести контент создаваемой страницы.
            1     //Позиция подпункта меню, относительно других подпунктов.  
        );
        
        add_submenu_page( 
            '_plnamesmol_plugin_home', //Название (slug) родительского меню в которое будет добавлен пункт или название файла админ-страницы WordPress.
            __( 'Faq', '_plnamesmol' ),  //Текст, который будет использован в теге title на странице.
            __( 'Faq', '_plnamesmol' ),  //Текст, который будет использован как название пункта меню.
            'manage_options',  //Возможность пользователя, чтобы иметь доступ к меню.
            '_plnamesmol_plugin_faq',   //Уникальное название (slug), по которому затем можно обращаться к этому меню.
            '_plnamesmol_plugin_faq',    //Название функции которая будет вызваться, чтобы вывести контент создаваемой страницы.
            2     //Позиция подпункта меню, относительно других подпунктов.  
        );
        
        
       
    }
    
    
    
    
 }