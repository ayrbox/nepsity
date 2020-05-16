<?php $this->load->view('components/_header.php'); ?>
<body>

<div class="navbar navbar-fixed-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <!-- Menu button for smallar screens -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
      </a>
      <!-- Site name for smallar screens -->      
      <a href="<?php echo site_url('');?>" class="brand">          
          <img src="<?php echo site_url('img/logo.png');?>" title="<?php echo $meta_title; ?>" />          
      </a>
      

      <!-- Navigation starts -->
      <!--
      <div class="nav-collapse collapse">        
        <!-- Links -- >
        <ul class="nav pull-right">
          <li class="dropdown pull-right">            
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <img src="<?php echo site_url('img/user.jpg'); ?>" alt="" class="nav-user-pic" /> Admin <b class="caret"></b>              
            </a>
            
            <!-- Dropdown menu -- >
            <ul class="dropdown-menu">3
              <li><a href="#"><i class="icon-user"></i> Profile</a></li>
              <li><a href="#"><i class="icon-cogs"></i> Settings</a></li>
              <li><a href="login.html">
                  <?php echo anchor('user/logout','<i class="icon-off"></i>Logout');?>
              </li>
            </ul>
          </li>
          
        </ul>

        <!-- Notifications -- >
        <ul class="nav pull-right">
          
          <!-- Comment button with number of latest comments count -- >
            <li class="dropdown dropdown-big">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="icon-comments"></i> Chats <span   class="badge badge-info">6</span> 
              </a>

                <ul class="dropdown-menu">
                  <li>
                    <!-- Heading - h5 -- >
                    <h5><i class="icon-comments"></i> Chats</h5>
                    <!-- Use hr tag to add border -- >
                    <hr />
                  </li>
                  <li>
                    <!-- List item heading h6 -- >
                    <a href="#">Hi :)</a> <span class="label label-warning pull-right">10:42</span>
                    <div class="clearfix"></div>
                    <hr />
                  </li>
                  <li>
                    <a href="#">How are you?</a> <span class="label label-warning pull-right">20:42</span>
                    <div class="clearfix"></div>
                    <hr />
                  </li>
                  <li>
                    <a href="#">What are you doing?</a> <span class="label label-warning pull-right">14:42</span>
                    <div class="clearfix"></div>
                    <hr />
                  </li>                  
                  <li>
                    <div class="drop-foot">
                      <a href="#">View All</a>
                    </div>
                  </li>                                    
                </ul>
            </li>

            <!-- Message button with number of latest messages count-- >
            <li class="dropdown dropdown-big">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="icon-envelope-alt"></i> Inbox <span class="badge badge-important">6</span> 
              </a>

                <ul class="dropdown-menu">
                  <li>
                    <!-- Heading - h5 -- >
                    <h5><i class="icon-envelope-alt"></i> Messages</h5>
                    <!-- Use hr tag to add border -- >
                    <hr />
                  </li>
                  <li>
                    <!-- List item heading h6 -- >
                    <a href="#">Hello how are you?</a>
                    <!-- List item para -- >
                    <p>Quisque eu consectetur erat eget  semper...</p>
                    <hr />
                  </li>
                  <li>
                    <a href="#">Today is wonderful?</a>
                    <p>Quisque eu consectetur erat eget  semper...</p>
                    <hr />
                  </li>
                  <li>
                    <div class="drop-foot">
                      <a href="#">View All</a>
                    </div>
                  </li>                                    
                </ul>
            </li>

            <!-- Members button with number of latest members count -- >
            <li class="dropdown dropdown-big">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="icon-user"></i> Users <span   class="badge badge-success">6</span> 
              </a>

                <ul class="dropdown-menu">
                  <li>
                    <!-- Heading - h5 -- >
                    <h5><i class="icon-user"></i> Users</h5>
                    <!-- Use hr tag to add border -- >
                    <hr />
                  </li>
                  <li>
                    <!-- List item heading h6-- >
                    <a href="#">Ravi Kumar</a> <span class="label label-warning pull-right">Free</span>
                    <div class="clearfix"></div>
                    <hr />
                  </li>
                  <li>
                    <a href="#">Balaji</a> <span class="label label-important pull-right">Premium</span>
                    <div class="clearfix"></div>
                    <hr />
                  </li>
                  <li>
                    <a href="#">Kumarasamy</a> <span class="label label-warning pull-right">Free</span>
                    <div class="clearfix"></div>
                    <hr />
                  </li>                  
                  <li>
                    <div class="drop-foot">
                      <a href="#">View All</a>
                    </div>
                  </li>                                    
                </ul>
            </li> 
        </ul>
      </div>-->
      
      <!-- NAV BAR ENDS -->
    </div>
  </div>
</div>





<!-- Main content starts -->
<div class="content">
    <div class="mainbar" style="margin-left:0;">              
        <?php $this->load->view($page_view); ?>
    </div>            
   <div class="clearfix"></div>   
</div>





