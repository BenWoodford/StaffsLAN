$(document).ready(function() {
	$(".seat").each(function() { 
		//$(this).tooltip();

		var content;
		if($(this).data('name')) {
			content = '<img src="' + $(this).data('avatar') + '" /><span class="name">' + $(this).data('name') + '</span><span class="time">' + ($(this).data('signin') ? "In/Out time: " + $(this).data('signin') : "") + '</span>';
		} else {
			if($(this).data('type') == 'volunteer' && ticket_type != 'volunteer') {
				content = "Volunteer seats cannot be pre-booked.";
			} else if($(this).data('type') == 'player' && ticket_type != 'player') {
				content = "As a volunteer, please book a volunteer seat.";
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

	$("#map-container").pan();
});
