$(document).ready(function() {
	$("#event_list .event").each(function() {
		var date = $(this).data('date');
		var startTime = $(this).data('start-time');
		var endTime = $(this).data('end-time');

		if($(this).hasClass('multiday')) {
			$("#multiday .box-content").append($(this));
		} else {
			var newrow = $('.day[data-date="' + date + '"] .time-row[data-time="' + startTime + '"]');
			var endrow = $('.day[data-date="' + date + '"] .time-row[data-time="' + endTime + '"]');

			$(this).height($(endrow).offset().top - $(newrow).offset().top - 10);

			$(newrow).append($(this));
		}
	});
});