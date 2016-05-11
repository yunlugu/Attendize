<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventQuestionRequest;
use App\Models\Event;
use App\Models\Module;
use Illuminate\Http\Request;

/*
  Attendize.com   - Event Management & Ticketing
 */

class EventModuleController extends MyBaseController
{

    /**
     * Show the event modules page
     *
     * @param Request $request
     * @param $event_id
     * @return mixed
     */
    public function showEventModules(Request $request, $event_id)
    {
        $event = Event::scope()->findOrFail($event_id);
        $modules = $event->list_modules();

        $data = [
            'event' => $event,
            'modules' =>  $modules,
        ];

        return view('ManageEvent.Modules', $data);
    }

}
