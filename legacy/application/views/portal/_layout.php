<?php $this->load->view('portal/components/_header.php'); ?>
<body>

<div class="navbar navbar-fixed-top navbar-inverse">
      <div class="navbar-inner">
    	<div class="container">
    	        		
    		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>    
    		<a href="<?php echo site_url('');?>" class="brand"> <img src="<?php echo site_url('img/logo.png');?>" title="<?php echo $meta_title; ?>" /> </a>
    
    		<div class="nav-collapse collapse">
    			<ul class="nav pull-right">
    				<li class="dropdown pull-right">
    					<a data-toggle="dropdown" class="dropdown-toggle" href="#"> 
					       <?php echo $organiser->name; ?>
					       <b class="caret"></b> 
				       </a>    
    					<ul class="dropdown-menu">
    						<li><a href="#"><i class="icon-user"></i> Profile</a></li>
    						<li><a href="#"><i class="icon-cogs"></i> Settings</a></li>
    						<li><a href="login.html"> <?php echo anchor('security/logout','<i class="icon-off"></i>Logout');?></li>
    					</ul>
    				</li>
    			</ul>
    		</div>
    	</div>
    </div>
</div>





<div class="content">    
    <div class="sidebar">
        
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>
        <div class="sidebar-inner">           
          <div class="sidebar-widget">
            <!--<form class="form-inline">
              <div class="input-append row-fluid">
                <input type="text" class="span8" placeholder="Search">
                <button type="submit" class="btn btn-info">Search</button>
              </div>
            </form>-->
          </div>
          
          <ul class="navi">
                                                      
            <?php foreach($navigation as $item) {           
                echo ui_sidebar_navigation($item, $navigation_code);                  
            }?>
          <!-- Date -->

          <div class="sidebar-widget">
            <div id="todaydate"></div>
          </div>



        </div>

    </div>

    <!-- Sidebar ends -->

    <!-- Main bar -->
    <div class="mainbar">
              
        <?php $this->load->view($page_view); ?>
        
    </div>

   <!-- Mainbar ends -->            
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
<?php $this->load->view('portal/components/_footer.php'); ?>
