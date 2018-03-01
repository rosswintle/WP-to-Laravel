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
        $videos = Video::orderBy('order')->get();
        $watched = Auth::user()->watched->pluck('id');

        return view('video.show', [
            'video' => $video,
            'allVideos' => $videos,
            'watchedVideos' => $watched,
        ]);
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
        return $this->redirectToVideo($video);
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
        return $this->redirectToVideo($video);
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
        return $this->redirectToVideo( $video );
    }

    /**
     * Toggle watched status
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function redirectToVideo( $video ) {
        return redirect()->action( 'VideoController@show', [ 'video' => $video->id ] );
    }
}
