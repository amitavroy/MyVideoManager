<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $guarded = [];

    public function entries()
    {
        return $this->hasMany(PlaylistEntry::class, 'playlist_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
