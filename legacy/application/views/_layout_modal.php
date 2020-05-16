<?php $this->load->view('admin/components/_header.php'); ?>

<!-- Form area -->
<div class="admin-form">
  <div class="container-fluid">

    <div class="row-fluid">
      <div class="span12">
          
        
        <!-- Main page view -->
        <?php $this->load->view($page_view); ?>
                
    </div>
  </div> 
</div>

<?php $this->load->view('admin/components/_footer.php'); ?>
