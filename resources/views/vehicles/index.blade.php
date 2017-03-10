@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Vehicles</div>

                    <div class="panel-body">
                        <a href="/vehicles/create" class="btn btn-primary">
                            <i class="glyphicon glyphicon-plus"></i> Create New Vehicle
                        </a>
                        <button class="btn btn-default" onclick="frames['frame'].print()">
                            <i class="glyphicon glyphicon-print"></i> Print
                        </button>
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
                                        <a class="btn btn-primary" href="/vehicles/{{ $vehicle->id }}/edit">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>

                                        <button class="btn btn-danger"
                                                onclick="event.preventDefault();
                                                     document.getElementById('delete-vehicle-form-{{ $vehicle->id }}').submit();">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>

                                        <form id="delete-vehicle-form-{{ $vehicle->id }}" action="/vehicles/{{ $vehicle->id }}" method="POST" style="display: none;">
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
    <iframe src="/vehicles/preview" name="frame" style="width: 0; height: 0"></iframe>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.table').DataTable();
        });
    </script>
@endsection
