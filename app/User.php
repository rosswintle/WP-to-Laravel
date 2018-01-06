<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \App\Video;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_NORMAL = 0;
    const ROLE_ADMIN = 1;

    public $lookupRole = [
        self::ROLE_NORMAL => 'Normal',
        self::ROLE_ADMIN => 'Admin',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'role',
    ];

    /**
     * Define relationship between user and videos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    function watched() {
        return $this->belongsToMany('App\Video', 'watched_videos')->withTimestamps();
    }

    function getWatchedIdsAttribute() {
        return $this->watched->pluck('id');
    }

    function getLastWatchedIdAttribute() {
        return $this->watched->sortBy('order')->pluck('id')->last() ?: 1;
    }

    function isAdmin() {
        return $this->role == self::ROLE_ADMIN;
    }

    /**
     * Check if a user has watched a specified video.
     *
     * Parameter can be a video or
     *
     * @param \App\Video | int $video
     * @return Boolean
     */
    function hasWatched( $video ) {
        $videoId = ( is_a( $video, 'App\Video' ) ) ? $video->id : $video;

        $watchedIds = $this->watched_ids;
        return $watchedIds->contains( $videoId );
    }
}
