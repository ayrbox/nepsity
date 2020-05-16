<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="author" content="Nepsity Team" />
        <meta name="keywords" content="www.nepsity.com, nepsity.com, nepsity, event, promotion, tickets, nepal, nepali, nepalese, dance party, club, football, concert">
        <meta name="description" content="Get Started!! Register with Nepsity and start listing your events immediately. Unlimited FREE listing (for limited period only). So Hurry UP!!!" />   
        <meta http-equiv=”refresh” content=”30;URL=’http://nepsity.com’”>
        
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('retro/css/default.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo site_url('retro/css/allinone_bannerWithPlaylist.css'); ?>">      
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
                
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
        
        <script src="<?php echo site_url('retro/js/jquery.ui.touch-punch.min.js'); ?>" type='text/javascript'></script>
        <script src="<?php echo site_url('retro/js/jquery.mousewheel.min.js');?>" type='text/javascript'></script>
        <script src="<?php echo site_url('retro/js/allinone_bannerWithPlaylist.js');?>" type='text/javascript'></script>      
        <script src="<?php echo site_url('retro/js/jquery.ns-calendar.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo site_url('retro/js/jquery.flip.min.js'); ?>" type="text/javascript"></script>      
        <script src="<?php echo site_url('retro/js/jquery.validation.js'); ?>" type="text/javascript"></script>
        
        
    </head>
    <body>  
        
        <div class="pageWrapper">
            <div class="headerBar">
                <div class="headerWrapper">
                    <div class="logoHolder"><a href="<?php echo site_url(''); ?>" id="logo" title="Nepsity.com"> </a></div>
                    <div class="menuLeft">
                        <ul>                            
                            <form action="http://www.nepsity.com/admin/apps/search" method="post" accept-charset="utf-8">           
                                <input type="text" autocomplete="off" maxlength="50" id="searchBox" name="searchBox" placeholder="Type to search events" spellcheck="false" style="outline:none;">
                                <input type="submit" id="searchBtn" value="Search" title="Search">                          
                            </form>                 
                        </ul>
                    </div>
                    
                    
                    <?php
                    
                        if ( array_key_exists ('ci_session', $_COOKIE) ) {
                        
                        //if not logged in 
                        $ci_session = unserialize($_COOKIE['ci_session']);
                        
                        if(!array_key_exists('user_id', $ci_session)) {
                        
                        //if($ci_session['user_id'] == null) {
                    ?>
                    <div class="menuRight">                 
                        <ul>
                            <li class="loginBtn"><a href="./admin">Login</a></li>
                            <li class="registerBtn"><a href="./admin/login/registration">Register</a></li>
                        </ul>                                           
                    </div>
                    
                    <?php 
                    } else {
                        //if logged in                  
                    ?>
                    <div id="myProfile">
                        <ul id="navigation">
                            <li><a href="" class="profile">
                                <span class="profileName"><?php echo $ci_session['organiser']; ?></span>
                                <span class="profileIco"></span>
                                </a>
                                <div class="sub-nav-wrapper"><ul class="sub-nav">
                                    <li><a href='http://www.nepsity.com/admin/partner/event'>Your Events</a></li>
                                    <li><a href='http://www.nepsity.com/admin/partner/profile'>Profile</a></li>
                                    <li><a href='http://www.nepsity.com/admin/partner/security'>Settings</a></li>
                                    <li><a href='http://www.nepsity.com/admin/login/logout'>Logout</a></li>
                                </ul></div>
                            </li>
                        </ul>
                    </div> 
                    <?php } 
                    } else {?>
                    <div class="menuRight">
                        <ul>
                            <li class="loginBtn"><a href="./admin">Login</a></li>
                            <li class="registerBtn"><a href="./admin/login/registration">Register</a></li>
                        </ul>
                    </div>
                    <?php } ?>
                    <div class="clear"></div>
                </div> <!--headerWrapper div ends-->
            </div><!--headerBar div ends-->

            <div class="sideLinks">
                <div class="fb-like" data-href="https://www.facebook.com/pages/Nepsitycom/542788789087860?fref=ts" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true"></div>
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            </div>

            <div class="bodyWrapper">
                <div class="subHeaderBar">
                    <div class="subMenuWrapper">
                        <div id="homeAnchorBG"><a href="./" id="homeAnchor"></a></div>
                        <div class="subMenuLeft">   
                            <ul>                                
                                <li><a id="events" href='/admin/event/'>Events</a></li>
                                <li><a id="organisers" href='/index.php?option=organiser'>Organisers</a></li>
                            </ul>
                        </div>
                        <div class="subMenuRight">
                            <ul>
                                <li><a href="http://www.nepsity.com/admin/apps/page/help">Help / FAQ</a></li>
                                <!--<li><a href="http://www.nepsity.com/admin/apps/page/faq">FAQ</a></li>-->
                                <li><a href="http://www.nepsity.com/admin/apps/page/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!--subHeaderBar2 div ends-->
                
                
                <!---------- Contains main contents----------->
                
                <div class="mainContent">
                
                
                
                
                    <?php $this->load->view($page_view); ?>
                    
                    
                    
                    
                </div>
            </div> <!--bodyWrapper div ends-->
            <br class="clearfix"/>
        </div> <!--END OF PAGEWRAPPER-->

        <div class="footerBar"> 
            
            <div class="footerWrapper">
                <div class="space height-20"></div>
                <p>Our Partners</p>
                <div class="partnersLogo">
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
                
                <div class="space height-40"></div>
                <div class="socialLinks">
                    <div class="emailSubscribe">                            
                            <form id="frmSubscription" method="post" action="http://www.nepsity.com/admin/apps/subscribe">
                            <!--<form id="frmSubscription" method="post" action="http://localhost/admin/apps/subscribe">-->
                                <span>Stay Informed</span>
                                <input type="text" value autocomplete="off" maxlength="50" id="subscription_email" name="subscription_email" class="textbox" placeholder="Enter your Email address" spellcheck="false" style="outline:none;">
                                <input type="submit" id="btnSubscribe" class="subscribeBtn" value="Subscribe" title="Subscribe">
                            </form>
                    </div>
                    
                    <div class="socialBtn">
                            <span>Stay Connected</span>
                            <a href="https://www.facebook.com/pages/Nepsitycom/542788789087860?fref=ts" id="fbIco"></a>
                            <a href="https://twitter.com/NepsityTeam" id="twIco"></a>
                    </div>
                </div>
                <br class="clearfix"/>
                <div class="compReg">
                    NEPSITY LIMITED (Registered in England and Wales, Company No. 2093840293) Registered Office: 48 Rosslyn Avenue, Feltham, TW14 9LQ England
                </div>
            </div>          
            <div class="footerMenu">
                <div id="footerMenuWrapper">
                    <ul id="left">
                    <li><a href="http://www.nepsity.com/admin/apps/page/about">About us</a></li>
                    <li><a href="http://www.nepsity.com/admin/apps/page/contact">Contact us</a></li>
                    <li><a href="http://www.nepsity.com/admin/apps/page/privacy">Privacy & Cookies</a></li>
                    <li><a href="http://www.nepsity.com/admin/apps/page/help">Help / FAQ</a></li>                       
                    </ul>
                    <span>Copyright 2013 Nepsity.com. All rights reserved</span>
                </div>                  
            </div>
        </div> <!--footerBar div ends-->        
    </body>
</html>


<script type="text/javascript">
            $(function() {
                                
                $('#subscription_email').validation( { type: 'email' } );               
                
                
                $('#btnSubscribe').click(function() {                       
            
                    var validPage = true;
                    validPage = $('#subscription_email').validation('validateField') && validPage;
                    
                    if(!validPage) {
                        alert('Invalid email address.');
                        return false;
                    }
                    
                });     
        
        
            });
            
        jQuery("document").ready(function($){
    
            var headerWrapper = $('.headerBar');
            
            $(window).scroll(function () {
                if ($(this).scrollTop() > 0) {
                    headerWrapper.addClass("f-nav");
                } else {
                    headerWrapper.removeClass("f-nav");
                }
            });
         
        }); 
            
</script>