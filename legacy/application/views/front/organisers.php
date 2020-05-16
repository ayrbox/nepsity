<div class="row-fluid">    
    <?php foreach($organisers as $organiser): ?>
    <div class="organiser" title="Click to flip">
        <div class="organiserFlip">        
            <?php if($organiser->logo_image != ''): ?>
                <img src="<?php echo site_url($organiser->logo_image); ?>"  alt="More about <?php echo $organiser->name;?>"/>
            <?php else: ?>
                <div class="organiserDescription"><?php echo $organiser-name;?> </div>
            <?php endif; ?>                
        </div>
        
        
        <div class="organiserData">
            <div class="organiserDescription">
                <?php echo $organiser->name; ?>
            </div>
            <div class="container">
                <div class="row-fluid text-center">
                    <?php echo anchor(site_url('organiser/details/' . $organiser->id), 'View Profile', array('class' => 'btn btn-danger'));?>
                </div>                 
            </div>                       
        </div>
        
        
        
    </div>
    <?php endforeach; ?>    
</div>
<script src="<?php echo site_url('retro/js/jquery.flip.min.js');?>" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
    $(function() {
        $('.organiserFlip').bind("click",function(){        
            var elem = $(this);     
            if(elem.data('flipped')) {          
                elem.revertFlip();
                elem.data('flipped',false)
            } else {
                elem.flip({
                    direction:'lr',
                    speed: 350,
                    onBefore: function(){  elem.html(elem.siblings('.organiserData').html()); }
                });             
                elem.data('flipped',true);
            }
        });
    });
</script>     