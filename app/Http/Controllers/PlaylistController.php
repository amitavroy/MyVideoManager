<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::with('entries')
            ->where('user_id', Auth::user()->id)
            ->orderBy('updated_at', 'desc')
            ->get();

        return $playlists;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'isPrivate' => 'required',
        ]);

        $name = $request->input('name');

        $count = Playlist::where('name', $name)->where('user_id', $request->user()->id)->count();

        if ($count) {
            return response()->json(['message' => "Playlist {$name} exist"], 403);
        }

        $playlist = Playlist::create([
            'name' => $name,
            'user_id' => $request->user()->id,
            'is_private' => $request->input('isPrivate'),
        ]);

        return response()->json($playlist, 201);
    }
}
