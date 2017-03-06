@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    <div class="panel-body">
                        <a href="/users/create" class="btn btn-primary">
                            <i class="glyphicon glyphicon-plus"></i> Create New User
                        </a>
                        <button class="btn btn-default" onclick="frames['frame'].print()">
                            <i class="glyphicon glyphicon-print"></i> Print
                        </button>
                        <br><br>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Full Name</th>
                                <th>E-Mail Address</th>
                                <th>Gender</th>
                                <th>User Group</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->profile->first_name }} {{ $user->profile->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->profile->gender }}</td>
                                    <td>{{ $user->user_group }}</td>
                                    <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="/users/{{ $user->id }}/edit">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>

                                        <button class="btn btn-danger"
                                                onclick="event.preventDefault();
                                                     document.getElementById('delete-user-form-{{ $user->id }}').submit();">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>

                                        <form id="delete-user-form-{{ $user->id }}" action="/users/{{ $user->id }}" method="POST" style="display: none;">
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

    <iframe src="/users/preview" name="frame" style="width: 0; height: 0"></iframe>
@endsection
