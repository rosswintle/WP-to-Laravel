<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', 'order', 'description', 'notes', 'url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var list<string>
     */
    protected $hidden = [
    ];

    function watchedBy()
    {
        return $this->belongsToMany(User::class, 'watched_videos')->withTimestamps();
    }

    function getWatchedCountAttribute()
    {
        return $this->watchedBy()->count();
    }
}
