@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Bookings</div>

                    <div class="panel-body">
                        <button class="btn btn-default" onclick="frames['frame'].print()">
                            <i class="glyphicon glyphicon-print"></i> Print
                        </button>
                        <br><br>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Passenger Name</th>
                                <th>Driver Name</th>
                                <th>Pickup</th>
                                <th>Destination</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Created Date</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->passenger->profile->getFullNameAttribute() }}</td>
                                    <td>{{ $booking->vehicle_user_id ? $booking->driver->user->profile->getFullNameAttribute() : 'No Driver Yet' }}</td>
                                    <td>{{ $booking->pickup }}</td>
                                    <td>{{ $booking->destination }}</td>
                                    <td>{{ $booking->price }}</td>
                                    <td>{{ $booking->status }}</td>
                                    <td>{{ $booking->created_at->toFormattedDateString() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <iframe src="/bookings/preview" name="frame" style="width: 0; height: 0"></iframe>
@endsection
