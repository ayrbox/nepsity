<?php echo ui_page_header('Cover Pictures', '');?>

<div class="matter">
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
            <?php echo ui_widget_open("Upload cover picture", "wblue"); ?>
            
                <?php echo form_open_multipart('portal/organiser/coverpic', array('class' => 'form-horizontal', 'id' => 'data_form'));?>
                <div class="padd">
                    <div class="row-fluid">
                        <div class="banner">
                            <div id="prev_coverpic" class="banner prev_container" style="display:none;float:left; border:1px solid #d0d0d0; box-shadow:0 0 20px #d0d0d0;"></div>
                            <img id="coverpic-image" src="" class="banner-img" />                        
                        </div>
                    </div>
                    <div class="row-fluid spacer">
                        <div class="span12">
                            <script src="<?php echo site_url('js/jquery.preimage.js'); ?>"></script>
                            <span class="btn btn-primary upload-button">
                                <span>Browse</span>
                                <?php echo form_upload('coverpic', '', 'id="coverpic"'); ?>
                            </span>                            
                            <?php echo form_submit('', 'Upload', 'class="btn btn-success"'); ?>
                            <script type="text/javascript">                                    
                                $('#coverpic').preimage();                                                                                
                                $('#coverpic').change(function() {                                                                                    
                                    var fileName = $(this).val();                                                                                       
                                    if (fileName.length > 0) {
                                        $('#coverpic-image').hide();
                                        $('#prev_coverpic').show();
                                    }
                                });
                            </script>                            
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <div class="clearfix"></div>
            <?php echo ui_widget_close(); ?>
            
            
          <div class="widget wgreen">                
            <div class="widget-head">
              <div class="pull-left">Cover</div>
              <div class="widget-icons pull-right">                
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="widget-content">
              <div class="padd">
                                               
                    <div class="row-fluid">
                        <div class="span12">
                            <?php echo ui_error_message(validation_errors()); ?>
                            <?php echo ui_error_message($error); ?>
                            <?php echo ui_success_message($success); ?>
                        </div>
                    </div>
                                    
                    <div class="row-fluid">
                    <?php foreach($banners as $banner): ?>
                        <div class="span4">
                            <img src="<?php echo site_url($banner->banner_image); ?>" />
                            <div class="clearfix"></div>
                            <?php echo ui_btn_delete('portal/organiser/coverpic/delete/' . $banner->id); ?> 
                        </div>
                    <?php endforeach; ?>
                    </div>
              </div>
            </div>                  
          </div>  
        </div>
      </div>
    </div>
 </div>