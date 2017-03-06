@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Drivers</div>

                    <div class="panel-body">
                        <button class="btn btn-primary">Create New Vehicle</button>
                        <br><br>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Plate Number</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $vehicle->id }}</td>
                                    <td>{{ $vehicle->make }}</td>
                                    <td>{{ $vehicle->model }}</td>
                                    <td>{{ $vehicle->year }}</td>
                                    <td>{{ $vehicle->plate_number }}</td>
                                    <td>{{ $vehicle->status }}</td>
                                    <td>{{ $vehicle->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        <button class="btn btn-primary">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </button>

                                        <button class="btn btn-danger">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>
                                    </td>
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
