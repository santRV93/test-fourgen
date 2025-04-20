<?php

namespace App\Http\Controllers\Api;

use App\Customs\Services\PetsService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pets\PetsRequest;
use App\Models\Pets;
use Exception;
use Illuminate\Http\Request;

class PetsController extends Controller
{
    protected $pet;

    public function __construct(PetsService $pet)
    {
        $this->pet = $pet;
    }

    public function store(PetsRequest $request) 
    {
        $validatedData = $request->validated();
        try {
            $pet = $this->pet->create($validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'Pet created successfully',
                'person' => $pet
            ]);
        } catch (Exception $th) {
            echo $th;
            return response()->json([
                'status' => 'failed',
                'message' => 'Pet creation failed, please try it again'
            ], 500);
        }
    }

    public function list() 
    {
        try {
            $pet = $this->pet->get();
            return response()->json([
                'status' => 'success',
                'pets' => $pet
            ]);
        } catch (Exception $th) {
            echo $th;
            return response()->json([
                'status' => 'failed',
                'message' => 'Get pet list failed'
            ], 500);
        }
    }

    public function update(PetsRequest $request, Pets $pet) 
    {
        $validatedData = $request->validated($pet);
        try {
            $petEdited = $this->pet->edit($pet, $validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'Pet updated successfully',
                'pet' => $petEdited
            ], 200);
        } catch (Exception $th) {
            echo $th;
            return response()->json([
                'status' => 'failed',
                'message' => 'Update pet failed'
            ], 500);
        }
    }

    public function delete(Pets $pet) 
    {
        try {
            $petDeleted = $this->pet->delete($pet);
            if ($petDeleted) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Pet deleted successfully'
                ], 200);
            }
            return response()->json([
                'status' => 'failed',
                'message' => 'Pet not found'
            ], 404);
        } catch (Exception $th) {
            echo $th;
            return response()->json([
                'status' => 'failed',
                'message' => 'Pet deleting failed'
            ], 500);
        }
    }
}
