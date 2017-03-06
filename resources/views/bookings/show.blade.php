@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Bookings</div>

                    <div class="panel-body">
                        <h5>E-mail Address: {{ $booking->email }}</h5>
                        <h5>First Name: {{ $booking->profile->first_name }}</h5>
                        <h5>Last Name: {{ $booking->profile->last_name }}</h5>
                        <h5>Birthdate: {{ $booking->profile->birthdate }}</h5>
                        <h5>Gender: {{ $booking->profile->gender }}</h5>
                        <h5>Contact Number: {{ $booking->profile->contact_number }}</h5>
                        <h5>Address: {{ $booking->profile->address1 }}</h5>
                        <h5>Date Created: {{ $booking->created_at->toFormattedDateString() }}</h5>
                        <h5>Last Updated: {{ $booking->updated_at->toFormattedDateString() }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection