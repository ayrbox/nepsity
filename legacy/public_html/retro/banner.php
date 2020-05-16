<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="media/favicon/favicon.ico" type="image/x-icon" />
		<title>Nepsity.com</title>
		
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script src="<?php echo ROOT.DS.'layout'.DS.'js'.DS ?>jquery.backstretch.min.js"></script>
		<script src="<?php echo ROOT.DS.'layout'.DS.'js'.DS ?>preloader.js"></script> 
		<script src="<?php echo ROOT.DS.'layout'.DS.'js'.DS ?>jquery.flip.js"></script>  		
		<script src="<?php echo ROOT.DS.'layout'.DS.'js'.DS ?>jquery.caroufredsel.js"></script>
		
		<script type="text/javascript">
			function openItem( $item ) {
				$item.find( 'img[src*="-grey"]' ).stop().fadeTo( 1500, 0 );
				$item.addClass( 'selected' );
				$item.stop().animate({
					height: 363
				});
				$('body').css( 'backgroundColor', $item.css( 'backgroundColor' ) );
			}

			$(function() {
				$('#carousel').carouFredSel({
					circular: false,
					infinite: true,
					width: '100%',
					height: 405,
					items: 3,
					auto: false,
					prev: '#prev',
					next: '#next',
					scroll: {
						items: 1,
						duration: 1000,
						easing: 'quadratic',
						onBefore: function( data ) {
							data.items.old.find( 'img[src*="-grey"]' ).stop().fadeTo( 500, 1 );
							data.items.old.removeClass( 'selected' );
							data.items.old.stop().animate({
								height: 315
							});
							$('body').css( 'backgroundColor', '#ddd' );
						},
						onAfter: function( data ) {
							openItem( data.items.visible.eq( 1 ) );
						}
					},
					onCreate: function( data ) {
						openItem( data.items.eq( 1 ) );
					}
				});
				
				
				
				
			var bubbleTimer;
			//CALENDAR
			var months = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
			var monthNames = ['January','February','March','April','May','June','July','August','September','October','November','December'];
			var weekDays = ['S','M','T','W','T','F','S'];
			
			
			var events = [];
			
			$.getJSON('./service.php?option=home&action=events&datatemplate=Events', function( data ) {				
				events = data.events;
				__redrawCalendar();
			}).error(function() { 
				alert("Unexpected Error : Loading Events") 
			});
			
			var todayDate = new Date();			
			var currentYear = todayDate.getFullYear();
			var currentMonthIndex = todayDate.getMonth();
			
			//calendar navigation
			$('.nav-last-year').click(function() {
				currentYear--;				
				__redrawCalendar();
			});
			
			$('.nav-last-month').click(function() {
				currentMonthIndex--;
				if(currentMonthIndex < 0) { currentMonthIndex = 11; currentYear--; }
				__redrawCalendar();
			});
			
			$('.nav-next-month').click(function() {
				currentMonthIndex++;
				if(currentMonthIndex > 11) { currentMonthIndex = 0; currentYear++; }
				__redrawCalendar();
			});
			
			$('.nav-next-year').click(function() {
				currentYear++;
				__redrawCalendar();
			});
			
			var todayDate = new Date();			
			var dateIndex = todayDate.getDate();			
			var monthIndex = todayDate.getMonth();
			var yearIndex = todayDate.getFullYear();
			
			function __redrawCalendar() {
				$('#month-selected').text(monthNames[currentMonthIndex] + ' ' + currentYear);
								
				//create calendar weekday
				var ulWeekday = $('<ul></ul>');
				var ulDays = $('<ul></ul>');
				
				var dateFirst = new Date(currentYear, currentMonthIndex, 1);
				
				var weekday = dateFirst.getDay();
				
				for(i=1; i <= months[currentMonthIndex]; i++) {
				
					var oWeekDay = $('<li><div>'+weekDays[weekday]+'</div></li>');					
					var oDay = $('<li><div>'+i+'</div></li>');
					
					if(i==dateIndex && currentMonthIndex == monthIndex && currentYear == yearIndex) {
						$('div',oWeekDay).addClass('today');
						$('div',oDay).addClass('today');
					}
										
					$(events).each(function(eventIndex, event) {						
						var stringEventDate = event.eventDate.split('/');						
						var eDate = new Date(stringEventDate[2], stringEventDate[1], stringEventDate[0]);
						
						if(i==stringEventDate[0] 
							&& currentMonthIndex == parseInt(stringEventDate[1])-1
							&& currentYear == parseInt(stringEventDate[2])) 
						{						
							$('div', oDay)
								.unbind('mouseenter')
								.unbind('mouseleave');
								
							$('div', oDay).addClass('event')
								.bind('mouseenter', showBubble)
								.bind('mouseleave', hideBubble);		
						}
					});
					
					
					oWeekDay.appendTo(ulWeekday);
					oDay.appendTo(ulDays);
					
					weekday++;
					if(weekday > 6) weekday=0;
				}				
				$('.calendar-weekday').empty().append(ulWeekday);
				$('.calendar-day').empty().append(ulDays);
			}
			
			var showBubble = function(event) {				
				clearInterval(bubbleTimer);
				
				var __event = $(this);
				
				var __html = '';
				$(events).each(function(eventIndex, event) {						
					var stringEventDate = event.eventDate.split('/');						
					var eDate = new Date(stringEventDate[2], stringEventDate[1], stringEventDate[0]);														
					if(parseInt(__event.text())==stringEventDate[0] 
						&& currentMonthIndex == parseInt(stringEventDate[1])-1
						&& currentYear == parseInt(stringEventDate[2])) 
					{
						__html += '<div class="event-title">';						
						__html += '<a class="title-link" href="'+ event.eventLink +'">' + event.eventTitle + '</a>';
						__html += '<p class="event-description">';
						__html += event.eventDescription;
						__html += '</p></div>';
					}
				});
				
				$('#event-container','#event-bubble').html(__html);
				$('#event-bubble')					
					.show()
					.position({
						of: $(__event),
						my: 'center top',
						at: 'center bottom',
						collision: 'flip flip'
					});
			};
			
			var hideBubble = function(event) {
				bubbleTimer = setInterval(function() {
					$('#event-bubble').fadeOut(500);
					clearInterval(bubbleTimer);
				}, 500);
			};
			
			$('#event-bubble').mouseenter(function() {
				clearInterval(bubbleTimer);
			}).mouseleave(function() {
				hideBubble();
			});
			
			$(document.body).on("mouseenter", ".event-title", function( event ) {				
				$('.event-description', this).show();				
			}).on("mouseleave", ".event-title", function( event) {
				$('.event-description', this).hide();
			}).on("click", ".event-description", function( event ) {
				var titleLink = $(this).parent().find('.title-link');				
				if(titleLink) {
					window.location.href = $(titleLink).attr('href');					
				}				
			});
			
			__redrawCalendar();
			
			$('#partners-container').mousemove(function(e) {
				var containerWidth = $('#partners-container').outerWidth();				
				var range = $('ul','#partners-container').outerWidth() - containerWidth;				
				var movement = (e.pageX / containerWidth) * range;
				movement -= 130;
				//$('ul','#partners-container').scrollLeft(-movement);
				$('ul','#partners-container').css('margin-left','-'+movement+'px');				
				//$('#logo').text(movement).css('color','#fff');
			});	
			
			var scrollerSize = 0;
			$('ul','#partners-container').children().each(function() {
				scrollerSize += 185;
			});			
			$('ul','#partners-container').css('width', scrollerSize + 'px');
			
			
			});
					
		</script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo ROOT.DS.'layout'.DS.'css'.DS.'default.css'?>">				
	</head>
	<body>		
		<div class="arrow down-arrow"></div>
		<div id="toolbar">
			<a href="/"><div id="logo"></div></a>			
			<div id="toolbar-right">
				
				<div class="toolbar-icon facebook"></div>
				<div class="toolbar-icon twitter"></div>				
				<div id="search-bar">					
					<input type="text" class="search" >
				</div>
				<div id="menu-bar">
					<ul>
						<li><a href='#'>Events</a></li>
						<li><a href='#'>Login | Register</a></li>
						<!--<li><a href='#'>Register</a></li>-->
						<li class="menu-more">
							<a href='#'></a>
							<ul>
								<li><a href='#'>More 1</a></li>
								<li><a href='#'>more 2</a></li>
							</ul>
						</li>
					</ul>
				</div>
				
			</div>
		</div>
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
		
		<?php echo $content; ?>
		
		<div id="partners-container" style="display: block;">
			<ul>
				<li><a href="#"><span></span><img alt="Signaturee Crew" src="media/images/partners/thesignaturee.png"></a></li>
				<li><a href="javascript:goToContent(1)"><img alt="Image 1" src="media/images/partners/google.png"></a></li>
				<li><a href="javascript:goToContent(2)"><img alt="Image 2" src="media/images/partners/ms.png"></a></li>
				<li><a href="javascript:goToContent(3)"><img alt="Image 3" src="media/images/partners/apple.png"></a></li>								
			</ul>		
		</div>		
	</body>
</html>