<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Http\Resources\PrescriptionResource;
use App\Http\Resources\PrescriptionCollection;
use App\Http\Requests\UpdatePrescriptionRequest;

class PrescriptionController extends Controller
{
    public function index()
    {
        return new PrescriptionCollection(Prescription::all());
    }

    public function store()
    {
        //
    }

    public function show($id)
    {
        $prescription = Prescription::find($id);

        if($prescription)
        {
           return response([
                'prescription' => new PrescriptionResource($prescription)
           ]); 
        }

        return response([
            'errors' => 'No se encontró la prescripción médica'
        ], 404);
    }

    public function update(UpdatePrescriptionRequest $request, $id)
    {
        $prescription = Prescription::find($id);
        
        if($prescription) {
            $data = $request->validated();

            $prescription->pet_id = $data['pet_id'];
            $prescription->doctor_id = $data['doctor_id'];
            $prescription->ailment = $data['ailment'];

            $prescription->save();

            return response([
                'prescription' => new PrescriptionResource($prescription)
            ]);
        }

        return response([
            'errors' => 'No se encontró la prescripción médica'
        ], 404);
    }

    public function destroy()
    {
        //
    }
}
