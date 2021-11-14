<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $doctors = Doctor::get();
        return view('admin.doctor.showdoctor', compact('doctors'));
    }

    public function deleteDoctor($id) {
        $doctor= Doctor::findOrFail($id);
        $doctor->delete();
        return back();
    }

    public function edit($id, Request $request) {
     $doctor = Doctor::findOrFail($id);
     $specialties = Specialty::get();
     return view('admin.doctor.editdoctor', compact('doctor', 'specialties'));
    }

    public function update($id, DoctorRequest $request) {
        $doctor = Doctor::findOrFail($id);

        $data_updated = $request->except('image');
        $requestimage= $request->image;
        $imagename = time().'.'.$requestimage->getClientOriginalExtension();
        $request->image->move('doctorimage', $imagename);
        $data_updated['image']=$imagename;

        $doctor->update($data_updated);
        return back()->with('message', 'doctor had been updaated');
    }
}
