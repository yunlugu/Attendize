<?php

namespace App\Http\Controllers;

use App\Attendize\Utils;
use App\Models\Affiliate;
use App\Models\Event;
use App\Models\EventStats;
use Auth;
use Cookie;
use Illuminate\Http\Request;
use Mail;
use Validator;

class PublicViewController extends Controller
{
    /**
     * Show the homepage for an event
     *
     * @param Request $request
     * @param $event_id
     * @param string $slug
     * @param bool $preview
     * @return mixed
     */
    public function showMainPage(Request $request) {
        return view('Public.MainPage');
    }

    public function showDanmakuPage(Request $request) {
        return view('Public.Danmaku');
    }


}
