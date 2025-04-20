<?php

namespace App\Customs\Services;
use App\Models\People;

class PeopleService
{
    public function create($data)
    {
        $person = People::create($data);
        return $person;
    }

    public function get()
    {
        $person = People::all();
        return $person;
    }

    public function edit(People $person, $data)
    {
        $person->update($data);
        return $person;
    }

    public function delete(People $person)
    {
        return $person->delete();
    }

    public function getPetsByPerson(People $person){
        $personData = People::with('pets')->find($person);
        return $personData;
    }
}