<div id="map">
<?php
foreach($rooms as $room) {
	echo '<div class="room" style="top: ' . $room->room_locy . '%; left: ' . $room->room_locx . '%; width: ' . $room->room_width . '%;" data-ratio="' . $room->room_height . '" id="room' . $room->id . '">';

	foreach($room->blocks as $block) {
		echo '<div class="block" style="top: ' . $block->block_locy . '%; left: ' . $block->block_locx  . '%; width: ' . $block->block_width . '%;" data-ratio="' . $block->block_height . '" id="block' . $block->id . '">';

		foreach($block->seats as $seat) {
			echo '<div class="seat_container" style="top: ' . $seat->seat_locy . '%; left: ' . $seat->seat_locx . '%; width: ' . $seat->seat_width . '%;" data-ratio="' . $seat->seat_height . '" id="seat' . $seat->id . '"><div class="seat' . ($seat->isOccupied() ? " occupied" : "") . '">' . $block->block_shorthand . $seat->seat_num . '<i class="icon-arrow-' . $seat->seat_direction . '"></i></div>';
			echo '</div>';
		}

		echo '</div>';
	}
	echo '</div>';
}
?>
</div>