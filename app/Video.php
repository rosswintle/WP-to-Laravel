<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'order', 'description', 'url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    function watchedBy() {
    	return $this->belongsToMany('App\User', 'watched_videos')->withTimestamps();
    }

    function getWatchedCountAttribute() {
        return $this->watchedBy()->count();
    }


}
