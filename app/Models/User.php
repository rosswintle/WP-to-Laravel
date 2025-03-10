<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

/**
 * User class
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    /**
 * @use HasFactory<\Database\Factories\UserFactory>
*/
    use HasFactory, Notifiable;

    const ROLE_NORMAL = 0;
    const ROLE_ADMIN = 1;

    public static $lookupRole = [
        self::ROLE_NORMAL => 'Normal',
        self::ROLE_ADMIN => 'Admin',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'role',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    /**
     * Define relationship between user and videos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    function watched()
    {
        return $this->belongsToMany(Video::class, 'watched_videos')->withTimestamps();
    }

    function getWatchedIdsAttribute()
    {
        return $this->watched->pluck('id');
    }

    function getLastWatchedIdAttribute()
    {
        return $this->watched->sortBy('order')->pluck('id')->last() ?: 1;
    }

    function isAdmin()
    {
        return $this->role == self::ROLE_ADMIN;
    }

    /**
     * Check if a user has watched a specified video.
     *
     * Parameter can be a video or
     *
     * @param  Video | int $video
     * @return Boolean
     */
    function hasWatched( $video )
    {
        $videoId = ( is_a($video, Video::class) ) ? $video->id : $video;

        $watchedIds = $this->watched_ids;
        return $watchedIds->contains($videoId);
    }

}
