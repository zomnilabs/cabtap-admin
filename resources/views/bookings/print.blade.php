<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <style>
        .animation-details th, .animation-details td {
            vertical-align: middle !important;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CabTap') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>


<div class="col-md-12 col-xs-12 col-sm-12">
    <div style="text-align: center">
        <h2><strong>CabTap Booking Lists</strong></h2>
    </div>

    @if( count($bookings) )
        <div class="row">
            <div class="col-md-12">
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
                            <td>{{ $booking->driver->user->profile->getFullNameAttribute() }}</td>
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
    @endif

</div>

</body>
</html>
