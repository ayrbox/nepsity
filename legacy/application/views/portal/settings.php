<?php echo ui_page_header('Settings', '');?>

<div class="matter">
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="widget wgreen">                
            <div class="widget-head">
              <div class="pull-left">User Settings</div>
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
                <div class="row-fluid">
                    <div class="span12">
                        <?php echo ui_error_message(validation_errors()); ?>
                        <?php echo ui_error_message($error); ?>
                        <?php echo ui_success_message($success); ?>
                    </div>
                </div>
                                                        
                <?php echo form_open('', array('class' => 'form-horizontal', 'id' => 'data_form'));?>
                <div class="row-fluid">
                    <div class="span8">                       
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
                        <?php echo form_hidden('name', set_value('name', $user->name)); ?>
                    </div>
                    <div class="span4">
                        <?php echo form_submit('btnSave','Save', 'class="btn btn-info pull-right"'); ?>
                    </div>
                </div>
                <?php echo form_close();?>
              </div>
            </div>                  
          </div>  
        </div>
      </div>
    </div>
 </div>