@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Vehicle Maintenance</div>

                    <div class="panel-body">
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <form action="/vehicle-maintenance/{{$maintenance->id}}/" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                @include('vehicle-maintenance.forms.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection