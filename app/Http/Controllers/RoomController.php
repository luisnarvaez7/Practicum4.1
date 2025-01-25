<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    // ...existing code...

    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function show($id)
    {
        $room = Room::find($id);
        if ($room) {
            return response()->json($room);
        } else {
            return response()->json(['message' => 'Room not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $room = Room::create($request->all());
        return response()->json($room, 201);
    }

    public function update(Request $request, $id)
    {
        $room = Room::find($id);
        if ($room) {
            $room->update($request->all());
            return response()->json($room);
        } else {
            return response()->json(['message' => 'Room not found'], 404);
        }
    }

    public function destroy($id)
    {
        $room = Room::find($id);
        if ($room) {
            $room->delete();
            return response()->json(['message' => 'Room deleted']);
        } else {
            return response()->json(['message' => 'Room not found'], 404);
        }
    }
}
