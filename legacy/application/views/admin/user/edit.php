<?php
    if(empty($user->id)) {
        echo ui_page_header('Manage Users', 'Add');
    } else {
        echo ui_page_header('Manage Users', 'Edit');   
    }
?>

<div class="matter">
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="widget wgreen">                
            <div class="widget-head">
              <div class="pull-left"><?php echo empty($user->id)?'Add':'Edit';?></div>
              <div class="widget-icons pull-right">
                <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                <a href="#" class="wclose"><i class="icon-remove"></i></a>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="widget-content">
              <div class="padd">
                <h6>User Information</h6>                                                                                         
                <hr>
                <!-- Form starts.  -->                                        
                <?php echo form_open('', array('class' => 'form-horizontal', 'id' => 'data_form'));?>
                    <div class="control-group">                            
                        <?php echo anchor('admin/user', 'Cancel', array('class' => 'btn btn-danger pull-right','title' => 'Delete')); ?>                                                       
                        <?php echo form_submit('btnSave','Save', 'class="btn btn-info pull-right"'); ?>
                    </div>
                    
                    <div class="control-group">
                        <?php echo validation_errors(); ?>                            
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="name">Name:</label>
                        <div class="controls"><?php echo form_input('name', set_value('name', $user->name), 'placeholder = "Name"'); ?></div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="email">Email:</label>
                        <div class="controls"><?php echo form_input('email', set_value('email', $user->email), 'placeholder="Email"'); ?></div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="password">Password</label>
                        <div class="controls"><?php echo form_password('password', '', 'placeholder = "Password"'); ?></div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="confirm_password">Confirm Password</label>
                        <div class="controls"><?php echo form_password('confirm_password', '', 'placeholder = "Confirm Password"'); ?></div>
                    </div>                          
                <?php echo form_close();?>
              </div>
            </div>                  
          </div>  
        </div>
      </div>
    </div>
 </div>