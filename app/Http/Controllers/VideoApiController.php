<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoApiController extends Controller
{
    /**
     * Mark as watched
     *
     * @param  Video $video
     * @return Video
     */
    public function markWatched(Video $video)
    {
        $user = Auth::user();
        $user->watched()->attach($video);
        return $video;
    }

    /**
     * Mark as unwatched
     *
     * @param  Video $video
     * @return Video
     */
    public function markUnwatched(Video $video)
    {
        $user = Auth::user();
        $user->watched()->detach($video);
        return $video;
    }

    /**
     * Toggle watched status
     *
     * @param  Video $video
     * @return array<string,integer>
     */
    public function toggleWatched(Video $video)
    {
        $user = Auth::user();
        if ($user->hasWatched($video) ) {
            $user->watched()->detach($video);
            return [ 'newStatus' => 0 ];
        } else {
            $user->watched()->attach($video);
            return [ 'newStatus' => 1 ];
        }
    }
}
