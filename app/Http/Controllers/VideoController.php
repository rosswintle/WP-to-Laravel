<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }


    /**
     * Mark as watched
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function markWatched(Video $video)
    {
        $user = Auth::user();
        $user->watched()->attach($video);
        return redirect('home');
    }

    /**
     * Mark as unwatched
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function markUnwatched(Video $video)
    {
        $user = Auth::user();
        $user->watched()->detach($video);
        return redirect('home');
    }

    /**
     * Toggle watched status
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function toggleWatched(Video $video)
    {
        $user = Auth::user();
        if ( $user->hasWatched( $video ) ) {
            $user->watched()->detach($video);
        } else {
            $user->watched()->attach($video);
        }
        return redirect('home');
    }
}
