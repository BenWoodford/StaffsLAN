<div class="box">
	<div class="box-header">
		<h2>
			<i class="icon-info"></i>
			Legend
		</h2>
	</div>
	<div class="box-content">
		<div id="legend" class="row">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="seat_container"><div class="seat" data-type="player"></div></div>
				<span>Available</span>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="seat_container"><div class="seat occupied" data-type="player"></div></div>
				<span>Occupied</span>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="seat_container"><div class="seat ingame" data-type="player"></div></div>
				<span>In-Game</span>
			</div>

			<div class="col-lg-offset-2 col-md-offset-2 col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="seat_container"><div class="seat" data-type="volunteer"></div></div>
				<span>Volunteer</span>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="seat_container"><div class="seat" data-type="staff"></div></div>
				<span>Committee</span>
			</div>
		</div>
	</div>
</div>

<div class="box">
	<div class="box-header">
		<h2>
			<i class="icon-map-marker"></i>
			Live Player Map
		</h2>
	</div>
	<div class="box-content">
		<div id="map">
		<?php
		foreach($rooms as $room) {
			echo '<div class="room" style="top: ' . $room->room_locy . '%; left: ' . $room->room_locx . '%; width: ' . $room->room_width . '%;" data-ratio="' . $room->room_height . '" id="room' . $room->id . '">';

			foreach($room->blocks as $block) {
				echo '<div class="block" style="top: ' . $block->block_locy . '%; left: ' . $block->block_locx  . '%; width: ' . $block->block_width . '%;" data-ratio="' . $block->block_height . '" id="block' . $block->id . '">';

				foreach($block->seats as $seat) {
					echo '<div class="seat_container" style="top: ' . $seat->seat_locy . '%; left: ' . $seat->seat_locx . '%; width: ' . $seat->seat_width . '%;" data-ratio="' . $seat->seat_height . '" id="seat' . $seat->id . '"><div class="seat' . ($seat->isOccupied() ? " occupied" : "") . '" data-type="' . $seat->seat_type . '">' . $block->block_shorthand . $seat->seat_num . '<i class="icon-arrow-' . $seat->seat_direction . '"></i></div>';
					echo '</div>';
				}

				echo '</div>';
			}
			echo '</div>';
		}
		?>
		</div>
	</div>
</div>