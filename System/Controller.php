<?php
namespace PLENGINE\System;


class Controller extends \Exception {


	/**
	 * Array of child class instances
	 */
	private static $instances = array();
	/**
	 * Get class instance.
	 *
	 * @return static
	 */
	public static function getInstance() {
		$class = get_called_class();
		if ( ! isset( self::$instances[ $class ] ) ) {
			self::$instances[ $class ] = new $class();
		}

		return self::$instances[ $class ];
	}
    
    
    /**
	 * Call assets
	 * @param array $params
	 * @param null $object
	 * @param false $global
	 * @param array $dependencies
	 */
	public function callAssets( array $params, $object = null, $global = false, $dependencies = array() ) {
		foreach ( $params as $param_key => $param_value ) {
			switch ( $param_key ) {
				case 'styles':
					foreach ( array_reverse( $param_value ) as $style ) {
						wp_enqueue_style(
							'ss-' . $style,
							( join(
								'/',
								array(
									PLUGINCONSTANTNAME_PLUGIN_URL,
									'App',
									'View',
									$global ? 'main' : $this->getName( ( $object ) ? $object : get_class( $this ) ),
									'assets',
									'css',
									$style,
								)
							)
							) . '.css'
						);
					}
					break;
				case 'scripts':
					foreach ( array_reverse( $param_value ) as $script ) {
						wp_enqueue_script(
							'ss-' . $script,
							(
								join(
									'/',
									array(
										PLUGINCONSTANTNAME_PLUGIN_URL,
										'App',
										'View',
										$global ? 'main' : $this->getName( ( $object ) ? $object : get_class( $this ) ),
										'assets',
										'js',
										$script,
									)
								)
							) . '.js',
							$dependencies
						);
					}
					break;
			}
		}
	}
    
    
    /**
	 * @param $filename
	 * @param $params
	 * @param $controller_name
	 * @return string
	 * @throws Controller
	 */
	private function _render_( $filename, $params, $controller_name ) {
		$file = join(
			'/',
			array(
                PLUGINCONSTANTNAME_PLUGIN_DIR,
                'App',
				'View',
				$controller_name,
				//'templates',
				$filename . '.php',
			)
		);
        
		if ( file_exists( $file ) ) {
			ob_start();
			extract( $params );
			require( $file );
			return ob_get_clean();
		} else {
			throw new Controller( 'Error loading template: ' . $file );
		}
        
	}

	/**
	 * @param $filename
	 * @param array $params
	 * @param bool $display
	 * @param null $object
	 * @return string
	 * @throws Controller
	 */
	public function render( $filename, $params = array(), $display = false, $object = null ) {
		if ( $display ) {
			echo self::_render_( $filename, $params, $this->getName( ( $object ) ? $object : get_class( $this ) ) );
		} else {
			return self::_render_( $filename, $params, $this->getName( ( $object ) ? $object : get_class( $this ) ) );
		}
		return false;
	}
    
    
    
   



    /**
	 * Get class name without namespaces
	 * @param $object
	 * @return string
	 */
	public function getName( $object ) {
		$path = explode( '\\', $object );
		return strtolower( array_pop( $path ) );
	}
    
    

}