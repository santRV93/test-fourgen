<?php

namespace App\Http\Controllers\Api;

use App\Customs\Services\PeopleService;
use App\Http\Controllers\Controller;
use App\Http\Requests\People\PeopleRequest;
use App\Models\People as ModelPeople;
use Exception;

class People extends Controller
{
    protected $person;

    public function __construct(PeopleService $person)
    {
        $this->person = $person;
    }

    public function store(PeopleRequest $request) 
    {
        $validatedData = $request->validated();
        try {
            $person = $this->person->create($validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'Person created successfully',
                'person' => $person
            ]);
        } catch (Exception $th) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Person creation failed, please try it again'
            ], 500);
        }
    }

    public function list() 
    {
        try {
            $people = $this->person->get();
            return response()->json([
                'status' => 'success',
                'people' => $people
            ]);
        } catch (Exception $th) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Get people list failed'
            ], 500);
        }
    }

    public function update(PeopleRequest $request, ModelPeople $person) 
    {
        $validatedData = $request->validated($person);
        try {
            $person = $this->person->edit($person, $validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'Person updated successfully',
                'person' => $person
            ], 200);
        } catch (Exception $th) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Update people failed'
            ], 500);
        }
    }

    public function delete(ModelPeople $person) 
    {
        try {
            $personDeleted = $this->person->delete($person);
            if ($personDeleted) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Person deleted successfully'
                ], 200);
            }
            return response()->json([
                'status' => 'failed',
                'message' => 'Person not found'
            ], 404);
        } catch (Exception $th) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Dete person failed'
            ], 500);
        }
    }

    public function petsByPerson(ModelPeople $person)
    {
        try {
            $petsPerson = $this->person->getPetsByPerson($person);
            return response()->json([
                'status' => 'success',
                'person' => $petsPerson
            ], 200);
        } catch (Exception $th) {
            echo $th;
            return response()->json([
                'status' => 'failed',
                'message' => 'List of person by pets failed'
            ], 500);
        }
    }
}
