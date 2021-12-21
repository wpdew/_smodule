<?php
//echo '<h2>'. get_admin_page_title() .'</h2>';
//var_dump($params);
/*macbd с контролера
$data['test'];
$data['test2'];
*/


$templates = new PLUGINCONSTANTNAME_Template_Loader();

?>
<div class="wrap">
	
<h2 class="admin-page-title"><?php echo '<h2>'. get_admin_page_title() .'</h2>'; ?></h2>
	
   
<div class="inner-block">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ss-rm-breadcrumb">
        <!--<li class="breadcrumb-item">Таблица</li>-->
        </ol>
    </nav>
        

    <div class="row">
		
		<div class="col-md-12 col-sm-12">
			Home page plugin
            
            
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
