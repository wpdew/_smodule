<?php
//echo '<h2>'. get_admin_page_title() .'</h2>';
//var_dump($params);
/*macbd с контролера
$data['test'];
$data['test2'];
*/

$options = $data['option'];
$option2 = $data['option2'];
$option3 = $data['option3'];

$templates = new PLUGINCONSTANTNAME_Template_Loader();

?>

<div class="wrap">
	<div class="float-right"><button type="button" class="btn btn-primary category_add" data-toggle="modal" data-target="#ss-rm-modalWindow"><?php esc_html_e( 'Add New Category', '_plnamesmol' ); ?></button></div>
	<h2 class="admin-page-title"><?php echo '<h2>'. get_admin_page_title() .'</h2>'; ?></h2>
	
   
<div class="inner-block">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ss-rm-breadcrumb">
        <!--<li class="breadcrumb-item">Таблица</li>-->
        </ol>
    </nav>
        

    <div class="row">
		<div class="col-md-3 col-sm-12">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<a class="nav-link active show" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true"><?php esc_html_e( 'General', '_plnamesmol' ); ?></a>
				<a class="nav-link" id="v-pills-comments-tab" data-toggle="pill" href="#v-pills-comments" role="tab" aria-controls="v-pills-comments" aria-selected="false"><?php esc_html_e( 'Comments', '_plnamesmol' ); ?></a>
				<a class="nav-link" id="v-pills-template-tab" data-toggle="pill" href="#v-pills-template" role="tab" aria-controls="v-pills-template" aria-selected="false"><?php esc_html_e( 'Template', '_plnamesmol' ); ?></a>
				<a class="nav-link" id="v-pills-metabox-tab" data-toggle="pill" href="#v-pills-metabox" role="tab" aria-controls="v-pills-metabox" aria-selected="false"><?php esc_html_e( 'Metabox Example', '_plnamesmol' ); ?></a>
				
            </div>
		</div>
		<div class="col-md-9 col-sm-12">




			<div class="tab-content" id="v-pills-tabContent">
				<div class="tab-pane active show" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
					<?php //var_dump($data['option']); ?>
                    <form action="options.php" method="post">
                        <?php 
                        settings_fields( '_plnamesmol_plugin_options' );
                       //var_dump($options); 
                        echo "<input id='_plnamesmol_setting_api_key' name='_plnamesmol_plugin_options[api_key]' type='text' value='".esc_attr( $options['api_key'] )."' />";

                        //do_settings_sections( 'dbi_example_plugin' ); ?>
                        
                    
                    
                    
                    <br />
                    
                    
                    
                    
                        <div class="form-group">
							<label for="_plnamesmol_plugin_enabled"><b><?php esc_html_e( 'Plugin enabled', '_plnamesmol' ); ?></b></label>
							<p class="help-block"><?php esc_html_e( 'Determines whether the plug-in is enabled. If not, the following message will be displayed.', '_plnamesmol' ); ?></p>
							<select id="_plnamesmol_plugin_enabled" class="form-control" name="_plnamesmol_plugin_options[enabled]">
								<option value="1" <?php echo selected( 1 === (int) $options['enabled'] ); ?>><?php esc_html_e( 'Yes', '_plnamesmol' ); ?></option>
								<option value="0" <?php echo selected( 0 === (int) $options['enabled'] ); ?>><?php esc_html_e( 'No', '_plnamesmol' ); ?></option>
							</select>
						</div>
                        <div class="form-group">
							<label for="disabled_message"><b><?php esc_html_e( 'Disabled plugin message', '_plnamesmol' ); ?></b></label>
							<p class="help-block"><?php esc_html_e( 'Displays on frontend if plugin disabled.', '_plnamesmol' ); ?></p>
							<input type="text" id="disabled_message" class="form-control" name="_plnamesmol_plugin_options[message]" value="<?php echo esc_attr( $options['message'] ); ?>">
						</div>
                        <div class="form-group">
								<label for="_plnamesmol_background_color"><b><?php esc_html_e( 'Main Background Color', '_plnamesmol' ); ?></b></label>
								<p class="help-block"></p>
								<input class="form-control color-picker" name="_plnamesmol_plugin_options[background_color]" id="_plnamesmol_background_color" value="<?php echo esc_attr( $options['background_color']  ); ?>" />
							</div>
                        <div class="panel-footer">
							<input type="hidden" name="csrf" value="sdf" />
							<button type="submit" class="btn btn-outline-success btn-lg" data-spinner-size="40" data-style="zoom-in">
								<?php esc_html_e( 'Save Changes', '_plnamesmol' ); ?>
							</button>
                            
                            <button class="btn btn-success ss-rm-locked"><?php esc_html_e( 'Save Changes Locked', '_plnamesmol' ); ?></button>
                            
						</div>
					</form>
				</div>
                
                
                
                <div class="tab-pane" id="v-pills-comments" role="tabpanel" aria-labelledby="v-pills-comments-tab">
					<form method="post" action="options.php">
						<?php
                        settings_fields( '_plnamesmol_plugin_comment' );
                       //var_dump($option2); 
                       ?>
                       
                        <div class="form-group">
							<label for="comments_enabled"><b><?php esc_html_e( 'Comments enabled', '_plnamesmol' ); ?></b></label>
							<p class="help-block"><?php esc_html_e( 'Determines whether the comments are globally enabled.', '_plnamesmol' ); ?></p>
							<select id="comments_enabled" class="form-control" name="_plnamesmol_plugin_comment[enabled]">
								<option value="1" <?php echo selected( 1 === (int) $option2['enabled'] ); ?>><?php esc_html_e( 'Yes', '_plnamesmol' ); ?></option>
								<option value="0" <?php echo selected( 0 === (int) $option2['enabled'] ); ?>><?php esc_html_e( 'No', '_plnamesmol' ); ?></option>
							</select>
						</div>
                        <div class="panel-footer">
							<input type="hidden" name="csrf" value="sdf" />
							<button type="submit" class="btn btn-outline-success btn-lg" data-spinner-size="40" data-style="zoom-in">
								<?php esc_html_e( 'Save Changes', '_plnamesmol' ); ?>
							</button>
						</div>
                    </form>
                </div>
                
                
                
                
                <div class="tab-pane" id="v-pills-template" role="tabpanel" aria-labelledby="v-pills-template-tab">
					<form method="post" action="options.php">
						<?php
                        //settings_fields( '_plnamesmol_plugin_comment' );
                       //var_dump($option2); 
                       ?>
                       
                        <div class="form-group">
                            <?php $templates->get_template_part('faq', 'main'); ?>
						</div>
                    </form>
                </div>
                
                
                
                
                
                
                <div class="tab-pane" id="v-pills-metabox" role="tabpanel" aria-labelledby="v-pills-metabox-tab">
					<form method="post" action="options.php">
						<?php
                        settings_fields( '_plnamesmol_plugin_meta' );
                        //var_dump($option3); 
                        $my_meta = new AT_Meta_Box();
                       ?>
                       
                        <div class="form-group">
                            <?php 
                            
                            $field_text = array(
                            'id' => '_plnamesmol_plugin_meta[first_field_text]',
                            'class' => 'form-control',
                            'style'=> '',
                            'name' => 'Name fild text',
                            'desc' => 'Help Description fild text'
                            );
                            $my_meta->show_field_text($field_text, $option3['first_field_text']); 
                            
                            ?>
						</div>
                        
                        
                        <div class="form-group">
							<?php 
                            
                            $field_number = array(
                            'id' => '_plnamesmol_plugin_meta[first_field_number]',
                            'class' => 'form-control',
                            'style'=> 'color:red;',
                            'name' => 'Name fild number',
                            'desc' => 'Help Description fild number',
                            'step' => '10',
                            'min' => '1',
                            'max' => '100',
                            );
                            $my_meta->show_field_number($field_number, $option3['first_field_number']); 
                            
                            ?>
						</div>
                        
                        
                        <div class="form-group">
							<?php 
                            
                            $field_code_css = array(
                            'id' => '_plnamesmol_plugin_meta[first_field_code_css]',
                            'class' => 'form-control',
                            'style'=> '',
                            'name' => 'Name fild code css',
                            'desc' => 'Help Description fild code',
                            'theme' => 'dark',
                            'syntax' => 'css'
                            );
                            $my_meta->show_field_code($field_code_css, $option3['first_field_code_css']); 
                            
                            ?>
						</div>
                        
                        
                        <div class="form-group">
							<?php 
                            
                            $field_code_js = array(
                            'id' => '_plnamesmol_plugin_meta[first_field_code_js]',
                            'class' => 'form-control',
                            'style'=> '',
                            'name' => 'Name fild code javascript',
                            'desc' => 'Help Description fild code',
                            'theme' => 'dark',
                            'syntax' => 'javascript'
                            );
                            $my_meta->show_field_code($field_code_js, $option3['first_field_code_js']); 
                            
                            ?>
						</div>
                        
                        
                        <div class="form-group">
							<?php 
                            
                            $field_code_html = array(
                            'id' => '_plnamesmol_plugin_meta[first_field_code_html]',
                            'class' => 'form-control',
                            'style'=> '',
                            'name' => 'Name fild code html or php',
                            'desc' => 'Help Description fild code',
                            'theme' => 'light',
                            'syntax' => 'html'
                            );
                            $my_meta->show_field_code($field_code_html, $option3['first_field_code_html']); 
                            
                            ?>
						</div>
                        
                        
                        <div class="form-group">
							<?php 
                            
                            $field_code_field_textarea = array(
                            'id' => '_plnamesmol_plugin_meta[code_textarea]',
                            'class' => 'form-control',
                            'style'=> '',
                            'name' => 'Name fild code html or php',
                            'desc' => 'Help Description fild code'
                            );
                            $my_meta->show_field_textarea($field_code_field_textarea, $option3['code_textarea']); 
                            
                            ?>
						</div>
                        
                        
                        <div class="form-group">
							<?php 
                            
                            $field_code_field_select = array(
                            'id' => '_plnamesmol_plugin_meta[code_select]',
                            'class' => 'form-control',
                            'style'=> '',
                            'name' => 'Name fild select',
                            'desc' => 'Help Description fild code',
                            'options' => array(
                                'selectkey1'=>'Select Value1',
                                'selectkey2'=>'Select Value2'
                            )
                            );
                            $my_meta->show_field_select($field_code_field_select, $option3['code_select']); 
                            
                            ?>
						</div>
                        
                        
                        
                        <div class="form-group">
							<?php 
                            
                            $field_code_field_wysiwyg = array(
                            'id' => '_plnamesmol_plugin_meta[code_wysiwyg]',
                            'class' => 'form-control',
                            'style'=> '',
                            'name' => 'Name fild wysiwyg',
                            'desc' => 'Help Description fild wysiwyg',
                            'settings' => array(
                            	'textarea_rows' => 10,
                                'id' => 13
                            )
                            );
                            
                            
                            $my_meta->show_field_wysiwyg($field_code_field_wysiwyg, $option3['code_wysiwyg']); 
                            
                            ?>
						</div>
                        
                        
                        
                        <div class="form-group">
							<?php 
                            
                            $field_radio = array(
                            'id' => '_plnamesmol_plugin_meta[code_radio]',
                            'class' => 'form-control',
                            'style'=> '',
                            'name' => 'Name fild radio',
                            'desc' => 'Help Description fild radio',
                            'options' => array(
                                'radiokey1'=>'Radio Value1',
                                'radiokey2'=>'Radio Value2'
                            )
                            );
                            
                            $my_meta->show_field_radio($field_radio, $option3['code_radio']); 
                            
                            ?>
						</div>
                        
                        <div class="form-group">
							<?php 
                            
                            $field_checkbox = array(
                            'id' => '_plnamesmol_plugin_meta[code_checkbox]',
                            'class' => 'input-checkbox',
                            'style'=> '',
                            'name' => 'Name fild checkbox',
                            'desc' => 'Help Description fild checkbox'
                            );
                            
                            $my_meta->show_field_checkbox($field_checkbox, $option3['code_checkbox']); 
                            
                            ?>
						</div>
                        
                        
                        
                        <div class="form-group">
							<?php 
                            
                            $field_switch = array(
                            'id' => '_plnamesmol_plugin_meta[code_switch]',
                            'class' => 'input-checkbox',
                            'style'=> '',
                            'name' => 'Name fild switch',
                            'desc' => 'Help Description fild switch'
                            );
                            
                            $my_meta->show_field_switch($field_switch, $option3['code_switch']); 
                            
                            ?>
						</div>
                        
                        
                        
                        
                        <div class="form-group">
							<?php 
                            
                            $field_image = array(
                            'id' => '_plnamesmol_plugin_meta[code_image]',
                            'class' => 'form-control',
                            'name' => 'Name fild image',
                            'desc' => 'Help Description fild image'
                            );
                            
                            $my_meta->show_field_image($field_image, $option3['code_image']); 
                            
                            ?>
						</div>
                        
                        
                        
                        
                       
                        
                        
                        <div class="form-group">
							<?php 
                            
                            $field_date = array(
                            'id' => '_plnamesmol_plugin_meta[code_date]',
                            'class' => 'form-control col-md-6',
                            'style' => '',
                            'name' => 'Name fild date',
                            'desc' => 'Help Description fild date',
                            'format' => 'yy-mm-dd',
                            );
                            
                            $my_meta->show_field_date($field_date, $option3['code_date']); 
                            
                            ?>
						</div>
                        
                        
                        <div class="form-group">
							<?php 
                            
                            $field_time = array(
                            'id' => '_plnamesmol_plugin_meta[code_time]',
                            'class' => 'form-control col-md-6',
                            'style' => '',
                            'name' => 'Name fild time',
                            'desc' => 'Help Description fild time',
                            'format' => 'hh:mm',
                            'ampm' => true
                            );
                            
                            $my_meta->show_field_time($field_time, $option3['code_time']); 
                            
                            ?>
						</div>
                        
                         <div class="form-group">
							<?php 
                            
                            $field_color = array(
                            'id' => '_plnamesmol_plugin_meta[code_color]',
                            'class' => 'form-control',
                            'name' => 'Name fild color',
                            'desc' => 'Help Description fild color',
                            );
                            
                            $my_meta->show_field_color($field_color, $option3['code_color']); 
                            
                            ?>
						</div>
                        
                        
                        
                        
                        <div class="form-group">
							metabox 2
						</div>
                        
                        
                        <div class="panel-footer">
							<input type="hidden" name="csrf" value="sdf" />
							<button type="submit" class="btn btn-outline-success btn-lg" data-spinner-size="40" data-style="zoom-in">
								<?php esc_html_e( 'Save Changes', '_plnamesmol' ); ?>
							</button>
						</div>
                    </form>
                </div>
                
                
                
                
            
            </div>
            
            
         </div>
    </div>
    
    
    
     
        
