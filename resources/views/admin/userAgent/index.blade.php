@extends('layouts.app')
@section('title')
    UserAgent
@endsection
@section('content')

    <div class="h3 p-3">
        UserAgent
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="small">
            <tr>
                <th>ID</th>
                <th>UserAgent</th>
                <th>Device</th>
                <th>Platform</th>
                <th>Browser</th>
                <th>Robot</th>
                <th>Disabled</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->user_agent }}</td>
                    <td>{{ $obj->device }}</td>
                    <td>{{ $obj->platform }}</td>
                    <td>{{ $obj->browser }}</td>
                    <td>{{ $obj->robot }}</td>
                    <td>{{ $obj->disabled ? 'Yes' : 'No' }}</td>
                    <td>{{ $obj->created_at }}</td>
                    <td>{{ $obj->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
