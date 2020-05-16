<div class="row-fluid">
    <div id="allinone_bannerWithPlaylist_elegant" class="span12" style="display:none;">
        <!-- IMAGES -->         
        <ul class="allinone_bannerWithPlaylist_list">
            <?php 
            $iCount = 1;
            foreach($events as $event) { ?>
                
            <li data-bottom-thumb="<?php echo site_url($event->image_banner) ?>" 
                data-text-id="#allinone_bannerWithPlaylist_photoText<?php echo $iCount; ?>" data-title="<?php echo $event->title; ?>" 
                data-desc="<?php echo $event->venue .'<br/>'. ns_date_format($event->date); ?>"                 
                data-link="<?php echo site_url('event/details/'.$event->id); ?>">
                <img src="<?php echo site_url($event->image_banner) ?>" alt="" />
            </li>
            <?php 
            $iCount++;
            } ?>        
        </ul>                         
        
        
        <?php 
        $iCount = 1;
        foreach($events as $event) {?>
        <div id="allinone_bannerWithPlaylist_photoText<?php echo $iCount; ?>" class="allinone_bannerWithPlaylist_texts">
            <div class="allinone_bannerWithPlaylist_text_line textElement41_elegantFullWidth" 
                data-initial-left="0" 
                data-initial-top="300" 
                data-final-left="0" 
                data-final-top="255" data-duration="0.5" data-fade-start="0" data-delay="0">
                <span style="padding-left:10px;">
                    <?php echo $event->title; ?>
                </span>
                                
                <span style="float:right;padding-right:10px;">
                    - by <?php echo $event->title;?>
                </span>
            </div>
        </div> 
        <?php 
        $iCount++;
        } ?>   
    </div>    
</div>
<script src="<?php echo site_url('retro/js/jquery.ui.touch-punch.min.js'); ?>" type='text/javascript'></script>
<script src="<?php echo site_url('retro/js/jquery.mousewheel.min.js');?>" type='text/javascript'></script>
<script src="<?php echo site_url('retro/js/allinone_bannerWithPlaylist.js');?>" type='text/javascript'></script>




<div class="row-fluid">
    
    <div class="span3">
        
        <?php echo form_open('', array('id' => 'frm_filter'));  ?>
        <div class="widget wblue">
			<!-- Widget title -->
			<div class="widget-head">
				<div class="pull-left">
					Categories
				</div>				
				<div class="clearfix"></div>
			</div>
			<div class="widget-content">
				<!-- Widget content -->
				<div class="padd">					
                    <?php foreach($categories as $category): ?>
                        <label>
                            <?php echo form_checkbox('categories[]', $category->id, ns_array_contents($selected_categories, $category->id));?>
                            <?php echo $category->name; ?>                            
                        </label>                        
                    <?php endforeach; ?>
				</div>
			</div>
			<div class="widget-foot">
			     <?php echo form_submit('btnUpdateCategories', 'Update', 'class="btn btn-primary"'); ?>
			     <?php echo form_button('btnResetCategories', 'Reset', 'class="btn" id="btnResetCategories"'); ?>
			     
			     <?php echo ui_hidden('page_number', $page_number); ?>
			     <?php echo ui_hidden('order_by', $order_by); ?>
			     <?php echo ui_hidden('ascending', $ascending); ?>
			</div>            
		</div>
		<?php echo form_close(); ?>
        
        
        
        
        <div class="clearfix"></div>
        <div class="span12">
        <script type="text/javascript"><!--
            google_ad_client = "ca-pub-5623294795635750";
            /* Event Page */
            google_ad_slot = "2208775157";
            google_ad_width = 160;
            google_ad_height = 600;
            //-->
            </script>
            <script type="text/javascript"
            src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
            </script>
        </div>
    </div>
    
    <div class="span9">
        <div class="widget wblue">
            <div class="widget-head">
                  <div class="pull-left">Events</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>
                
           <div class="widget-content">
               
               
                <table class="table table-bordered table-striped" id="eventlist">
                    <thead>
                        <tr>
                            <?php echo ui_table_header('date', 'Date', $order_by, $ascending); ?>
                            <?php echo ui_table_header('events.title', 'Event / Venue', $order_by, $ascending); ?>
                            <?php echo ui_table_header('organiser', 'Organiser', $order_by, $ascending); ?>                            
                            <th>Tickets</th>
                        </tr>
                    </thead>
                    <tbody>                
                        <?php foreach($events as $event): ?>
                        <tr>
                            <td><?php echo ns_date_format($event->date); ?></td>
                            <td><?php echo anchor('event/details/'. $event->id, $event->title); ?>
                                <br/><?php echo $event->venue; ?></td>
                            <td><?php echo $event->organiser; ?></td>
                            <td><?php echo $event->tickets; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>            
                </table>        
            
            </div>
            
            <div class="widget-foot">                
                <?php echo form_dropdown('ddlSort', $sorting, $order_by.'|'.($ascending ? 'TRUE' : 'FALSE'), 'id="ddlSort" class="pull-left"'); ?>                
				<div class="pagination pull-right">
					<ul>
						<li><a href="#">Prev</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">Next</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
        </div>
                        
    </div>    
</div>

<script type="text/javascript" language="javascript">
    jQuery(function() {     
        jQuery('#allinone_bannerWithPlaylist_elegant').allinone_bannerWithPlaylist({
            skin: 'easy',
            width: '930',
            height: 288,
            borderWidth: 0,
            playlistWidth: 200,
            showThumbs:false,
            numberOfThumbsPerScreen:3,                
            target:'_self'
        });
        
        $('#ddlSort').change(function () {           
            $.sort($(this).val());
        });
        
        $('thead th.pointer', '#eventlist').click(function() {
            var field = $(this).attr('data-sort');
            var ascending = $(this).attr('data-ascending');            
            if(typeof ascending == 'undefined') ascending = 'TRUE';            
            ascending = (ascending == 'TRUE'? 'FALSE' : 'TRUE');            
            $.sort(field + '|' + ascending);            
        });
        
        $.sort = function(sortingValue) {
           var parts = sortingValue.split('|');           
           $('#order_by').val(parts[0]);
           $('#ascending').val(parts[1]);           
           $('#frm_filter').submit(); 
        };
               
        $('#btnResetCategories').click(function() {
            
           $('input:checkbox', '#frm_filter').removeAttr('checked');
           $('#frm_filter').submit();
            
        });

    });
</script>