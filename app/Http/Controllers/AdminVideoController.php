<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Models\Video;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;

class AdminVideoController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [ 'auth', Admin::class ];
    }

    /**
     * Show the video index.
     *
     * @return View
     */
    public function index()
    {
        if (! Auth::check()) {
            abort(403, 'Not allowed');
        }

        $videos = Video::withCount('watchedBy')->get();

        return view(
            'admin.videos.index', [
            'videos' => $videos,
            ]
        );
    }


    /**
     * Show a video.
     *
     * @return View
     */
    public function show( Video $video )
    {
        if (! Auth::check()) {
            abort(403, 'Not allowed');
        }

        return view(
            'admin.videos.show', [
            'video' => $video,
            ]
        );
    }


    /**
     * Edit a video.
     *
     * @return View
     */
    public function edit( Video $video )
    {
        if (! Auth::check()) {
            abort(403, 'Not allowed');
        }

        return view(
            'admin.videos.edit', [
            'video' => $video,
            ]
        );
    }
    /**
     * Update a video.
     *
     * @return RedirectResponse
     */
    public function update( Video $video, Request $request )
    {
        if (! Auth::check()) {
            abort(403, 'Not allowed');
        }

        $data = $request->validate(
            [
            'name' => 'required',
            'description' => '',
            'notes' => '',
            'order' => 'numeric',
            'url' => 'required|URL',
            'duration' => 'numeric',
            'videoId' => 'required|min:7|max:12',
            ]
        );

        $video->update($data);

        $request->session()->flash('message', 'Video updated');

        return redirect()->action([AdminVideoController::class, 'show'], [ 'video' => $video ]);
    }

}
