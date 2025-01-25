<?php

namespace App\BusinessLogic\Services;

use App\Models\Room;

class RoomService
{
    public function getRoom($roomId)
    {
        return Room::find($roomId);
    }

    public function getAllRooms()
    {
        return Room::all();
    }

    public function createRoom(array $data)
    {
        return Room::create($data);
    }

    public function updateRoom($roomId, array $data)
    {
        $room = Room::findOrFail($roomId);
        $room->update($data);
        return $room;
    }

    public function deleteRoom($roomId)
    {
        $room = Room::findOrFail($roomId);
        $room->delete();
    }
}