<!-- Content ends -->


        <!-- Scroll to top -->
        <span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 
        
        <!-- JS -->        
        <script src="<?php echo site_url('js/fullcalendar.min.js'); ?>"></script> <!-- Full Google Calendar - Calendar -->
        <script src="<?php echo site_url('js/jquery.rateit.min.js'); ?>"></script> <!-- RateIt - Star rating -->
        <script src="<?php echo site_url('js/jquery.prettyPhoto.js'); ?>"></script> <!-- prettyPhoto -->
        
        <!-- jQuery Flot -->
        <script src="<?php echo site_url('js/excanvas.min.js'); ?>"></script>
        <script src="<?php echo site_url('js/jquery.flot.js'); ?>"></script>
        <script src="<?php echo site_url('js/jquery.flot.resize.js'); ?>"></script>
        <script src="<?php echo site_url('js/jquery.flot.pie.js'); ?>"></script>
        <script src="<?php echo site_url('js/jquery.flot.stack.js'); ?>"></script>
        
        <script src="<?php //echo site_url('js/jquery.gritter.min.js'); ?>"></script> <!-- jQuery Gritter -->
        <script src="<?php echo site_url('js/sparklines.js'); ?>"></script> <!-- Sparklines -->
        <script src="<?php echo site_url('js/jquery.cleditor.min.js'); ?>"></script> <!-- CLEditor -->
        <script src="<?php echo site_url('js/bootstrap-datetimepicker.min.js'); ?>"></script> <!-- Date picker -->
        <script src="<?php echo site_url('js/jquery.toggle.buttons.js'); ?>"></script> <!-- Bootstrap Toggle -->
        <script src="<?php echo site_url('js/filter.js'); ?>"></script> <!-- Filter for support page -->
        <script src="<?php echo site_url('js/custom.js'); ?>"></script> <!-- Custom codes -->
        <script src="<?php echo site_url('js/charts.js'); ?>"></script> <!-- Custom chart codes -->
        
        
        <!-- Script for this page -->        
<script type="text/javascript">
$(function () {

    /* Bar Chart starts */

    var d1 = [];
    for (var i = 0; i <= 30; i += 1)
        d1.push([i, parseInt(Math.random() * 30)]);

    var d2 = [];
    for (var i = 0; i <= 30; i += 1)
        d2.push([i, parseInt(Math.random() * 30)]);


    var stack = 0, bars = true, lines = false, steps = false;
    
    function plotWithOptions() {
        $.plot($("#bar-chart"), [ d1, d2 ], {
            series: {
                stack: stack,
                lines: { show: lines, fill: true, steps: steps },
                bars: { show: bars, barWidth: 0.8 }
            },
            grid: {
                borderWidth: 0, hoverable: true, color: "#777"
            },
            colors: ["#52b9e9", "#0aa4eb"],
            bars: {
                  show: true,
                  lineWidth: 0,
                  fill: true,
                  fillColor: { colors: [ { opacity: 0.9 }, { opacity: 0.8 } ] }
            }
        });
    }

    plotWithOptions();
    
    $(".stackControls input").click(function (e) {
        e.preventDefault();
        stack = $(this).val() == "With stacking" ? true : null;
        plotWithOptions();
    });
    $(".graphControls input").click(function (e) {
        e.preventDefault();
        bars = $(this).val().indexOf("Bars") != -1;
        lines = $(this).val().indexOf("Lines") != -1;
        steps = $(this).val().indexOf("steps") != -1;
        plotWithOptions();
    });

    /* Bar chart ends */

});


/* Curve chart starts */

$(function () {
    var sin = [], cos = [];
    for (var i = 0; i < 14; i += 0.5) {
        sin.push([i, Math.sin(i)]);
        cos.push([i, Math.cos(i)]);
    }

    var plot = $.plot($("#curve-chart"),
           [ { data: sin, label: "sin(x)"}, { data: cos, label: "cos(x)" } ], {
               series: {
                   lines: { show: true, 
                            fill: true,
                            fillColor: {
                              colors: [{
                                opacity: 0.05
                              }, {
                                opacity: 0.01
                              }]
                          }
                  },
                   points: { show: true }
               },
               grid: { hoverable: true, clickable: true, borderWidth:0 },
               yaxis: { min: -1.2, max: 1.2 },
               colors: ["#fa3031", "#43c83c"]
             });


    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y + 5,
            width: 100,
            left: x + 5,
            border: '1px solid #000',
            padding: '2px 8px',
            color: '#ccc',
            'background-color': '#000',
            opacity: 0.9
        }).appendTo("body").fadeIn(200);
    }

    var previousPoint = null;
    $("#curve-chart").bind("plothover", function (event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));

            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    
                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                    
                    showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;            
            }
    }); 

    $("#curve-chart").bind("plotclick", function (event, pos, item) {
        if (item) {
            $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
            plot.highlight(item.series, item.datapoint);
        }
    });

});

/* Curve chart ends */
</script>
<!-- Notification box ends -->  
<?php $this->load->view('components/_footer.php'); ?>
