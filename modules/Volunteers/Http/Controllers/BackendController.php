<?php namespace Modules\Volunteers\Http\Controllers;

use App\Http\Controllers\MyBaseController;
use App\Models\Event;
use Modules\Volunteers\Repositories\Volunteer;

class BackendController extends MyBaseController {

	public function index($event_id)
	{
		$event = Event::scope()->findOrFail($event_id);

		$volunteers = Volunteer::getVolunteersForEvent($event_id);

		return view('volunteers::index')->with('event', $event)->with('volunteers', $volunteers);
	}
}