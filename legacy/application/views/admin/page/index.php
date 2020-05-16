<?php echo ui_page_header('Manage Pages', '');?>

<!-- Matter -->
<div class="matter">
    <div class="container-fluid">        
        <div class="row-fluid">
            <div class="span12">                
                <?php echo anchor('admin/page/edit', 'Add', 'class="btn btn-primary pull-right"'); ?>
            </div>
        </div>        
        <div class="row-fluid">
            <div class="span12">                
                <?php echo ui_widget_open(); ?>                
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Description</th>                          
                          <th>Status</th>                          
                          <th>Control</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(count($pages)): foreach($pages as $page): ?>
                        <tr>                            
                              <td><?php echo $page->title; ?></td>
                              <td><?php echo $page->description; ?></td>                              
                              <td><span class="label label-success"><?php echo 'Active';?></span></td>                              
                              <td>                                  
                                  <?php echo ui_btn_edit('admin/page/edit/' . $page->id); ?>
                                  <?php echo ui_btn_delete('admin/page/delete/'. $page->id);?>                              
                              </td>                                                       
                        </tr>
                        <?php endforeach;?>
                        <?php else:?>
                        <tr>
                            <td colspan="5">No pages found.</td>
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


