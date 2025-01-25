<?php

namespace App\BusinessLogic\Services;

use App\Models\Availability;

class AvailabilityService
{
    public function getAvailability($doctorId)
    {
        return Availability::where('doctor_id', $doctorId)->get();
    }

    public function createAvailability(array $data)
    {
        return Availability::create($data);
    }

    public function updateAvailability($availabilityId, array $data)
    {
        $availability = Availability::findOrFail($availabilityId);
        $availability->update($data);
        return $availability;
    }

    public function deleteAvailability($availabilityId)
    {
        $availability = Availability::findOrFail($availabilityId);
        $availability->delete();
    }
}
