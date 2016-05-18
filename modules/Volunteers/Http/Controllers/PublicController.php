<?php namespace Modules\Volunteers\Http\Controllers;

use App\Http\Controllers\MyBaseController;
use App\Models\Event;
use Modules\Volunteers\Repositories\Volunteer;

class PublicController extends MyBaseController {

	public function index($event_id)
	{
		$event = Event::scope()->findOrFail($event_id);

		dd('show sign-up form');
	}
}