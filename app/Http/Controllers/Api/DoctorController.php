<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::get();
        // $doctor_token = $doctors->createToken('api Token')->accessToken;
        return response()->json([
            'status' => 200,
            "message" => "get all doctors successfully",
            "data" => $doctors,
            // "api_token" => $doctor_token
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
    public function store(Request $request)
    {
        $created_data = $request->except('image');
        $image = $request->image;
        $path=time().'.'.$image->getClientOriginalExtension();          
        $request->image->move('doctorimage/', $path);
        $created_data['image'] = $path;
        $doctor =  Doctor::create($created_data);
        $doctor_token = $doctor->createToken("Api TOken")->accessToken;
        return response()->json([
            'status' => 200,
            "message" => "Doctor had been added successfully",
            'data' => $doctor,
            "api_token" => $doctor_token,
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
        $doctor = Doctor::findOrFail($id);
        $doctor_token = $doctor->createToken("Api Token")->accessToken;

        return response()->json([
            'status' => 200,
            "message" => "success",
            'data' => $doctor,
            "api_token" => $doctor_token,
        ]);

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
    public function update(DoctorRequest $request, $id)
    {
        
    }
    public function updateDoctor(DoctorRequest $request , $id) {
        $doctor = Doctor::findOrFail($id);

        $data_updated = $request->except('image');
        $requestimage= $request->image;
        $imagename = time().'.'.$requestimage->getClientOriginalExtension();
        $request->image->move('doctorimage', $imagename);
        $data_updated['image']=$imagename;

        $doctor->update($data_updated);

        $doctor_token = $doctor->createToken("api Token")->accessToken;
        return response()->json([
           'status' => 200,
           'message' => 'this doctor had been update',
           'data' => $doctor,
           'api_token' => $doctor_token
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $doctor = Doctor::findOrFail($id);
     $doctor->delete();
     $doctor_token = $doctor->createToken("api Token")->accessToken;
     return response()->json([
             'status' => 200,
            "message" => "this doctor is deleted",
            'data' => $doctor,
            "api_token" => $doctor_token,
     ]);
    }
}
