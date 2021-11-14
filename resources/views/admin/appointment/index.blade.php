@extends("admin.dashboard.layout")

@section("second")



<div class="container-fluid page-body-wrapper">

<div align="center" style="padding: 100px">
    <table>
        <tr style="background-color: black; padding-top: 100px">
            <th style="padding: 10px; background-color : black; color: white">Customer name</th>
            <th style="padding: 10px; background-color : black; color: white">Email</th>
            <th style="padding: 10px; background-color : black; color: white">Phone</th>
            <th style="padding: 10px; background-color : black; color: white">Doctor Name</th>
            <th style="padding: 10px; background-color : black; color: white">Date</th>
            <th style="padding: 10px; background-color : black; color: white">Message</th>
            <th style="padding: 10px; background-color : black; color: white">Status</th>
            <th style="padding:10px ; background-color : black;  color: white">Cancel Appointmen</th>
            <th style="padding:10px ; background-color : black;  color: white">Approve Appointmen</th>
        </tr>
        @foreach ($appoinments as $appointment )
            
        <tr style="background-color: skyblue" align="center">
            <td style="padding: 10px; color: black">{{ $appointment->name }}</td>
            <td style="padding: 10px; color: black">{{ $appointment->email }}</td>
            <td style="padding: 10px; color: black">{{ $appointment->phone }}</td>
            <td style="padding: 10px; color: black">{{ $appointment->doctor->name }}</td>
            <td style="padding: 10px; color: black">{{ $appointment->date }}</td>
            <td style="padding: 10px; color: black">{{ $appointment->message }}</td>
            <td style="padding: 10px; color: black">{{ $appointment->status }}</td>
            <td style="padding: 10px; color: black">
                <a class="btn btn-danger" onclick="return confirm('are you sure to delete this')"
                href="{{ route('appointment.cancel', $appointment->id) }}">Cancel</a>
            </td>
            <td style="padding: 10px; color:black">
                <a href='{{ url("approve/$appointment->id") }}' class="btn btn-success">Approve</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
    

</div>


@endsection