<?php

namespace App\BusinessLogic\Services;

use App\Models\DoctorSpecialization;

class DoctorSpecializationService
{
    public function getRoom($roomId)
    {
        // Get room from database
    }

    public function getSpecialization($specializationId)
    {
        return DoctorSpecialization::find($specializationId);
    }

    public function getAllSpecializations()
    {
        return DoctorSpecialization::all();
    }

    public function createSpecialization(array $data)
    {
        return DoctorSpecialization::create($data);
    }

    public function updateSpecialization($specializationId, array $data)
    {
        $specialization = DoctorSpecialization::findOrFail($specializationId);
        $specialization->update($data);
        return $specialization;
    }

    public function deleteSpecialization($specializationId)
    {
        $specialization = DoctorSpecialization::findOrFail($specializationId);
        $specialization->delete();
    }
}
