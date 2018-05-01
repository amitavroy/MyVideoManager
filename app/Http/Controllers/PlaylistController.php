<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::where('user_id', Auth::user()->id)->orderBy('name', 'asc')->get();
        return $playlists;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'isPrivate' => 'required',
        ]);

        $name = $request->input('name');

        $playlist = Playlist::create([
            'name' => $name,
            'user_id' => $request->user()->id,
            'is_private' => $request->input('isPrivate'),
        ]);

        return response()->json($playlist, 201);
    }
}
