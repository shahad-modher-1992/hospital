@extends('admin.dashboard.layout')
@section('second')
<div class="container-fluid page-body-wrapper">

    <div align="center" style="padding: 100px">
        <table>
            <tr style="background-color: black; padding-top: 100px">
                <th style="padding: 10px; background-color : black; color: white">Doctor name</th>             
                <th style="padding: 10px; background-color : black; color: white">Phone</th>
                <th style="padding: 10px; background-color : black; color: white">room number </th>
                <th style="padding: 10px; background-color : black; color: white">Specialty</th>
                <th style="padding: 10px; background-color : black; color: white">Image</th>          
                <th style="padding:10px ; background-color : black;  color: white"> Delete Doctor</th>
                <th style="padding:10px ; background-color : black;  color: white"> Update Doctor</th>
            </tr>
            @foreach ($doctors as $doctor )
                
            <tr style="background-color: skyblue" align="center">
                <td style="padding: 10px; color: black">{{ $doctor->name }}</td>               
                <td style="padding: 10px; color: black">{{ $doctor->phone }}</td>
                <td style="padding: 10px; color: black">{{ $doctor->room_no }}</td>
                <td style="padding: 10px; color: black">{{ $doctor->specialty->name }}</td>
                <td style="padding: 10px; color: black"><img width="100" height="100" src="{{ asset("doctorimage/$doctor->image") }}" alt=""></td>
                <td style="padding: 10px; color: black">
                    <a class="btn btn-danger" onclick="return confirm('are you sure to delete this')"
                    href="{{ route("deletedoctor", $doctor->id) }}">Delete</a>
                </td>
                <td style="padding: 10px; color: black" ><a class="btn btn-info" href="{{ route('editdoctor', $doctor->id) }}">Update</a></td>     
            </tr>
            @endforeach
        </table>
    </div>
        
    
    </div>
@endsection