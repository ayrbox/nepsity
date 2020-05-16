<?php
    if(empty($event->id)) {
        echo ui_page_header('Manage Event', 'Add');
    } else {
        echo ui_page_header('Manage Event', 'Edit');   
    }
?>
<div class="matter">
    <div class="container-fluid">        
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'data_form'));?>
            <div class="row-fluid">
                
                <div class="pull-left">
                    <h5><?php echo empty($event->id)?'Add':'Edit';?></h5>
                </div>                
                <div class="pull-right">
                    <div class="control-group">                            
                        <?php echo anchor('portal/event/live', 'Cancel', array('class' => 'btn btn-danger pull-right','title' => 'Delete')); ?>                                                       
                        <?php echo form_submit('btnSave','Save', 'class="btn btn-info pull-right"'); ?>
                    </div>
                </div>                
            </div>
            <div class="row-fluid">
                <div class="span12">

                    <?php echo ui_error_message(validation_errors()); ?>
                    <?php echo ui_error_message($error); ?>
                    <?php echo ui_success_message($success); ?>
                    <?php echo form_hidden('organiser_id', $organiser->id); ?>
                    
                </div>
            </div>
            <div class="row-fluid">
                <div class="span8">                                       
                    <?php echo ui_widget_open('Event Information'); ?>          
                      <div class="padd">
                        <h6>* fields are mandatory</h6>
                        <hr>                        
                            <div class="row-fluid">
                                <div class="span12">                                                        
                                    <div class="control-group">
                                        <label class="control-label" for="title">Title: *</label>
                                        <div class="controls"><?php echo form_input('title', set_value('title', $event->title), 'placeholder = "Title"'); ?></div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="date">Date: *</label>
                                        <div class="controls">
                                            <?php echo form_input('date', set_value('date', $event->date), 'placeholder="DD/MM/YYYY" id="event_date"'); ?>
                                        </div>                                                                               
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="time">Time: *</label>
                                        <div class="controls"><?php echo form_input('time', set_value('time', $event->time), 'placeholder="e.g 22:00 till 6:00"'); ?></div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="venue">Venue: *</label>
                                        <div class="controls"><?php echo form_input('venue', set_value('venue', $event->venue), 'placeholder="Venue"'); ?></div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="event_category_id">Category: *</label>                                        
                                        <div class="controls"><?php echo form_dropdown('event_category_id', $categories, $event->event_category_id, 'id="event_category_id" class="pull-left"'); ?></div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="description">Description</label>
                                        <div class="controls">                                            
                                            <?php echo form_textarea('description', set_value('description', $event->description), 'class="cleditor"'); ?>
                                        </div>
                                    </div>                                    
                                </div>                                                                                      
                            </div>                        
                      </div>
                    <?php echo ui_widget_close(); ?>
                </div>
                <div class="span4">
                    <div class="row-fluid">
                        <div class="span12">
                            <?php echo ui_widget_open('Event Thumbnail'); ?>
                                <div class="padd">
                                    <div class="control-group">                                        
                                        <div id="prev_eventthumb" class="preview" style="display:none; float:left; border:1px solid #d0d0d0; box-shadow:0 0 20px #d0d0d0;"></div>
                                        <img id="eventthumb-image" class="preview" src="<?php echo site_url($event->image_thumb); ?>" />
                                    </div>
                                    <div class="control-group">
                                        <script src="<?php echo site_url('js/jquery.preimage.js'); ?>"></script>
                                        <span class="btn btn-primary upload-button pull-right">
                                            <span>Browse</span>
                                            <?php echo form_upload('eventthumb', '', 'id="eventthumb"'); ?>
                                        </span>
                                        <script type="text/javascript">
                                            $('#eventthumb').preimage();
                                            $('#eventthumb').change(function() {
                                                var fileName = $(this).val();
                                                if (fileName.length > 0) {
                                                    $('#eventthumb-image').hide();
                                                    $('#prev_eventthumb').show();
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
                            <?php echo ui_widget_open('Link'); ?>
                                <div class="padd">
                                    <div class="control-group">
                                        <label class="control-label" for="facebook_link">Facebook Link : </label>
                                        <div class="controls"><?php echo form_input('facebook_link', set_value('', $event->facebook_link), 'placeholder="http://facebook.com/event"'); ?></div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="twitter_link">Twitter Link : </label>
                                        <div class="controls"><?php echo form_input('twitter_link', set_value('twitter_link', $event->twitter_link), 'placeholder="http://www.twitter.com/""'); ?></div>
                                    </div>
                                                                        
                                    <div class="control-group">
                                        <label class="control-label" for="sales_link">Sales Link : </label>
                                        <div class="controls"><?php echo form_input('sales_link', set_value('sales_link', $event->sales_link), 'placeholder="e.g http://www.example.com/event/ticket/sales"'); ?></div>
                                    </div>
                                </div>
                            <?php echo ui_widget_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <?php echo ui_widget_open("Upload cover picture", "wblue"); ?>            
                        <div class="padd">
                            <div class="row-fluid">
                                <div class="banner">
                                    <div id="prev_bannerimage" class="banner prev_container" style="display:none;float:left; border:1px solid #d0d0d0; box-shadow:0 0 20px #d0d0d0;"></div>                                    
                                    <img id="bannerimage-image" class="banner-img" src="<?php echo site_url($event->image_banner); ?>" />
                                </div>
                            </div>
                            <div class="row-fluid spacer">
                                <div class="span12">
                                    <script src="<?php echo site_url('js/jquery.preimage.js'); ?>"></script>
                                    <span class="btn btn-primary upload-button">
                                        <span>Browse</span>
                                        <?php echo form_upload('bannerimage', '', 'id="bannerimage"'); ?>
                                    </span>
                                    <script type="text/javascript">                                    
                                        $('#bannerimage').preimage();                                                                                
                                        $('#bannerimage').change(function() {                                                                                    
                                            var fileName = $(this).val();                                                                                       
                                            if (fileName.length > 0) {
                                                $('#bannerimage-image').hide();
                                                $('#prev_bannerimage').show();
                                            }
                                        });
                                    </script>                            
                                </div>
                            </div>
                        </div>                        
                        <div class="clearfix"></div>
                    <?php echo ui_widget_close(); ?>
                </div>
            </div>
        <?php echo form_close();?>
    </div>
 </div>