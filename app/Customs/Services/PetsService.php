<?php

namespace App\Customs\Services;
use App\Models\Pets;

class PetsService
{
    public function create($data)
    {
        $pet = Pets::create($data);
        return $pet;
    }

    public function get()
    {
        $pet = Pets::all();
        return $pet;
    }

    public function edit(Pets $pet, $data)
    {
        $pet->update($data);
        return $pet;
    }

    public function delete(Pets $pet)
    {
        return $pet->delete();
    }
}