
<?php echo ui_page_header('Manage Users', 'Just do it');?>


<!-- Matter -->
<div class="matter">
    <div class="container-fluid">
        
        <div class="row-fluid">
            <div class="span12">                
                <?php echo anchor('admin/user/edit', 'Add', 'class="btn btn-primary pull-right"'); ?>
            </div>
        </div>        
        <div class="row-fluid">
            <div class="span12">                
                <?php echo ui_widget_open(); ?>                
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Status</th>                          
                          <th>Control</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(count($users)): foreach($users as $user): ?>
                        <tr>                            
                              <td><?php echo $user->name; ?></td>
                              <td><?php echo $user->email; ?></td>
                              <td>********</td>
                              <td><span class="label label-success"><?php echo 'Active';?></span></td>                              
                              <td>                                  
                                  <?php echo ui_btn_edit('admin/user/edit/' . $user->id); ?>
                                  <?php echo ui_btn_delete('admin/user/delete/'. $user->id);?>                              
                              </td>                                                       
                        </tr>
                        <?php endforeach;?>
                        <?php else:?>
                        <tr>
                            <td colspan="5">No Users found.</td>
                        </tr>                        
                        <?php endif; ?>                                                
                      </tbody>
                    </table>                  
                <?php echo ui_widget_close(); ?>
              </div>

          </div>        
                </tbody>
            </table>
              
        </section>                
    </div>
</div>
<!-- Matter ends -->


