// Set the date we're counting down to
var countDownDate = new Date("<?php echo esc_js($displayDate) . ' ' . esc_js($displayTime); ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result
    if ( days == 0 ) {
    	if ( hours == 0 ) {
         document.getElementById("displayCounter").innerHTML = minutes + "m " + seconds + "s ";
    	}else {
         document.getElementById("displayCounter").innerHTML = hours + "h "
         + minutes + "m " + seconds + "s ";
    	}
    } 
    else 
    {
     document.getElementById("displayCounter").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    }
    
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("displayCounter").innerHTML = "<?php echo esc_js($displayCountDownOverText);?>";
    }
}, 1000);



document.addEventListener('DOMContentLoaded', function(){


	var currentTime = document.getElementById('current-time'),
		currentDate = document.getElementById('current-date');
	
	setInterval(function() {
		var d = new Date();
	
			var month = formatMonth(d.getMonth()),
			year = d.getFullYear(),
			date = d.getDate(),
			hours = d.getHours(),
			minutes = d.getMinutes(),
			ampm = 'AM';

			if (hours > 12) {
			hours -= 12;
			ampm = 'PM';
		} else if (hours === 0) {
			hours = 12;
		}
		
		if (minutes < 10) {
			minutes = '0' + minutes;
		}
		
		var sepClass = '';
		if (d.getSeconds() % 2 === 1) {sepClass = 'trans';}
		
		var sep = '<span class="' + sepClass + '">:</span>';
	
		currentTime.innerHTML = hours + sep + minutes + ' ' + ampm;
			
		currentDate.textContent = month + ' ' + date + ', ' + year;
		
	}, 1000);

		function formatMonth(m) {
		m = parseInt(m, 10);
	
		if (m < 0) {
			m = 0;
		} else if (m > 11) {
			m = 11;
		}
		
	
		var monthNames = [
			'January', 'February', 'March',
			'April', 'May', 'June', 
			'July', 'August', 'September',
			'October', 'November', 'December'
		];
		
		return monthNames[m];
	    }

});