<?php 
/**
 * Custom Meta Box Class
 *
 * The Meta Box Class is used by including it in your plugin files and using its methods to 
 * create custom meta boxes for custom post types. It is meant to be very simple and 
 * straightforward. For name spacing purposes, All Types metabox ( meaning you can do anything with it )
 * is used. 
 *
 * This class is derived from Meta Box script by Rilwis<rilwis@gmail.com> version 3.2. which later was forked 
 * by Cory Crowley (email: cory.ivan@gmail.com) The purpose of this class is not to rewrite the script but to 
 * modify and change small things and adding a few field types that i needed to my personal preference. 
 * The original author did a great job in writing this class, so all props goes to him.
 * 
 * @version 3.1.1
 * @copyright 2011 - 2013
 * @author Ohad Raz (email: admin@bainternet.info)
 * @link http://en.bainternet.info
 * 
 * @license GNU General Public LIcense v3.0 - license.txt
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package MY Meta Box Class
 */

if ( ! class_exists( 'AT_Meta_Box') ) :

/**
 * All Types Meta Box class.
 *
 * @package All Types Meta Box
 * @since 1.0
 *
 * @todo Nothing.
 */
class AT_Meta_Box {
  
  
  
      
  
  
  /**
   * Begin Field.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_begin( $field, $meta) {
    echo "<td class='at-field'".(($this->inGroup === true)? " valign='top'": "").">";
    if ( $field['name'] != '' || $field['name'] != FALSE ) {
      echo "<div class='at-label'>";
        echo "<label for='{$field['id']}'>{$field['name']}</label>";
      echo "</div>";
    }
  }
  
  /**
   * End Field.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public 
   */
  public function show_field_end( $field, $meta=NULL ,$group = false) {
    //print description
    if ( isset($field['desc']) && $field['desc'] != '' )
      echo "<div class='desc-field'>{$field['desc']}</div>";
    echo "</td>";
  }
  
