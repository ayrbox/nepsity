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
    
    <div class="span8">
        <div class="widget wblue">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left"><?php echo $event->title; ?></div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                    <div class="padd invoice">                    
                        <div class="row-fluid">                    
                            <div class="span4">                        
                                <img src="<?php echo site_url($event->image_thumb); ?>" class="img-thumbnail" />                                               
                            </div>
                            <div class="span8">
							
							<div class="support-contact">                                
                                
                                <i class="icon-group icon-2x"></i> <?php echo $event->organiser; ?>
                                <hr/>
                                <i class="icon-calendar icon-2x"></i> <?php echo ns_date_format($event->date); ?>
                                <hr>
                                <i class="icon-time icon-2x"></i> <?php echo $event->time; ?>
                                <hr>
                                <i class="icon-home icon-2x"></i> <?php echo $event->venue; ?> 
                                
                             </div>
						</div>
                        </div>                  
                    </div>
                </div>
                <div class="widget-foot">
                    <div class="pull-right">                                
                        <?php echo ui_facebook_button($event->facebook_link); ?>
                        <?php echo ui_twitter_button($event->twitter_link); ?>                                        
                    </div>
                    <div class="clearfix"></div>
                </div>
        </div>
    </div>
    
    <?php if(count($event_tickets) > 0): ?>
    <div class="span4">
        <div class="widget worange">
            <div class="widget-head">
              <div class="pull-left">Tickets</div>
              <div class="widget-icons pull-right">
                <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                <a href="#" class="wclose"><i class="icon-remove"></i></a>
              </div>
              <div class="clearfix"></div>
            </div>
    
            <div class="widget-content">
              <div class="padd">
                    <div class="support-contact">
                        <?php foreach($event_tickets as $ticket): ?>                            
                            <i class="icon-chevron-right"></i> <?php echo $ticket->ticket_description; ?>
                            <div class="pull-right">
                                £<?php echo $ticket->price; ?>
                            </div>                                
                            <hr/>                            
                        <?php endforeach; ?>                            
                    </div>
              </div>
            </div>
              <div class="widget-foot">
                    <?php echo ui_buy_button($event->sales_link); ?>
                    <div class="clearfix"></div>
              </div>
        </div>
    </div>   
    <?php endif; ?>
    
    <div class="row-fluid">        
        <div class="span8">            
            <div class="widget wblue">                
                <div class="widget-head">
                  <div class="pull-left">Description</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>                     
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">                  
                  <div class="padd">                      
                      <?php echo $event->description; ?>                      
                  </div>
                  <div class="clearfix"></div>  
                </div>
              </div>            
        </div>
        
        
        <div class="span4">            
            <div class="widget wblue">                
                <div class="widget-head">
                  <div class="pull-left">Comments</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>                     
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">                  
                  <div class="padd">                      
                      <div class="fb-comments" data-href="<?php echo site_url('event/details/'.$event->id); ?>" data-width="260" data-num-posts="10"></div>                      
                  </div>
                  <div class="clearfix"></div>  
                </div>
              </div>            
        </div>        
    </div>
    
    
    <script src="<?php echo site_url('js/jquery.prettyPhoto.js'); ?>"></script> <!-- prettyPhoto -->
    <div class="row-fluid">

            <div class="span12">

              <div class="widget wblue">

                <div class="widget-head">
                  <div class="pull-left">Gallery</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>                     
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">
                    
                    <div class="gallery">
                      <!-- Full size image link in anchor tag. Thumbnail link in image tag. -->
                      <a href="<?php echo site_url('/media/events/img/zIov4QWVx6UiyDr.jpg'); ?>" class="prettyPhoto[pp_gal]"><img src="<?php echo site_url('/media/events/img/zIov4QWVx6UiyDr.jpg'); ?>" alt=""></a>
                      <a href="<?php echo site_url('/media/events/img/zIov4QWVx6UiyDr.jpg'); ?>" class="prettyPhoto[pp_gal]"><img src="<?php echo site_url('/media/events/img/zIov4QWVx6UiyDr.jpg'); ?>" alt=""></a>
                      <a href="<?php echo site_url('/media/events/img/zIov4QWVx6UiyDr.jpg'); ?>" class="prettyPhoto[pp_gal]"><img src="<?php echo site_url('/media/events/img/zIov4QWVx6UiyDr.jpg'); ?>" alt=""></a>
                      <a href="<?php echo site_url('/media/events/img/zIov4QWVx6UiyDr.jpg'); ?>" class="prettyPhoto[pp_gal]"><img src="<?php echo site_url('/media/events/img/zIov4QWVx6UiyDr.jpg'); ?>" alt=""></a>                         
                    </div>

                  </div>
                </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>  
              
            </div>

    </div>       
</div>

<script type="text/javascript" langauge="javascript">
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
