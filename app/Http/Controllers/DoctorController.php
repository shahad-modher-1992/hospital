<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AppointmentRequest;

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
        return view("user.index", compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialties = Specialty::get();
        return view("admin.doctor.add_doctor" , compact("specialties"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        $created_data = $request->except('image');
        $image = $request->image;
        $path=time().'.'.$image->getClientOriginalExtension();          
        $request->image->move('doctorimage/', $path);
        $created_data['image'] = $path;
        Doctor::create($created_data);
        session()->flash("message", "added this item to doctor table succussfuly");
        return back();
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
       $doctor = Doctor::findOrFail($id);
       $doctor->delete();
       return back();
    }

    public function storeAppointment(AppointmentRequest $request) {
      Appointment::create($request->all());
      return back()->with('message', 'you added this appointment');
    }

    public function getAppointments() {
        
        // if(Auth::id()) {
            $userId = Auth::user()->id;
            $appointments = Appointment::where('user_id', $userId)->get();
            return view('user.showappointment', compact('appointments', 'userId'));
        // } else {
        //     return back();
        // }
    }

    public function cancelAppointment($id) {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return back()->with("message", 'you cancel your appointment');
    }
}
