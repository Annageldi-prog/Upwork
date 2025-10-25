@extends('layouts.app')
@section('title')
    User
@endsection
@section('content')

    <div class="h3 p-3">
        Users
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="small">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Username</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->name }}</td>
                    <td>{{ $obj->username }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
