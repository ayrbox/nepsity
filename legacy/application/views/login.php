<!-- Widget starts -->
<div class="widget worange">
    <!-- Widget head -->
    <div class="widget-head">
        <i class="icon-lock"></i> Login 
    </div>      
    <div class="widget-content">
        <div class="padd">
          <!-- Login form -->          
          <?php echo ui_error_message(validation_errors()); ?>
          <?php echo ui_error_message($this->session->flashdata('error')); ?>
          <?php echo ui_error_message($error); ?>
                                  
          <?php echo form_open();?>            
            <!-- Email -->
            <div class="control-group">
              <label class="control-label" for="email">Email</label>
              <div class="controls">                               
                <?php echo form_input('email', '', 'placeholder="Email"'); ?>
              </div>
            </div>
            <!-- Password -->
            <div class="control-group">
              <label class="control-label" for="password">Password</label>
              <div class="controls">                
               <?php echo form_password('password', '', 'placeholder = "Password"'); ?>
              </div>
            </div>
            <!-- Remember me checkbox and sign in button -->
            <div class="control-group">
              <div class="controls">
                <label class="checkbox">
                  <input type="checkbox"> Remember me
                </label>
                <br>
                <?php echo form_submit('btnSignIn','Sign in', 'class="btn btn-danger"'); ?>
                <?php echo form_reset('btnReset', 'Reset', 'class="btn"'); ?>
                
              </div>
            </div>
          <?php echo form_close();?> 
        </div>
        </div>
        <div class="widget-foot">
          Not Registred? <a href="#">Register here</a>
        </div>
    </div>  
</div>