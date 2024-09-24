<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\AppointmentCollection;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        //return new AppointmentCollection(Appointment::with('petOwner')->orderBy('id','DESC')->paginate(10));

        $query = Appointment::with('petOwner')->orderBy('id', 'DESC');

        if ($request->has('pet_owner_name', 'pet_owner_last_name', 'pet_owner_cellphone', 'day_and_hour')) {

            $query->whereHas('petOwner', function ($q) use ($request) {
                $q->where('name', 'LIKE', "%{$request->pet_owner_name}%");
                $q->where('last_name', 'LIKE', "%{$request->pet_owner_last_name}%");
                $q->where('cellphone', 'LIKE', "%{$request->pet_owner_cellphone}%");
            });

            $query->where('day_and_hour', 'LIKE', "%{$request->day_and_hour}%");
            
        }

        $appointments = $query->paginate(10); 
        return new AppointmentCollection($appointments);
    }


    public function store(AppointmentRequest $request)
    {

        $data = $request->validated();

        $prescription = Prescription::create([
            'pet_owner_id' => $data['pet_owner_id'],
            'day_and_hour' => $data['day_and_hour'],
        ]);

        $appointment = Appointment::create([
            'pet_owner_id' => $data['pet_owner_id'],
            'day_and_hour' => $data['day_and_hour'],
            'prescription_id' => $prescription->id
        ]);

        $prescription->appointment_id = $appointment->id;
        $prescription->save();

        return [
            'appointment' => new AppointmentResource($appointment)
        ];

    }


    public function show($id)
    {
        $appointment = Appointment::find($id);
        
        if($appointment) {
            return response([
                'appointment' => new AppointmentResource($appointment)
            ]);
        }

        return response([
            'errors' => 'No se encontró la cita'
        ], 404);
    }


    public function update()
    {
        //
    }


    public function destroy($id)
    {
       $appointment = Appointment::find($id);

       if($appointment) { 
            $appointment->delete(); 
            
            return response([
                'message' => 'Cita eliminada'
            ]);
       }

       return response([
            'errors' => 'No se encontró la cita'
       ], 404);
    }
}
