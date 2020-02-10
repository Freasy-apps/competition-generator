<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * @param Request $request
     * @return Factory|View
     */
    public function __invoke(Request $request)
    {
        $events = Event::all()->load(['players', 'dates']);
        return view('pages.dashboard', compact('events'));
    }
}
