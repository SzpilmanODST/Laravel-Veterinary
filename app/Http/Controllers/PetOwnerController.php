<?php

namespace App\Http\Controllers;

use App\Models\PetOwner;
use Illuminate\Http\Request;
use App\Http\Requests\PetOwnerRequest;
use App\Http\Resources\PetOwnerResource;
use App\Http\Resources\PetOwnerCollection;
use App\Http\Requests\UpdatePetOwnerRequest;

class PetOwnerController extends Controller
{
    public function index(Request $request)
    {
        // return new PetOwnerCollection(PetOwner::with('appointments')->orderBy('id','DESC')->paginate(10));

        $query = PetOwner::with('appointments')->orderBy('id', 'DESC');

        if($request->has('name', 'last_name', 'cellphone', 'email')) {
            
            $query->where('name', 'LIKE', "%{$request->name}%");
            $query->where('last_name', 'LIKE', "%{$request->last_name}%");
            $query->where('cellphone', 'LIKE', "%{$request->cellphone}%");
            $query->where('email', 'LIKE', "%{$request->email}%");
            
        }

        $petOwners = $query->paginate(10); 
        return new PetOwnerCollection($petOwners);
    }

    public function store(PetOwnerRequest $request)
    {
        $data = $request->validated();

        $petOwner = PetOwner::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'cellphone' => $data['cellphone'],
            'email' => $data['email']
        ]);

        return response([
            'petOwner' => $petOwner
        ]);
    }

    public function show($id)
    {
        $petOwner = PetOwner::with('appointments')->find($id);

        if(!empty($petOwner)) {
            return response([
                'petOwner' => new PetOwnerResource($petOwner)
            ]);
        }

        return response([
            'errors' => ['Dueño no encontrado']
        ], 404);
    }

    public function update(UpdatePetOwnerRequest $request, $id)
    {
        $petOwner = PetOwner::find($id);
        
        if(!empty($petOwner)) {

            $data = $request->validated();

            $petOwner->name = $data['name'];
            $petOwner->last_name = $data['last_name'];
            $petOwner->cellphone = $data['cellphone'];
            $petOwner->email = $data['email'];

            $petOwner->save();

            return response([
                'petOwner' => new PetOwnerResource($petOwner)
            ]);
        } 

        return response([
            'messages' => ['Dueño no encontrado']
        ], 404);   
    }
        

    public function destroy($id)
    {
        $petOwner = PetOwner::find($id);

        if(!empty($petOwner)) {
            $petOwner->delete();

            return response([
                'errors' => ['Dueño eliminado']
            ]);
        }

        return response([
            'errors' => ['Dueño no encontrado']
        ], 404);
    }
}
