<?php

namespace app\Http\Middleware;

use App\Models\Event;
use Closure;

class GeneralChecks
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Show message to IE 8 and before users
        if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/(?i)msie [2-8]/', $_SERVER['HTTP_USER_AGENT'])) {
            Session::flash('message', 'Please update your browser. This application requires a modern browser.');
        }

        // Module Route, verify
        if ($request->segment(1) === 'module') {
            $event_id = $request->segment(2);
            $module_name = $request->segment(3);
            $event = Event::scope()->findOrFail($event_id);

            if (!$event->modules()->lists('module')->contains($module_name)) {
                abort(404, 'This Module is not installed');
            }
        }

        $response = $next($request);

        return $response;
    }
}
