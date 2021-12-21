<?php
namespace PLENGINE\App\Controllers;
use PLENGINE\System\Controller;

class Home extends Controller  {

	public $cats_array = array();
    
	/**
	 * Init functions
	 * @throws Controller
	 */
	public function init() {
	   
        $this->callAssets(
            array(
				'styles'  => array(
                    'main.min'
				),
				'scripts' => array(
					//'bootstrap.min',
                    'main.min'
				),
			),
			false,
			true
		);
        
        wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style( 'wp-pointer' );
        wp_enqueue_script( 'wp-pointer' );
        
        $this->callAssets(
			array(
				'scripts' => array(
					'handler',
				)
			)
		);
        
        
        $errors  = array();
        
        $option = get_option('_plnamesmol_plugin_options');
        $option2 = get_option('_plnamesmol_plugin_comment');
        $option3 = get_option('_plnamesmol_plugin_meta');
        
        $this->render(
			'index',
			array(
				'errors' => $errors ,
                'data' => array(
                    'test' => '100',
                    'test2' => '200',
                    'option' => $option,
                    'option2' => $option2,
                    'option3' => $option3,
                    )
					
			),
			true,
            'Home'
		);
        
        
        
	}
    
    
    
    
    
    
    
    
    
    
    
    
 }