  /**
   * Show Field Text.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_text( $field, $meta) {  
    $this->show_field_begin( $field, $meta );
    echo "<input type='text' class='at-text".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}' value='{$meta}' size='30' ".( isset($field['style'])? "style='{$field['style']}'" : '' )."/>";
    $this->show_field_end( $field, $meta );
  }
  
  /**
   * Show Field number.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_number( $field, $meta) {  
    $this->show_field_begin( $field, $meta );
    $step = (isset($field['step']) || $field['step'] != '1')? "step='".$field['step']."' ": '';
    $min = isset($field['min'])? "min='".$field['min']."' ": '';
    $max = isset($field['max'])? "max='".$field['max']."' ": '';
    echo "<input type='number' class='at-number".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}' value='{$meta}' size='30' ".$step.$min.$max.( isset($field['style'])? "style='{$field['style']}'" : '' )."/>";
    $this->show_field_end( $field, $meta );
  }

  /**
   * Show Field code editor.
   *
   * @param string $field 
   * @author Ohad Raz
   * @param string $meta 
   * @since 2.1
   * @access public
   */
  public function show_field_code( $field, $meta) {
    $this->show_field_begin( $field, $meta );
    echo "<textarea class='code_text".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}' data-lang='{$field['syntax']}' ".( isset($field['style'])? "style='{$field['style']}'" : '' )." data-theme='{$field['theme']}'>{$meta}</textarea>";
    $this->show_field_end( $field, $meta );
  }
  
  
  /**
   * Show Field hidden.
   *
   * @param string $field 
   * @param string|mixed $meta 
   * @since 0.1.3
   * @access public
   */
  public function show_field_hidden( $field, $meta) {  
    //$this->show_field_begin( $field, $meta );
    echo "<input type='hidden' ".( isset($field['style'])? "style='{$field['style']}' " : '' )."class='at-text".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}' value='{$meta}'/>";
    //$this->show_field_end( $field, $meta );
  }
  
  /**
   * Show Field Paragraph.
   *
   * @param string $field 
   * @since 0.1.3
   * @access public
   */
  public function show_field_paragraph( $field) {  
    //$this->show_field_begin( $field, $meta );
    echo '<p>'.$field['value'].'</p>';
    //$this->show_field_end( $field, $meta );
  }
    
  /**
   * Show Field Textarea.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_textarea( $field, $meta ) {
    $this->show_field_begin( $field, $meta );
      echo "<textarea class='at-textarea large-text".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}' ".( isset($field['style'])? "style='{$field['style']}' " : '' )." cols='60' rows='10'>{$meta}</textarea>";
    $this->show_field_end( $field, $meta );
  }
  
  /**
   * Show Field Select.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_select( $field, $meta ) {
    
    if ( ! is_array( $meta ) ) 
      $meta = (array) $meta;
      
    $this->show_field_begin( $field, $meta );
      echo "<select ".( isset($field['style'])? "style='{$field['style']}' " : '' )." class='".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}" . ( $field['multiple'] ? "[]' id='{$field['id']}' multiple='multiple'" : "'" ) . ">";
      foreach ( $field['options'] as $key => $value ) {
        echo "<option value='{$key}'" . selected( in_array( $key, $meta ), true, false ) . ">{$value}</option>";
      }
      echo "</select>";
    $this->show_field_end( $field, $meta );
    
  }
  
  /**
   * Show Radio Field.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public 
   */
  public function show_field_radio( $field, $meta ) {
    
    if ( ! is_array( $meta ) )
      $meta = (array) $meta;
      
    $this->show_field_begin( $field, $meta );
      foreach ( $field['options'] as $key => $value ) {
        echo "<input type='radio' ".( isset($field['style'])? "style='{$field['style']}' " : '' )." class='at-radio".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' value='{$key}'" . checked( in_array( $key, $meta ), true, false ) . " /> <span class='at-radio-label'>{$value}</span>";
      }
    $this->show_field_end( $field, $meta );
  }
  
  /**
   * Show Checkbox Field.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_checkbox( $field, $meta ) {
    

    $this->show_field_begin($field, $meta);
    echo "<input type='checkbox' ".( isset($field['style'])? "style='{$field['style']}' " : '' )." class='rw-checkbox".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}'" . checked(!empty($meta), true, false) . " />";
    $this->show_field_end( $field, $meta );
      
  }
  
  
  /**
   * Show Switch Field.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_switch( $field, $meta ) {
    

    $this->show_field_begin($field, $meta);
    echo "<div class='checkbox-switch'>";
    echo "<input id='{$field['id']}' type='checkbox' name='{$field['id']}' class='input-checkbox ".( isset($field['class'])? ' ' . $field['class'] : '' )."' " . checked(!empty($meta), true, false) . ">";
    echo "<div class='checkbox-animate'><span class='checkbox-off'>OFF</span><span class='checkbox-on'>ON</span></div></div>";
    
    
    //echo "<input type='checkbox' ".( isset($field['style'])? "style='{$field['style']}' " : '' )." class='rw-checkbox".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}'" . checked(!empty($meta), true, false) . " />";
    $this->show_field_end( $field, $meta );
      
  }
  
  
  /**
   * Show Wysiwig Field.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_wysiwyg( $field, $meta,$in_repeater = false ) {
    $this->show_field_begin( $field, $meta );
    
    if ( $in_repeater )
      echo "<textarea class='".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}' cols='60' rows='10'>{$meta}</textarea>";
    else{
      // Use new wp_editor() since WP 3.3
      $settings = ( isset($field['settings']) && is_array($field['settings'])? $field['settings']: array() );
      $settings['editor_class'] = ''.( isset($field['class'])? ' ' . $field['class'] : '' );
      $id = $field['id'];
      wp_editor( html_entity_decode($meta), $id, $settings);
    }
    $this->show_field_end( $field, $meta );
  }
  
  /**
   * Show File Field.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_file( $field, $meta ) {
    wp_enqueue_media();
    $this->show_field_begin( $field, $meta );

    $std      = isset($field['std'])? $field['std'] : array('id' => '', 'url' => '');
    $multiple = isset($field['multiple'])? $field['multiple'] : false;
    $multiple = ($multiple)? "multiFile '" : "";
    $name     = esc_attr( $field['id'] );
    $value    = isset($meta['id']) ? $meta : $std;
    $has_file = (empty($value['url']))? false : true;
    $type     = isset($field['mime_type'])? $field['mime_type'] : '';
    $ext      = isset($field['ext'])? $field['ext'] : '';
    $type     = (is_array($type)? implode("|",$type) : $type);
    $ext      = (is_array($ext)? implode("|",$ext) : $ext);
    $id       = $field['id'];
    $li       = ($has_file)? "<li><a href='{$value['url']}' target='_blank'>{$value['url']}</a></li>": "";

    echo "<span class='simplePanelfilePreview'><ul>{$li}</ul></span>";
    echo "<input type='hidden' name='{$name}[id]' value='{$value['id']}'/>";
    echo "<input type='hidden' name='{$name}[url]' value='{$value['url']}'/>";
    if ($has_file)
      echo "<input type='button' class='{$multiple} button simplePanelfileUploadclear' id='{$id}' value='Remove File' data-mime_type='{$type}' data-ext='{$ext}'/>";
    else
      echo "<input type='button' class='{$multiple} button simplePanelfileUpload' id='{$id}' value='Upload File' data-mime_type='{$type}' data-ext='{$ext}'/>";

    $this->show_field_end( $field, $meta );
  }
  
  /**
   * Show Image Field.
   *
   * @param array $field 
   * @param array $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_image( $field, $meta ) {
    wp_enqueue_media();
    $this->show_field_begin( $field, $meta );
        
    $std          = isset($field['std'])? $field['std'] : array('id' => '', 'url' => '');
    $name         = esc_attr( $field['id'] );
    $value        = isset($meta['id']) ? $meta : $std;
    
    $value['url'] = isset($meta['src'])? $meta['src'] : $value['url']; //backwords capability
    $has_image    = empty($value['url'])? false : true;
    $w            = isset($field['width'])? $field['width'] : 'auto';
    $h            = isset($field['height'])? $field['height'] : 'auto';
    $PreviewStyle = "style='width: $w; height: $h;". ( (!$has_image)? "display: none;'": "'");
    $id           = $field['id'];
    $multiple     = isset($field['multiple'])? $field['multiple'] : false;
    $multiple     = ($multiple)? "multiFile " : "";

    echo "<span class='simplePanelImagePreview'><img {$PreviewStyle} src='{$value['url']}'><br/></span>";
    echo "<input type='hidden' name='{$name}[id]' value='{$value['id']}'/>";
    echo "<input type='hidden' name='{$name}[url]' value='{$value['url']}'/>";
    if ($has_image)
      echo "<input class='{$multiple} button  simplePanelimageUploadclear' id='{$id}' value='Remove Image' type='button'/>";
    else
      echo "<input class='{$multiple} button simplePanelimageUpload' id='{$id}' value='Upload Image' type='button'/>";
    $this->show_field_end( $field, $meta );
  }
  
  /**
   * Show Color Field.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_color( $field, $meta ) {
    
    if ( empty( $meta ) ) 
      $meta = '#';
      
    $this->show_field_begin( $field, $meta );
    if( wp_style_is( 'wp-color-picker', 'registered' ) ) { //iris color picker since 3.5
      echo "<input class='at-color-iris".(isset($field['class'])? " {$field['class']}": "")."' type='text' name='{$field['id']}' id='{$field['id']}' value='{$meta}' size='8' />";  
    }else{
      echo "<input class='at-color".(isset($field['class'])? " {$field['class']}": "")."' type='text' name='{$field['id']}' id='{$field['id']}' value='{$meta}' size='8' />";
      echo "<input type='button' class='at-color-select button' rel='{$field['id']}' value='" . __( 'Select a color' ,'apc') . "'/>";
      echo "<div style='display:none' class='at-color-picker' rel='{$field['id']}'></div>";
    }
    $this->show_field_end($field, $meta);
    
  }

  /**
   * Show Checkbox List Field
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_checkbox_list( $field, $meta ) {
    
    if ( ! is_array( $meta ) ) 
      $meta = (array) $meta;
      
    $this->show_field_begin($field, $meta);
    
      $html = array();
    
      foreach ($field['options'] as $key => $value) {
        $html[] = "<input type='checkbox' ".( isset($field['style'])? "style='{$field['style']}' " : '' )."  class='at-checkbox_list".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}[]' value='{$key}'" . checked( in_array( $key, $meta ), true, false ) . " /> {$value}";
      }
    
      echo implode( '<br />' , $html );
      
    $this->show_field_end($field, $meta);
    
  }
  
  /**
   * Show Date Field.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public
   */
  public function show_field_date( $field, $meta ) {
    $this->show_field_begin( $field, $meta );
      echo "<input type='date'  ".( isset($field['style'])? "style='{$field['style']}' " : '' )." class='at-date".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}' rel='{$field['format']}' value='{$meta}' size='30' />";
    $this->show_field_end( $field, $meta );
  }
  
  /**
   * Show time field.
   *
   * @param string $field 
   * @param string $meta 
   * @since 1.0
   * @access public 
   */
  public function show_field_time( $field, $meta ) {
    $this->show_field_begin( $field, $meta );
      $ampm = ($field['ampm'])? 'true' : 'false';
      echo "<input type='time'  ".( isset($field['style'])? "style='{$field['style']}' " : '' )." class='at-time".( isset($field['class'])? ' ' . $field['class'] : '' )."' name='{$field['id']}' id='{$field['id']}' data-ampm='{$ampm}' rel='{$field['format']}' value='{$meta}' size='30' />";
    $this->show_field_end( $field, $meta );
  }
  
   
} // End Class
endif; // End Check Class Exists