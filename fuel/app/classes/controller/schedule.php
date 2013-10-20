<?php
//foreach($lan->getDates() as $d) { echo $d->format('d.m.Y') . '\n'; }
?>

<?php
/**
 * The Schedule Controller.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Schedule extends Controller_Base
{
	public function before() {
		Asset::js('schedule.js', array(), 'page_assets');
		parent::before();
	}

	public function action_index()
	{
		$data = array();
		$nextlan = Model_Lan::nextLAN();
		$items = $nextlan->schedule_items;

		$schedule = array();

		foreach($nextlan->getDates() as $d) {
			$df = $d->format('d.m.Y');

			$schedule[$df] = array();

			for($h = 0; $h <= 23; $h++) {
				$schedule[$df][str_pad($h, 2, '0', STR_PAD_LEFT)] = array();

				for($ten = 0; $ten <= 50; $ten++) {
					$schedule[$df][str_pad($h, 2, '0', STR_PAD_LEFT)][str_pad($ten, 2, '0', STR_PAD_LEFT)] = array();
				}
			}
		}

		$items_clean = array();

		foreach($items as $item) {
			if($item->checkDate($nextlan->lan_start, $nextlan->lan_end)) {
				$items_clean[] = $item;
			}
		}

		$data['schedule'] = $schedule;
		$data['items'] = $items_clean;

		$view = View::forge('schedule', $data);
		return Response::forge($view);
	}
}