<div class="page-head">    
    <h2 class="pull-left">Profile<span class="page-meta">Organiser Profile</span></h2>       
    <div class="clearfix"></div>
    <div class="pull-right">
        <?php echo form_button('btnSave', '<i class="icon-save"></i>&nbsp;&nbsp;Save', 'class = "btn btn-primary" id="btnSave"'); ?>
        <script type="text/javascript">
            $('#btnSave').click(function() { $('#frmProfile').submit(); });
        </script>
    </div>
    <div class="clearfix"></div>
</div>


<div class="matter">
    <?php echo form_open_multipart('','class="form-horizontal" id="frmProfile"'); ?>        
        <div class="container-fluid">

            <div class="row-fluid">                
                <div class="span12">
                    <?php echo ui_error_message(validation_errors()); ?>
                    <?php echo ui_error_message($error); ?>
                    <?php echo ui_success_message($success); ?>
                </div>
            </div>
    
            <div class="row-fluid">            
                <div class="span8">                    
				    <?php echo ui_widget_open('About'); ?>
					<div class="padd">						    
						<div class="form profile">
						    
							<div class="control-group">
								<label class="control-label" for="name">Name</label>
								<div class="controls">									
									<?php echo form_input('name', set_value('name', $profile->name), 'placeholder = "Name"'); ?>
								</div>
							</div>
																
							<div class="control-group">
								<label class="control-label" for="location">Location</label>
								<div class="controls">									
									<?php echo form_input('location', set_value('location', $profile->location), 'placeholder = "Location"'); ?>
								</div>
							</div>
							
							<div class="control-group">
							    <label class="control-label" for="about">About</label>
							    <div class="controls">							        							        							       
							        <?php echo form_textarea('about', set_value('about', $profile->about), 'class="cleditor"'); ?>							        							        
							    </div>							    
							</div>
														
						</div>                        
					</div>
					<?php echo ui_widget_close(); ?>

					<?php echo ui_widget_open('Announcement'); ?>
                        <div class="padd">
                            <?php echo form_textarea('announcement', set_value('announcement', $profile->announcement), 'class="cleditor"'); ?>                            
                        </div>                   
                    <?php echo ui_widget_close(); ?>
					
					
					<div class="row-fluid">
    					<div class="span6">
    					<?php echo ui_widget_open('Contact'); ?>                        
                            <div class="padd">                                
                                <?php echo form_textarea('contact_address', set_value('contact_address', $profile->contact_address), 'class="cleditor"'); ?>    
                            </div>
                        <?php echo ui_widget_close(); ?>
                        </div>
                        
                        <div class="span6">
                        <?php echo ui_widget_open('Members'); ?>
                            
                            <div class="padd">                                
                                <?php echo form_textarea('members', set_value('members', $profile->members), 'class="cleditor"'); ?>
                            </div>
                        <?php echo ui_widget_close(); ?>
                        </div>
                    </div>					    
                </div>
                
                <div class="span4">                                     
                    <div class="row-fluid">
                        <div class="span12">
                        <?php echo ui_widget_open('Logo'); ?>                    
                            <div class="padd">
                                <div class="control-group">                                        
                                    <div id="prev_logo" class="preview" style="display:none; float:left; border:1px solid #d0d0d0; box-shadow:0 0 20px #d0d0d0;"></div>
                                    <img id="logo-image" class="preview" src="<?php echo site_url($profile->logo_image); ?>" />
                                </div>
                                <div class="control-group">                                    
                                    <script src="<?php echo site_url('js/jquery.preimage.js'); ?>"></script>                                    
                                    <span class="btn btn-primary upload-button pull-right">
                                        <span>Logo</span>
                                        <?php echo form_upload('logo', '', 'id="logo"'); ?>
                                    </span>                                                                       
                                    <script type="text/javascript">                                    
                                        $('#logo').preimage();                                                                                
                                        $('#logo').change(function() {                                                                                    
                                            var fileName = $(this).val();                                                                                       
                                            if (fileName.length > 0) {
                                                $('#logo-image').hide();
                                                $('#prev_logo').show();
                                            }
                                        });
                                    </script>
                                </div>
                                <div class="clearfix"></div>                                                       
                            </div>                    
                        <?php echo ui_widget_close(); ?>
                        </div>
                    </div>
                    
                    <div class="row-fluid">
                        <div class="span12">                        
                            <?php echo ui_widget_open('Cover Pictures') ?>
                            <div class="padd">
                                
                                <?php foreach ($banners as $banner): ?>                                    
                                    <div class="control-group">                                        
                                        <img src="<?php echo site_url($banner->banner_image); ?>"/>                                        
                                    </div>                                    
                                <?php endforeach; ?>
                                
                                <div class="control-group">
                                    <?php echo anchor('portal/organiser/coverpic', 'Upload Image', 'class="btn btn-primary"'); ?>                                   
                                </div>
                            </div>
                            <?php echo ui_widget_close(); ?>
                        </div>
                    </div>

                </div>
            </div>
                        
        </div>
    <?php echo form_close(); ?>
</div>