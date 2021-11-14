<?php

namespace App\Http\Controllers\Api;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AppointmentRequest;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $userId = 1;
            $appointments = Appointment::where('user_id', $userId)->get();
            return response()->json([
             'status' => 200,
             "message" => "you get your appoinment",
             'data' => $appointments,
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {

        $appointment = Appointment::create($request->all());
        $appoinment_token = $appointment->createToken("api token")->accessToken;
        return response()->json([
           'status'=> 200,
           'message' => 'you booked this appointment',
           'data' => $appointment,
           "api_token" =>$appoinment_token
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appintment = Appointment::findOrFail($id);
        $appintment->delete();
        $appintment_token = $appintment->createToken("Api Token")->accessToken;
        return response()->json([
         'status'=> 200,
         'message' => "this item is deleted",
         'data' => $appintment,
         'api_token' => $appintment_token
        ]);

    }

    public function approve($id) {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = "Approved";
        $appointment->save();
        $appointment_token = $appointment->createToken("api token")->accessToken;
        return response()->json([
          'status'=>200,
          'message' => "success",
          'data' => $appointment,
          'api_token' => $appointment_token
        ]);
    }
}
