<?php echo ui_page_header('Address', '');?>
<div class="matter">
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="widget wgreen">            
            <div class="widget-head">
              <div class="pull-left">Delivery Address</div>
              <div class="widget-icons pull-right">
                <!--<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                <a href="#" class="wclose"><i class="icon-remove"></i></a>-->
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="widget-content">
              <div class="padd">
                  
                <div class="control-group">
                    <?php if(validation_errors()) echo ui_error_message(validation_errors()); ?>                            
                </div>
                    
                <!-- Form starts.  -->                 
                 <?php echo form_open('', array('class' => 'form-horizontal' )); ?>
                  <div class="control-group">
                    <label class="control-label" for="name">Name</label>
                    <div class="controls">
                        <?php echo form_input('name', set_value('name', ''), 'placeholder="Name"'); ?>                      
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="address">Address</label>
                    <div class="controls">
                        <?php echo form_input('address', set_value('address', ''), 'placeholder="Address"'); ?>
                    </div>
                  </div>
  
                  <div class="control-group">
                    <label class="control-label" for="address1">Address 1</label>
                    <div class="controls">
                        <?php echo form_input('address1', set_value('address1', ''), 'placeholder="Address Line 1"'); ?>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="postcode">Postcode</label>
                    <div class="controls">
                        <?php echo form_input('postcode', set_value('postcode', ''), 'placeholder="Postcode"'); ?>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="contact_number">Contract Number: </label>
                    <div class="controls">                        
                        <?php echo form_input('contact_number', set_value('contact_number', ''), 'placeholder="Contract Number"'); ?>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                        <?php echo form_input('email', set_value('email', ''), 'placeholder="Email"'); ?>
                    </div>
                  </div>
<!--
                  <div class="control-group warning">
                    <label class="control-label" for="inputWarning">Warning</label>
                    <div class="controls">
                      <input type="text" id="inputWarning">
                      <span class="help-inline">Something may have gone wrong</span>
                    </div>
                  </div>
                  <div class="control-group error">
                    <label class="control-label" for="inputError">Error</label>
                    <div class="controls">
                      <input type="text" id="inputError">
                      <span class="help-inline">Please correct the error</span>
                    </div>
                  </div>
                  <div class="control-group success">
                    <label class="control-label" for="inputSuccess">Success</label>
                    <div class="controls">
                      <input type="text" id="inputSuccess">
                      <span class="help-inline">Woohoo!</span>
                    </div>
                  </div>
                  <hr>
                  <button type="submit" class="btn">Default</button>
                  <button type="submit" class="btn btn-primary">Primary</button>
                  <button type="submit" class="btn btn-info">Info</button>
                  <button type="submit" class="btn btn-success">Success</button>
                  <button type="submit" class="btn btn-warning">Warning</button>
                  <button type="submit" class="btn btn-danger">Danger</button>
                  <button type="submit" class="btn btn-inverse">Inverse</button>-->
                  
                  <?php echo form_hidden('hd_event', $event_id); ?>
                  <?php echo form_button(array('class' => 'btn btn-danger pull-right', 'id'=>'btnNext', 'name'=>'btnNext', 'type' => 'submit', 'content' => 'Next')); ?>                  
                  <div class="clearfix"></div>
                <?php echo form_close(); ?>

              </div>
            </div>
              <div class="widget-foot">
                <!-- Footer goes here -->
              </div>
          </div>  

        </div>

      </div>

    </div>
</div>
