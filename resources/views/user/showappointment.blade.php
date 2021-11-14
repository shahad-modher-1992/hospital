@extends('layout')
@section('main')
<div class="" align="center" style="padding: 70px">

    @if (Session()->has("message"))
    <div class="alert alert-success">
        <p>{{ Session()->get('message') }}</p>
    </div>
        
    @endif
    <table>
        <tr style="background-color: black" align="center">
            <th style="padding:10px ; font-size: 20px; color: white">Doctor Name</th>
            <th style="padding:10px ; font-size: 20px; color: white">Date</th>
            <th style="padding:10px ; font-size: 20px; color: white">Status</th>
            <th style="padding:10px ; font-size: 20px; color: white">Message</th>
            <th style="padding:10px ; font-size: 20px; color: white">Cancel Appointmen</th>
        </tr>

        @foreach ($appointments as $appointment)
            
        <tr style="background-color: #eeeeee" align="center">
            <td style="padding:10px ; font-size: 20px; color: black">{{ $appointment->doctor->name }}</td>
            <td style="padding:10px ; font-size: 20px; color: black">{{ $appointment->date }}</td>
            <td style="padding:10px ; font-size: 20px; color: black">{{ $appointment->status }}</td>
            <td style="padding:10px ; font-size: 20px; color: black">{{ $appointment->message }}</td>
            <td style="padding:10px ; font-size: 20px; color: black">
                <a onclick="return confirm('are you sure to delete this')"
                 href="{{ route('appointment.cancel', $appointment->id) }}">Cancel</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
  
@endsection