<div class="box">
	<div class="box-header">
		<h2>
			<i class="fa fa-info"></i>
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
			<i class="fa fa-map-marker"></i>
			Live Player Map
		</h2>
	</div>
	<div class="box-content" id="map-box">
		<p>You can click and drag the map to look around. Click on an <strong>Available</strong> seat to choose or change your seat!</p>
		<div id="map-container">
			<div id="map">
			<?php
			foreach($rooms as $room) {
				echo '<div class="room" style="top: ' . $room->room_locy . 'px; left: ' . $room->room_locx . 'px; width: ' . $room->room_width . 'px; height: ' . $room->room_height . 'px;" id="room' . $room->id . '">';

				foreach($room->blocks as $block) {
					echo '<div class="block" style="top: ' . $block->block_locy . 'px; left: ' . $block->block_locx  . 'px; width: ' . $block->block_width . 'px; height: ' . $block->block_height . 'px;" id="block' . $block->id . '">';

					if(count($block->seats) == 0) {
						echo '<span class="block-text">' . $block->block_name . '</span>';
					}

					foreach($block->seats as $seat) {
						echo '<div class="seat_container" style="top: '
								. $seat->seat_locy . 'px; left: '
								. $seat->seat_locx . 'px; width: '
								. $seat->seat_width . 'px; height: '
								. $seat->seat_height . 'px;" id="seat'
								. $seat->id . '">'
									. '<div data-toggle="tooltip" data-name="' . ($seat->user ? htmlentities($seat->user->username) : "") . '" data-avatar="' . ($seat->user && !empty($seat->user->avatar_url) ? $seat->user->avatar_url : "") . '" data-seat="' . $block->block_shorthand
										. $seat->seat_num . '" '
										. 'data-seat-id="' . $seat->id . '" class="seat'
										. ($seat->isOccupied() ? " occupied" : "")
										. '" data-type="' . $seat->seat_type . '">'
											. '<i class="fa fa-arrow-' . $seat->seat_direction . '"></i>';
						if($seat->user && !empty($seat->user->avatar_url)) {
							echo '<img src="' . $seat->user->avatar_url . '" />';
						}
							echo '</div>';
						echo '</div>';
					}

					echo '</div>';
				}
				echo '</div>';
			}
			?>
			</div>
			<div class="cleafix"></div>
		</div>
	</div>
</div>