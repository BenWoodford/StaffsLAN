<?php
/**
 * The Map Controller.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Map extends Controller_Base
{
	public function before() {
		Asset::js('jquery.pan.js', array(), 'page_assets');
		Asset::js('map.js', array(), 'page_assets');
		parent::before();
	}

	public function action_index()
	{
		$data = array();
		$data['rooms'] = $rooms = Model_Lan::nextLAN()->rooms;

		$data['total_seats'] = Model_Seat::query()->where('lan_id', Model_Lan::nextLAN()->id)->count();
		$data['remaining_seats'] = Model_Seat::query()->where(array(array('lan_id' => Model_Lan::nextLAN()->id),array('user_id' => 0)))->count();

		if(!$this->currentUser->hasSeat())
			Messages::danger("You haven't booked your seat below yet, make sure you do or you'll have to go with what's left when you arrive!");

		$view = View::forge('map', $data);
		return Response::forge($view);
	}

	public function action_book($id)
	{
		$newseat = Model_Seat::find($id);

		$volunteer = false;

		if($this->currentUser->getTicket()->is_volunteer == 1) {
			$volunteer = true;
		}

		if(!$newseat || in_array($newseat->seat_type, array('staff')) || ($newseat->seat_type == 'volunteer' && !$volunteer) || $newseat->user_id != 0 || ($newseat->seat_type == 'player' && $volunteer)) {
			\Response::redirect("/map/");
		}

		// Kill off any seats the user is already part of.
		$lan = Model_Lan::nextLAN();

		foreach($lan->rooms as $room) {
			foreach($room->blocks as $block) {
				foreach($block->seats as $seat) {
					if($seat->user_id == $this->currentUser->id) {
						$seat->user_id = 0;
					}
				}
			}
		}

		$newseat->user_id = $this->currentUser->id;

		$lan->save();

		\Response::redirect("/map/");
	}
}
