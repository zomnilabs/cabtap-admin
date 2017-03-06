@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Drivers</div>

                    <div class="panel-body">
                        <a href="/drivers/create" class="btn btn-primary">
                            <i class="glyphicon glyphicon-plus"></i> Create New Driver
                        </a>
                        <button class="btn btn-default" onclick="frames['frame'].print()">
                            <i class="glyphicon glyphicon-print"></i> Print
                        </button>
                        <br><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Vehicle</th>
                                    <th>Full Name</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($drivers as $driver)
                                    <tr>
                                        <td>{{ $driver->id }}</td>
                                        <td>{{ $driver->vehicle->make }} {{ $driver->vehicle->model }} {{ $driver->vehicle->year }} : {{ $driver->vehicle->plate_number }}</td>
                                        <td>{{ $driver->user->profile->getFullNameAttribute() }}</td>
                                        <td>{{ $driver->created_at->toFormattedDateString() }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="/drivers/{{ $driver->id }}/edit">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>

                                            <button class="btn btn-danger"
                                                    onclick="event.preventDefault();
                                                            document.getElementById('delete-driver-form-{{ $driver->id }}').submit();">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>

                                            <form id="delete-driver-form-{{ $driver->id }}" action="/drivers/{{ $driver->id }}" method="POST" style="display: none;">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                            </form>
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
    <iframe src="/drivers/preview" name="frame" style="width: 0; height: 0"></iframe>
@endsection
