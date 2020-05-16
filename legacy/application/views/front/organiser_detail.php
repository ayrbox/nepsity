<div class="row-fluid">
    <?php if(count($organiser->banners) > 0 ):?>
    <div id="allinone_bannerRotator_classic" style="display:none;">                                
        <ul class="allinone_bannerRotator_list">            
            <?php foreach($organiser->banners as $banner): ?>
                <li data-bottom-thumb='<?php echo site_url($banner->banner_image); ?>' data-text-id='#'>
                    <img src='<?php echo site_url($banner->banner_image); ?>' alt='' />
                </li>";
            <?php endforeach; ?>
        </ul>                   
    </div>
    <?php endif; ?>  
</div>
<script src="<?php echo site_url('retro/js/jquery.ui.touch-punch.min.js'); ?>" type='text/javascript'></script>
<script src="<?php echo site_url('retro/js/jquery.mousewheel.min.js');?>" type='text/javascript'></script>
<script src="<?php echo site_url('js/allinone_bannerRotator.js'); ?>" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
    $(function() {     
        $('#allinone_bannerRotator_classic').allinone_bannerRotator({
            skin: 'classic',
            width: 930,
            height: 300,
            thumbsWrapperMarginBottom:5
        });
    });
</script>



<div class="row-fluid">    
    <div class="span3">
        <div class="span12">
            <div class="widget worange">            
                <div class="widget-head">
                    <div class="pull-left"><?php echo $organiser->name; ?></div>              
                    <div class="clearfix"></div>
                </div>
                <div class="widget-content">                
                    <div class="padd">
                        <img src = "<?php echo site_url($organiser->logo_image); ?>" >
                    </div>
                </div>
                <div class="widget-foot text-right">
                    <?php echo ui_facebook_button($organiser->facebook_link); ?>
                    <?php echo ui_twitter_button($organiser->twitter_link); ?>
                    <div class="clearfix"></div>  
                </div>            
            </div>                                                     
        </div>
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
        
        
        <div class="row-fluid">
            <div class="span12">
        
                <div class="widget wblue">            
                    <div class="widget-head">
                        <div class="pull-left">About</div>              
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-content">                
                        <div class="padd">
                            <p><?php echo $organiser->about; ?></p>
                        </div>
                    </div>
                </div>
                
                        
            </div>
        </div>
        
        
        <div class="row-fluid">
            <div class="span12">
                <div class="nepsity-well well-blue">                        
                    <div class="row-fluid">
                        <h3 class="color-yellow">Announcement</h3>                                               
                    </div>                     
                    <div class="row-fluid">                                                               
                        <p><?php echo $organiser->announcement; ?></p>                        
                    </div>            
                </div>        
            </div>
        </div>
        
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget wblue">                    
                    <div class="widget-head">
                      <div class="pull-left">Contact</div>                      
                      <div class="clearfix"></div>
                    </div>
                    
                    <div class="widget-content">
                      
                      <div class="padd">
                        <div class="support-contact">
                            <p><?php echo $organiser->contact_address; ?></p>                             
                            <!--
                            <i class="icon-phone"></i> Phone<strong>:</strong> 123-456-7890
                            <hr>
                            <i class="icon-envelope-alt"></i> Email<strong>:</strong> something@gmail.com
                            <hr>
                            <i class="icon-home"></i> Address<strong>:</strong> 12, Srtington Street, NY, USA 
                            <hr>                            
                            <a href="contact.html" class="btn btn-danger">Contact Us</a> <a href="faq.html" class="btn btn-success">Check out FAQ</a>
                            -->
                         </div>
                      </div>
                    </div>    
                </div>               
            </div>
            
            
            <div class="span6">
                <div class="widget wblue">
					<div class="widget-head">
						<div class="pull-left">Members</div>						
						<div class="clearfix"></div>
					</div>
					<div class="widget-content">
						<div class="padd">
							<div class="user">
								<!--<div class="user-pic">									
									<a href="#"><img src="img/user-big.jpg" alt=""></a>
								</div>
								<div class="user-details">-->
									<!--<h6>member name</h6>-->
									<p><?php echo $organiser->members; ?></p>
									<!--
									<a href="#" class="btn btn-mini btn-success"><i class="icon-envelope-alt"></i></a>
									<a href="#" class="btn btn-info btn-mini"><i class="icon-user"></i></a>
									-->
								</div>
								<!--<div class="clearfix"></div>-->
							</div>

					</div>

              </div>                
            </div>
            
        </div>
        
        
        
                 
    </div>
</div>
