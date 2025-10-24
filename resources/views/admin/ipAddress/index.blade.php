@extends('layouts.app')
@section('title')
    IpAddress
@endsection
@section('content')

    <div class="h3 p-3">
        IpAddress
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="small">
            <tr>
                <th>ID</th>
                <th>IP Address</th>
                <th>Country Code</th>
                <th>Country Name</th>
                <th>City Name</th>
                <th>Disabled</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->ip_address }}</td>
                    <td>{{ $obj->country_code }}</td>
                    <td>{{ $obj->country_name }}</td>
                    <td>{{ $obj->city_name }}</td>
                    <td>{{ $obj->disabled ? 'Yes' : 'No' }}</td>
                    <td>{{ $obj->created_at }}</td>
                    <td>{{ $obj->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
