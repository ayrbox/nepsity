<?php
    if(empty($page->id)) {
        echo ui_page_header('Manage Pages', 'Add');
    } else {
        echo ui_page_header('Manage Pages', 'Edit');   
    }
?>

<div class="matter">
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="widget wgreen">                
            <div class="widget-head">
              <div class="pull-left"><?php echo empty($page->id)?'Add':'Edit';?></div>
              <div class="widget-icons pull-right">
                <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                <a href="#" class="wclose"><i class="icon-remove"></i></a>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="widget-content">
              <div class="padd">
                <h6>Page Information</h6>                                                                                         
                <hr>
                <!-- Form starts.  -->                                        
                <?php echo form_open('', array('class' => 'form-horizontal', 'id' => 'data_form'));?>
                    <div class="control-group">                            
                        <?php echo anchor('admin/page', 'Cancel', array('class' => 'btn btn-danger pull-right','title' => 'Delete')); ?>                                                       
                        <?php echo form_submit('btnSave','Save', 'class="btn btn-info pull-right"'); ?>
                    </div>
                    
                    <div class="control-group">
                        <?php echo validation_errors(); ?>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="title">Title:</label>
                        <div class="controls"><?php echo form_input('title', set_value('title', $page->title), 'placeholder = "Title"'); ?></div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="email">Slug:</label>
                        <div class="controls"><?php echo form_input('slug', set_value('slug', $page->slug), 'placeholder="Slug"'); ?></div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="order">Order: </label>
                        <div class="controls"><?php echo form_input('order', set_value('order', $page->order)); ?></div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="body">Body</label>
                        <div class="controls"><?php echo form_textarea('body', set_value('body', $page->body), 'class="cleditor"'); ?></div>
                    </div>
                <?php echo form_close();?>
              </div>
            </div>                  
          </div>  
        </div>
      </div>
    </div>
 </div>