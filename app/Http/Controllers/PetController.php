<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Http\Requests\PetRequest;
use App\Http\Resources\PetResource;
use App\Http\Resources\PetCollection;
use App\Http\Requests\UpdatePetRequest;

class PetController extends Controller
{
    public function index()
    {
        return new PetCollection(Pet::all());
    }

    public function store(PetRequest $request)
    {
        $data = $request->validated();

        $pet = Pet::create([
            'pet_owner_id' => $data['pet_owner_id'],
            'name' => $data['name'],
            'gender' => $data['gender'],
            'species' => $data['species'],
            'breed' => $data['breed'],
            'age' => $data['age'],
            'weight' => $data['weight']
        ]);

        return response([
            'pet' => new PetResource($pet)
        ]);
    }

    public function show($id)
    {
        $pet = Pet::find($id);

        if($pet) {
            return response([
                'pet' => new PetResource($pet)
            ]);
        }

        return response([
            'errors' => 'No se encontró a la mascota'
        ], 404);
    }

    public function update(UpdatePetRequest $request, $id)
    {
        $pet = Pet::find($id);

        if($pet) {
            $data = $request->validated();

            $pet->pet_owner_id = $data['pet_owner_id'];
            $pet->name = $data['name'];
            $pet->gender = $data['gender'];
            $pet->species = $data['species'];
            $pet->breed = $data['breed'];
            $pet->age = $data['age'];
            $pet->weight = $data['weight'];

            $pet->save();

            return response([
                'pet' => new PetResource($pet)
            ]);
        }

        return response([
            'errors' => 'Mascota no encontrada'
        ], 404);
    }

    public function destroy($id)
    {
        $pet = Pet::find($id);

        if($pet) {
            $pet->delete();

            return response([
                'message' => 'Registro eliminado'
            ]);
        }

        return response([
            'errors' => 'No se encontró la mascota'
        ], 404);
    }

}
