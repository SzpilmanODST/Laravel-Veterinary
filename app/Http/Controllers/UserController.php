<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::all());
    }

    public function store()
    {

    }

    public function show($id)
    {
        $user = User::find($id);

        if($user) {
            return response([
                'user' => new UserResource($user)
            ]);
        }

        return response([
            'errors' => 'No se encontró usuario'
        ], 404);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);

        if($user) {
            $data = $request->validated();

            $user->name = $data['name'];
            $user->last_name = $data['last_name'];
            $user->cellphone = $data['cellphone'];
            $user->email = $data['email'];

            $user->save();

            return response([
                'user' => new UserResource($user)
            ]);
        }

        return response([
            'errors' => 'Usuario no encontrado'
        ], 404);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if($user) {
            $user->delete();

            return response([
                'message' => 'Registro eliminado'
            ]);
        }

        return response([
            'errors' => 'No se encontró el usuario'
        ], 404);
    }
}
