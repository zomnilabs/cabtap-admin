@extends('layouts.app')

@section('scripts')
    <script>
        (function() {
            let ctx = document.getElementById("myChart");

            let data = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Requested Trips",
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: "rgba(208,167,88,0.4)",
                        borderColor: "rgba(208,167,88,1)",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "rgba(208,167,88,1)",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(208,167,88,1)",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [65, 59, 80, 81, 56, 55, 40],
                        spanGaps: false,
                    },
                    {
                        label: "Accepted Trips",
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: "rgba(75,192,192,0.4)",
                        borderColor: "rgba(75,192,192,1)",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "rgba(75,192,192,1)",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(75,192,192,1)",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [60, 50, 70, 80, 50, 50, 39],
                        spanGaps: false,
                    }
                ]
            };

            let myChart = new Chart(ctx, {
                type: 'line',
                data: data,
                option: {
                    maintainAspectRatio: false,
                    responsive: true
                }
            });
        }())
    </script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>{{ $active_vehicle }}</h3>
                    <h5>Active Vehicles</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>{{ $vehicle_under_maintenance }}</h3>
                    <h5>Vehicles Under Maintenance</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>{{ $completed_trips }}</h3>
                    <h5>Completed Trips</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <canvas id="myChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>Recently Completed Trips</h2>
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
@endsection
