<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminVideoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Auth::check()) {
            abort('403', 'Not allowed');
        }

        $videos = \App\Video::all();
        $myVideos = Auth::user()->watched->pluck('id');

        return view('home', [
            'videos' => $videos,
            'user' => Auth::user(),
            'watched' => $myVideos,
            ]);
    }
}
