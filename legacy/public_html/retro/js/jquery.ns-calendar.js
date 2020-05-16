$(function() {
	var bubbleTimer;
	//CALENDAR
	var months = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
	var monthNames = ['January','February','March','April','May','June','July','August','September','October','November','December'];
	var weekDays = ['S','M','T','W','T','F','S'];
	
	
	var events = [];
	
	//$.getJSON('./service.php?option=home&action=events&datatemplate=Events', function( data, textStatus, xhr ) {
	$.getJSON('http://localhost/nepsity/public_html/event/service/2013/12', function( data, textStatus, xhr ) {	

		if(xhr.status == 500 || xhr.status == 404 || xhr.status == 503) {
			alert("Error " + textStatus);
			
		} else {
			events = data.events;				
			__redrawCalendar();
		}		
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
});