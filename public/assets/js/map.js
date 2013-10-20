$(document).ready(function() {
	$(window).resize(function() {
		var highest = 0;
		$("#map .room, #map .block, #map .seat_container").each(function() {
			$(this).height(Math.ceil($(this).width() * ($(this).data('ratio')/100)));

			var tmp = $(this).position().top + $(this).height();

			if(tmp > highest)
				highest = tmp;
		});

		$("#map").height(highest);
	});

	$(window).resize();
	$(window).resize();
});