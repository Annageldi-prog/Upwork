@extends('layouts.app')
@section('title')
    Verification
@endsection
@section('content')

    <div class="h3 p-3">
        Verifications
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="small">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Code</th>
                <th>Method</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->username }}</td>
                    <td>{{ $obj->code }}</td>
                    <td>{{ $obj->method }}</td>
                    <td>{{ $obj->status }}</td>
                    <td>{{ $obj->created_at }}</td>
                    <td>{{ $obj->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
