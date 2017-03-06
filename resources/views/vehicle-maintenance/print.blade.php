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
        <h2><strong>CabTap Vehicle Maintence Lists</strong></h2>
    </div>

    @if( count($maintenances) )
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Vehicle</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Schedule Date</th>
                        <th>Created Date</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($maintenances as $maintenance)
                        <tr>
                            <td>{{ $maintenance->id }}</td>
                            <td>{{ $maintenance->vehicle->getVehicleAttribute() }}</td>
                            <td>{{ $maintenance->name }}</td>
                            <td>{{ $maintenance->price }}</td>
                            <td>{{ $maintenance->scheduled_date }}</td>
                            <td>{{ $maintenance->created_at->toFormattedDateString() }}</td>
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
