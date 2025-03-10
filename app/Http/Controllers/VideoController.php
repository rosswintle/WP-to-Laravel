<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  Video $video
     * @return View
     */
    public function show(Video $video)
    {
        $videos = Video::orderBy('order')->get();
        $watched = Auth::user()->watched->pluck('id');

        return view(
            'video.show', [
            'video' => $video,
            'allVideos' => $videos,
            'watchedVideos' => $watched,
            ]
        );
    }
}