</div>
    
    
    
    
    
</div>




<!-- The modal -->
<div class="modal bs-modal fade" id="ss-rm-modalWindow" tabindex="-1" role="dialog" aria-labelledby="ss-rm-modalWindowLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ss-rm-modalWindowLabel">xcvxvc</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="block-category">
					<div class="form-group">
						<div class="form-row">
							<div class="col-sm-6">
								<label for="name" class="col-form-label"><?php esc_html_e( 'Name', '_plnamesmol' ); ?></label>
								<input type="text" class="form-control" name="name" id="name">
								<small id="name-error-msg" class="text-danger error-msg"></small>
							</div>
							<div class="col-sm-6">
								<label for="catId" class="col-form-label"><?php esc_html_e( 'Parent Category', '_plnamesmol' ); ?></label>
								<select class="form-control" name="catId" id="catId"><?php echo $all_cats_and_sub_cats; ?></select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-sm-6">
								<label for="url" class="col-form-label"><?php esc_html_e( 'URL (slug)', '_plnamesmol' ); ?></label>
								<input type="text" class="form-control" name="url" id="url">
								<small id="url-error-msg" class="text-danger error-msg"></small>
							</div>
							<div class="col-sm-6">
								<label for="short_name" class="col-form-label"><?php esc_html_e( 'Short Name (for quick search)', '_plnamesmol' ); ?></label>
								<input type="text" class="form-control" name="short_name" id="short_name">
								<small id="short-name-error-msg" class="text-danger error-msg"></small>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-sm-12">
								<label for="description" class="col-form-label"><?php esc_html_e( 'Description', '_plnamesmol' ); ?></label>
								<textarea name="description" id="description" class="form-control" rows="4"></textarea>
								<small id="description-error-msg" class="text-danger error-msg"></small>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="image" class="col-form-label"><?php esc_html_e( 'Image', '_plnamesmol' ); ?></label>
						<p class="uploaded-img-block ss-rm-hide">
							<img class="uploaded-img" src="" alt="" width="200px" />
						</p>
						<p>
							<input type="button" class="button upload-image-button" value="<?php esc_attr_e( 'Choose image', '_plnamesmol' ); ?>" />
							<input type="button" class="button remove-image-button ss-rm-hide" value="<?php esc_attr_e( 'Remove image', '_plnamesmol' ); ?>" />
						</p>
						<input class="form-image-id" type="hidden" name="image" value="" />
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="active" name="active" checked>
							<label class="custom-control-label" for="active"><?php esc_html_e( 'Active', '_plnamesmol' ); ?></label>
						</div>
						<small id="active-error-msg" class="text-danger error-msg"></small>
					</div>

					<input type="hidden" class="form-control" name="id" id="id">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php esc_html_e( 'Close', '_plnamesmol' ); ?></button>
				<button type="button" class="btn btn-primary button-handler" data-action=""><?php esc_html_e( 'Save Changes', '_plnamesmol' ); ?></button>
			</div>
		</div>
	</div>
</div>
