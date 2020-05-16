
<div class="row-fluid">    
    <div id="calendar-wrapper" class="span12">
        <div id="event-calender">
            <div id="calendar" class="calendar">                            
                <div class="calendar-nav">
                    <div title="Previous Year" class="nav-last-year">&laquo;</div>
                    <div title="Previous Month" class="nav-last-month">&lsaquo;</div>
                    <div id="month-selected" class="current-month">-</div>
                    <div title="Next Month" class="nav-next-month">&rsaquo;</div>
                    <div title="Next Year" class="nav-next-year">&raquo;</div>
                </div>
                <div class="calendar-weekday"></div>
                <div class="calendar-day"></div>
            </div>
            
            <div class="event-bubble" id="event-bubble" style="z-index:999; left:300px;">
                <div class="bubble_top"></div>
                <div class="bubble_mid">
                    <div id="event-container">                      
                    </div>
                </div>
                <div class="bubble_bottom"></div>
            </div>
        </div>
    </div>
</div>


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
                <span style="padding-left:10px;"><?php echo $event->title; ?></span>                                
                <span style="float:right;padding-right:10px;">- by <?php echo $event->title;?></span>
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


<div id="partners-container" style="display: block;" span="row-fluid">    
    <div id="partners-bg">
        <div id="partners-left"><a href="#" ></a></div>
        <div id="partners-right"><a href="#"></a></div>
        <div id="partners-wrapper">
            <ul>
                <?php foreach($partners as $partner) {?>            
                <li>
                    <a href="<?php echo site_url('organiser/details/'.$partner->id);?>">
                    <img alt="<?php echo $partner->name; ?>" src="<?php echo site_url($partner->logo_image); ?>"></a>
                </li>
                <?php } ?>
            </ul>       
        </div>  
    </div>
    
    <div class="clearfix"></div>
</div>



<div class="row-fluid">
    <div class="span12">
        <div class="widget wblue">            
            <div class="widget-head">
				<div class="pull-left">
					Hot Events
				</div>
				<div class="widget-icons pull-right">			        
					<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
				</div>
				<div class="clearfix"></div>
			</div>
                
            <div class="widget-content">
				<div class="padd statement">
					<div class="row-fluid">					    
					    <?php foreach($featured as $event): ?>					    
                        <div class="boxgrid captionfull span4">
                            <img src="<?php echo site_url($event->image_thumb) ?>"/>
                            <a href="<?php echo site_url('event/details/'.$event->id); ?>">
                                <div class="cover boxcaption">
                                    <h3><?php echo $event->title; ?></h3>
                                    <hr style="color:rgb(255, 255, 255); margin-left:8px;">
                                    <p><?php echo $event->venue .'<br/>'. ns_date_format($event->date); ?></p>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>                        
					</div>
				</div>
			</div>
          </div>           
    </div>    
</div>


        <div class="row-fluid">
            <div class="span6">   <!-- left column -->
        		
        		<div class="row-fluid">       <!-- top box -->
        		     
                    <div class="span12 nepsity-well well-blue">
                        
                        <div class="row-fluid">
                            <div class="span2">
                                <img src="<?php echo site_url('/img/register.png'); ?>"/>
                            </div>
                            <div class="span9">
                                <h3 class="color-yellow">Advert &amp; Promote your event</h3>
                            </div>                                
                        </div>                     
                        <div class="row-fluid">                        
                            <h5 class="color-white">Are you an Organiser?</h5>                        
                            <p class=>Get Started!! Register with Nepsity and start listing your events immediately. Unlimited FREE listing (for limited period only). So Hurry UP!!!</p>                        
                        </div>
                        
                        <div class="row-fluid">                        
                            <img src="<?php echo site_url('img/free.png');?>" class="pull-left" />                        
                            <?php echo anchor('login/register', 'Register Now', 
                                array('class' => 'btn btn-success pull-right')); ?>                        
                        </div>                                
                    </div>                               		          		  
        		</div>
        		
        		
        		
        		<div class="row-fluid">       <!-- bottom box -->                
                    <div class="span12 nepsity-well well-dark">
                        
                        <div class="row-fluid">
                            <div class="span2">
                                <img src="<?php echo site_url('/img/feedback.png'); ?>"/>
                            </div>
                            <div class="span9">
                                <h3 class="color-yellow">Help us to Improve</h3>
                            </div>                                
                        </div> 
                        
                        <div class="row-fluid">                        
                            <h5 class="color-white">We are growing !!</h5>                        
                            <p>Your comments and feedback will help us to grow quick & more effective way. Any suggestions & feedback are welcome!!</p>                        
                        </div>
                        
                        <div class="row-fluid">                                                                       
                            <?php echo anchor('contact', 'Feedback', 
                                array('class' => 'btn btn-success pull-right')); ?>                        
                        </div>
                                     
                    </div>
                                                       
                </div>
                
            </div>
          
            <div class="span6">  <!-- right column -->                
                <div class="widget worange">            
                    <div class="widget-head">
                        <div class="pull-left">
                            Just Announced
                        </div>
                        <div class="widget-icons pull-right">                   
                            <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                        
                    <div class="widget-content">
                        <div class="padd statement">
                            <table class="table table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th style="width:90px">Date</th>
                                        <th>Event</th>
                                        <th style="width:100px">Organiser</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($recent as $event) {?>
                                    <tr>
                                        <td><?php echo ns_date_format($event->date);?></td>
                                        <td><a href="<?php echo site_url('event/details/'.$event->id); ?>" class="simple-link">
                                            <?php echo $event->title;?></a>
                                        </td>
                                        <td><?php echo $event->organiser;?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>  
                            </table>            
                        </div>
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
        
        jQuery('#partners-bg').hover( function() {
            jQuery('#partners-left').fadeIn(300);
            jQuery('#partners-right').fadeIn(300);
        }, function() {
            jQuery('#partners-left').fadeOut(300);
            jQuery('#partners-right').fadeOut(300);
        });
        
        jQuery('#partners-left').click(function() {                         
            var wrapper = jQuery('#partners-wrapper');          
            wrapper.animate({'scrollLeft' : wrapper.scrollLeft() - 163}, 200);
            return false;
        });             
        jQuery('#partners-right').click(function() {
            var wrapper = jQuery('#partners-wrapper');
            wrapper.animate({'scrollLeft' : wrapper.scrollLeft() + 163}, 200);
            return false;
        });
        
        jQuery('.boxgrid.captionfull').hover(function(){
            $(".cover", this).stop().animate({top:'130px'},{queue:false,duration:160});
        }, function() {
            $(".cover", this).stop().animate({top:'195px'},{queue:false,duration:160});
        });
    });

</script>