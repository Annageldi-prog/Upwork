@extends('layouts.app')
@section('title')
    AuthAttempt
@endsection
@section('content')
    <div class="h3 p-3">
        AuthAttempt
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="small">
            <tr>
                <th>ID</th>
                <th>IP Address</th>
                <th>User Agent</th>
                <th>Username</th>
                <th>Event</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->ipAddress->ip_address }}</td>
                    <td>{{ $obj->userAgent->user_agent }}</td>
                    <td>{{ $obj->username }}</td>
                    <td>{{ $obj->event }}</td>
                    <td>{{ $obj->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
