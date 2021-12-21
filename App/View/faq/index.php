<?php

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

			<div class="col-md-3 col-sm-12">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

					<a class="nav-link active show" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true"><?php esc_html_e( 'General FAQ', '_plnamesmol' ); ?></a>
					<a class="nav-link" id="v-pills-comments-tab" data-toggle="pill" href="#v-pills-comments" role="tab" aria-controls="v-pills-comments" aria-selected="false"><?php esc_html_e( 'Comments FAQ', '_plnamesmol' ); ?></a>
					<a class="nav-link" id="v-pills-template-tab" data-toggle="pill" href="#v-pills-template" role="tab" aria-controls="v-pills-template" aria-selected="false"><?php esc_html_e( 'Template FAQ', '_plnamesmol' ); ?></a>
					<a class="nav-link" id="v-pills-metabox-tab" data-toggle="pill" href="#v-pills-metabox" role="tab" aria-controls="v-pills-metabox" aria-selected="false"><?php esc_html_e( 'Metabox FAQ', '_plnamesmol' ); ?></a>	
				
				</div>
			</div>

			<div class="col-md-9 col-sm-12">
				<div class="tab-content" id="v-pills-tabContent">
					
					<div class="tab-pane active show" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
						<?php $templates->get_template_part('faq', 'main'); ?>
					</div>
					
					<div class="tab-pane" id="v-pills-comments" role="tabpanel" aria-labelledby="v-pills-comments-tab">
						<?php $templates->get_template_part('faq', 'comment'); ?>
					</div>
					
					<div class="tab-pane" id="v-pills-template" role="tabpanel" aria-labelledby="v-pills-template-tab">
						<?php $templates->get_template_part('faq', 'template'); ?>
					</div>
					
					<div class="tab-pane" id="v-pills-metabox" role="tabpanel" aria-labelledby="v-pills-metabox-tab">
						<?php $templates->get_template_part('faq', 'metabox'); ?>    
					</div>
					
				</div>
				
			</div>
		</div>
			
	</div>
    
</div>