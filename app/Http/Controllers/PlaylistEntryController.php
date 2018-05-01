<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;

class PlaylistEntryController extends Controller
{
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'videoId' => 'required',
            'playlistId' => 'required|exists:playlists,id',
        ]);

        $playlist = Playlist::find($data['playlistId']);

        $entry = $playlist->entries()->create([
            'user_id' => $request->user()->id,
            'playlist_id' => $data['playlistId'],
            'video_id' => $data['videoId'],
        ]);

        return response()->json($entry, 201);
    }
}
