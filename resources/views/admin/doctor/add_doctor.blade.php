@extends("admin.dashboard.layout")

@section("second")


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
        <form action="{{ route("doctor.store")}}" method="POST" enctype="multipart/form-data" style="margin-top: 50px">
            @csrf
            <div style="padding : 15px;">
                <label> Doctor Name </label>
                <input type="text" name="name" style="color:black" value= '{{ old("name")}}'>
            </div>


            <div style="padding : 15px;">
                <label> Doctor Phone </label>
                <input type="text" name="phone" style="color:black" value= '{{ old("phone")}}'>
            </div>


            <div style="padding : 15px; ">
                <label> Specialty </label>
                <select  name="specialty_id" style="color:black;  width:200px" > 
                    <option value="{{ old("speciilty_id") }}">Select </option>
                    @foreach($specialties as $specialty)
                    <option value={{$specialty->id}}> {{ $specialty->name}} </option>
                    @endforeach
                </select>
            </div>


            <div style="padding : 15px;">
                <label> Room No </label>
                <input type="text" name="room_no" style="color:black;" value= '{{ old("room_no")}}'>
            </div>


            <div style="padding : 15px;">
                <label> Doctor Image </label>
                <input type="file" name="image" style="color:black" value= '{{ old("image")}}'>
            </div>
            <div style="padding : 15px;">
                <input type="submit" class="btn btn-success">
            </div>
        </form>
    </div>
</div>


@endsection