@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Vehicles Maintenance</div>

                    <div class="panel-body">
                        <a href="/vehicle-maintenance/create" class="btn btn-primary">
                            <i class="glyphicon glyphicon-plus"></i> Create New Vehicle Maintenance
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
                                <th>Name</th>
                                <th>Price</th>
                                <th>Schedule Date</th>
                                <th>Created Date</th>
                                <th>Actions</th>
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
                                    <td>
                                        <a class="btn btn-primary" href="/vehicle-maintenance/{{ $maintenance->id }}/edit">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>

                                        <button class="btn btn-danger"
                                                onclick="event.preventDefault();
                                                     document.getElementById('delete-vehicle-form-{{ $maintenance->id }}').submit();">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>

                                        <form id="delete-vehicle-form-{{ $maintenance->id }}" action="/vehicle-maintenance/{{ $maintenance->id }}" method="POST" style="display: none;">
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
    <iframe src="/vehicle-maintenance/preview" name="frame" style="width: 0; height: 0"></iframe>
@endsection
