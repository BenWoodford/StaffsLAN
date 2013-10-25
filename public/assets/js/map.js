$(document).ready(function() {
	$(window).resize(function() {
		var highest = 0;
		$("#map .room, #map .block, #map .seat_container").each(function() {
			$(this).height(Math.ceil($(this).width() * ($(this).data('ratio')/100)));

			var tmp = $(this).position().top + $(this).height();

			if(tmp > highest)
				highest = tmp;
		});

		$("#map").height(highest + 20);
	});

	$(window).resize();
	$(window).resize();

	$(".seat").each(function() { 
		//$(this).tooltip();

		var content;
		if($(this).data('name')) {
			content = $(this).data('name') + '<img src="' + $(this).data('avatar') + '" />';
		} else {
			if($(this).data('type') == 'volunteer') {
				content = "Volunteer seats cannot be pre-booked.";
			} else if($(this).data('type') == 'staff') {
				content = "You cannot book committee-reserved seats";
			} else {
				content = "This seat has not been booked (yet!).<br /><b>Click to book this as your seat.</b>";
				$(this).click(function() {
					window.location = '/map//book/' + $(this).data('seat-id');
				});
			}
		}

		var title = "Seat: " + $(this).data('seat');

		$(this).popover({
			'content': content,
			'title': title,
			'html': true,
			'trigger': 'hover',
		});
	});
});