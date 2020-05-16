<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <!-- Title and other stuffs -->
        <title>Nepsity.com - Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">    
      
        <link href="<?php echo site_url('css/bootstrap.css'); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo site_url('css/font-awesome.css'); ?>">   
        <link rel="stylesheet" href="<?php echo site_url('css/jquery-ui.css'); ?>"> 
        <link rel="stylesheet" href="<?php echo site_url('css/fullcalendar.css'); ?>">
        <link rel="stylesheet" href="<?php echo site_url('css/prettyPhoto.css'); ?>">   
        <link rel="stylesheet" href="<?php echo site_url('css/rateit.css'); ?>">
        <link rel="stylesheet" href="<?php echo site_url('css/bootstrap-datetimepicker.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo site_url('css/jquery.gritter.css'); ?>">
        <link rel="stylesheet" href="<?php echo site_url('css/jquery.cleditor.css'); ?>"> 
        <link rel="stylesheet" href="<?php echo site_url('css/bootstrap-toggle-buttons.css'); ?>">
        <link href="<?php echo site_url('css/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo site_url('css/widgets.css'); ?>" rel="stylesheet">   
        <link href="<?php echo site_url('css/bootstrap-responsive.css'); ?>" rel="stylesheet">
        
        
        
        <link href="<?php echo site_url('css/nepsity-ui.css'); ?>" rel="stylesheet">               
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('retro/css/allinone_bannerWithPlaylist.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('css/allinone_bannerRotator.css'); ?>">
        
        
        
          
        <!-- HTML5 Support for IE -->
        <!--[if lt IE 9]>
            <script src="<?php echo site_url('js/html5shim.js'); ?>"></script>
        <![endif]--> 
        <link rel="shortcut icon" href="img/favicon/favicon.png">
    </head>
    <body>
        <!-- JS -->
        <script src="<?php echo site_url('js/jquery.js'); ?>"></script> <!-- jQuery -->
        <script src="<?php echo site_url('js/bootstrap.js'); ?>"></script> <!-- Bootstrap -->
        <script src="<?php echo site_url('js/jquery-ui-1.10.2.custom.min.js'); ?>"></script> <!-- jQuery UI -->
        <script src="<?php echo site_url('retro/js/jquery.ns-calendar.js'); ?>" type="text/javascript"></script>
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
        
     
        <div class="navbar navbar-fixed-top navbar-inverse">
			<div class="navbar-inner">
				<div class="nepsity-container">
					<!-- Menu button for smallar screens -->
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
					<!-- Site name for smallar screens -->
					<a href="<?php echo site_url('');?>" class="brand"> <img src="<?php echo site_url('img/logo.png');?>" title="<?php echo $meta_title; ?>" /> </a>
				</div>
			</div>
		</div>

        <!-- Main content starts -->
        <div class="nepsity-container nepsity-content">                        
            <div class="container">
                
                <div class="row-fluid nav navbar background-blue">
                    <ul class="nav">
                        <li><a href="<?php echo site_url(); ?>"><img src=<?php echo site_url('img/menu_home.png');?>></a></li>
                        <li><?php echo anchor('event', 'Events'); ?></li>
                        <li><?php echo anchor('organiser', 'Organisers'); ?></li>
                    </ul>                    
                    <ul class="nav pull-right">
                        <li><?php echo anchor('page/help','Help / FAQ'); ?></li>                            
                        <li><?php echo anchor('page/contact', 'Contact'); ?></li>
                    </ul>
                </div>
                
                <!--LOAD PAGE_VIEW -->
                <?php $this->load->view($page_view); ?>
                                
            </div>
            
            
           <div class="clearfix"></div>        
        </div> 
        
        
        <div class="nepsity-container">
            <div class="row-fluid">
                <div class="span12 well-dark footerbar">        
                    <div class="footerWrapper container">
                        
                        <div class="row-fluid">
                            <div class="span12">
                                <p>Our Partners</p>    
                            </div>
                        </div>
                                  
                        <div class="row-fluid">
                            <div class="partnersLogo span12">
                                <!-- TODO GET IT FROM DATABASE -->
                                <ul>                                    
                                    <li><a href='http://nepsity.com/admin/organiser/detail/1'><img title="Signaturee Crew" src="/media/images/partners/thesignaturee.png"></a></li>
                                    <li><a href='http://nepsity.com/admin/organiser/detail/16'><img title="TopEventUK" src="/media/images/partners/topeventuk.png"></a></li>
                                    <li><a href='http://nepsity.com/admin/organiser/detail/7'><img title="UnitedNepalese" src="/media/images/partners/united-nepalese.png"></a></li>
                                    <li><a href='http://nepsity.com/admin/organiser/detail/4'><img title="Hawachex Entertainment" src="/media/images/partners/organiser_logo_hawachex.jpg"></a></li>
                                    <li><a href='http://nepsity.com/admin/organiser/detail/3'><img title="Lamis" src="/media/images/partners/lamis.png"></a></li>
                                    <li><a href='http://nepsity.com/admin/organiser/detail/5'><img title="Mero Fashion" src="/media/images/partners/mero-fashion.png"></a></li>
                                    <li><a href='http://nepsity.com/admin/organiser/detail/6'><img title="Nepali Rimjim" src="/media/images/partners/nepali-rimjim.png"></a></li>
                                    <li><a href='http://nepsity.com/admin/organiser/detail/2'><img title="Sahara FC" src="/media/images/partners/saharafc.png"></a></li>
                                    <li><a href='http://nepsity.com/admin/organiser/detail/15'><img title="Xtreme Event" src="/media/images/partners/xtreme-event.png"></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="row-fluid">
                            
                            <div class="span8">
                            <?php echo form_open('subscription/subscribe', array('id' => 'frmSubscription', 'class' => 'form-inline' )); ?>                                
                                <div class="control-group">    								    								
								    <label class="control-label" for="subscription_email">Stay Informed</label>
							         <input type="text" value autocomplete="off" maxlength="50" id="subscription_email" name="subscription_email" class="textbox" placeholder="Enter your Email address" spellcheck="false" style="outline:none;">
							         <?php echo form_submit('btnSubscribe', 'Subscribe', 'id="btnSubscribe" class="btn btn-primary"'); ?>		    								
    							</div>                                
                            <?php echo form_close(); ?>
                            </div>
                           
                           <div class="span4">
                                <?php echo form_open(); ?>
                                    <div class="control-group pull-right">
                                        <span>Stay Connected</span>
                                        <a href="https://www.facebook.com/pages/Nepsitycom/542788789087860?fref=ts">
                                            <img src="<?php echo site_url('img/fb.png');?> ">    
                                        </a>                                
                                        <a href="https://twitter.com/NepsityTeam">
                                            <img src="<?php echo site_url('img/tw.png');?> ">
                                        </a>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>                           
                        </div>
                        <div class="row-fluid">
                            <!--TODO CONFIGURATION DATABASE -->
                            NEPSITY LIMITED (Registered in England and Wales, Company No. 2093840293) Registered Office: 48 Rosslyn Avenue, Feltham, TW14 9LQ England
                        </div>                                                                    
                    </div>                              
                    <div class="row-fluid footerMenu">
                        <div class="span8">
                            <!-- TODO GET FOOTER MENU FROM DATABASE -->
                            <ul class="menu-list">
                                <li><?php echo anchor('page/about', 'About us'); ?></li>
                                <li><?php echo anchor('page/contact', 'Contract Us'); ?></li>
                                <li><?php echo anchor('page/privacy', 'Privay &amp Cookies'); ?></li>
                                <li><?php echo anchor('page/help', 'Help / FAQ'); ?></li>                      
                            </ul>                                                        
                        </div>
                        
                        <div class="span4">
                            <span class="text-right">Copyright 2013 Nepsity.com. All rights reserved</span>                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
                      
    </body>    
</html>