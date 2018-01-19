<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Video;

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
     * Show the video index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Auth::check()) {
            abort('403', 'Not allowed');
        }

        $videos = \App\Video::withCount('watchedBy')->get();

        return view('admin.videos.index', [
            'videos' => $videos,
            ]);
    }


    /**
     * Show a video.
     *
     * @return \Illuminate\Http\Response
     */
    public function show( Video $video )
    {
        if (! Auth::check()) {
            abort('403', 'Not allowed');
        }

        return view('admin.videos.show', [
            'video' => $video,
            ]);
    }


    /**
     * Edit a video.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( Video $video )
    {
        if (! Auth::check()) {
            abort('403', 'Not allowed');
        }

        return view('admin.videos.edit', [
            'video' => $video,
            ]);
    }
    /**
     * Update a video.
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Video $video, Request $request )
    {
        if (! Auth::check()) {
            abort('403', 'Not allowed');
        }

        $data = $request->validate([
            'name' => 'required',
            'description' => '',
            'order' => 'numeric',
            'url' => 'required|URL',
            'duration' => 'numeric',
            'videoId' => 'required|min:7|max:12',
        ]);

        $video->update( $data );

        $request->session()->flash( 'message', 'Video updated' );

        return redirect()->action( 'AdminVideoController@show', [ 'video' => $video ] );
    }
}
