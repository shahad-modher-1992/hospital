@extends('admin.dashboard.layout')
@section('second')
    

<style>
    label{
        display: inline-block;
        width: 200px
    }
</style>

<div class="container-fluid page-body-wrapper">


    
    <div class="container pt-5" align="center">
        @if(Session()->has("message"))
        <div class="alert alert-success" style="margin: 60px 0">
            <p>{{ Session()->get("message") }}</p>
        </div>
     @endif
        <form action="{{ route("updatedoctor",$doctor->id)}}" method="POST" enctype="multipart/form-data" style="margin-top: 50px">
            @csrf
            <div style="padding : 15px;">
                <label> Doctor Name </label>
                <input type="text" name="name" value="{{ $doctor->name }}" style="color:black" >
            </div>


            <div style="padding : 15px;">
                <label> Doctor Phone </label>
                <input type="text" name="phone" value="{{ $doctor->phone }}" style="color:black" >
            </div>


            <div style="padding : 15px; ">
                <label> Specialty </label>
                <select  name="specialty_id" style="color:black;  width:200px" > 
                    <option value="{{ $doctor->specialty->id }}"> {{ $doctor->specialty->name }}</option>
                    @foreach($specialties as $specialty)
                    <option value={{$specialty->id}}> {{ $specialty->name}} </option>
                    @endforeach
                </select>
            </div>


            <div style="padding : 15px;">
                <label> Room No </label>
                <input type="text" name="room_no" value="{{ $doctor->room_no }}" style="color:black;" >
            </div>


            <div style="padding : 15px;">
                <label> Doctor Image </label>
                <input type="file" name="image" value="{{ $doctor->image }}" style="color:black" >
            </div>
            <div style="padding : 15px;">
                <input type="submit" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
@endsection