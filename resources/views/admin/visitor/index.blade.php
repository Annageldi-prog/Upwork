@extends('layouts.app')
@section('title')
    Visitor
@endsection
@section('content')

    <div class="h3 p-3">
        Visitors
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="small">
            <tr>
                <th>ID</th>
                <th>IP Address</th>
                <th>User Agent</th>
                <th>Hits</th>
                <th>Suspect Hits</th>
                <th>Robot</th>
                <th>API</th>
                <th>Disabled</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->ipAddress->ip_address }}</td>
                    <td>{{ $obj->userAgent->user_agent }}</td>
                    <td>{{ $obj->hits }}</td>
                    <td>{{ $obj->suspect_hits }}</td>
                    <td>{{ $obj->robot ? 'Yes' : 'No' }}</td>
                    <td>{{ $obj->api ? 'Yes' : 'No' }}</td>
                    <td>{{ $obj->disabled ? 'Yes' : 'No' }}</td>
                    <td>{{ $obj->created_at }}</td>
                    <td>{{ $obj->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
