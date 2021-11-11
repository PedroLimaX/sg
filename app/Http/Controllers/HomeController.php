<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Tip;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders=Slider::paginate();
        $tips=Tip::paginate();
        return view('home', compact('sliders','tips'))
            ->with('i', (request()->input('page', 1) - 1) * $tips->perPage());
    }
}
