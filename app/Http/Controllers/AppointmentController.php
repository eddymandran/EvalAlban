<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($salesPeopleId): JsonResponse
    {

        $appointments = Appointment::where('sales_people_id', $salesPeopleId)->get();
        if ($appointments->isEmpty()) {
            return response()->json(['message' => 'No appointments found'], 404);
        }

        return response()->json($appointments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $salesPeopleId): JsonResponse
    {
        //get the user connected
        $user = auth()->user();

        $request->validate([
            'start_appointment_date' => 'required|date',
            'end_appointment_date' => 'required|date',
            'subject' => 'required|string'
        ]);

        $startAppointmentDate = strtotime($request->start_appointment_date);

        // Check if the date is between saturday and sunday
        if (date('N', $startAppointmentDate) >= 6) {
            return response()->json(['message' => 'You can\'t book an appointment on a weekend'], 400);

        }

        $endAppointmentDate = strtotime($request->end_appointment_date);

        // Check if the appointment is before 09h30 and after 17h30
        if (date('H:i', $startAppointmentDate) <= '09:30' && date('H:i', $endAppointmentDate) >= '17:30') {
            return response()->json(['message' => 'You can\'t book an appointment before 09h30 and after 17h30'], 400);

        }

        //check if the date is free
        $appointments = Appointment::where('sales_people_id', $salesPeopleId)->get();
        foreach ($appointments as $appointment) {
            if ($request->start_appointment_date = $appointment->start_appointment_date) {
                return response()->json(['message' => 'This date is already taken'], 400);

            }
        }

        $appointment = new Appointment();
        $appointment->user_id = $user->id;
        $appointment->sales_people_id = $salesPeopleId;
        $appointment->start_appointment_date = $request->start_appointment_date;
        $appointment->end_appointment_date = $request->end_appointment_date;
        $appointment->save();

        return response()->json(['message' => 'Appointment created successfully'], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment): RedirectResponse
    {
        //
    }
}
