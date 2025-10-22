@extends('layouts.app')
@section('title')
    Reviews
@endsection
@section('content')
    <div>
        @include('app.nav')
    </div>

    <div class="h3 p-3">
        Reviews
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="small">
            <tr>
                <th>Id</th>
                <th>Freelancers</th>
                <th>Clients</th>
                <th>From</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>

            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->freelancer->first_name }} {{ $obj->freelancer->last_name }}</td>
                    <td>{{ $obj->client->first_name }} {{ $obj->client->last_name }}</td>
                    <td>{{ $obj->from }}</td>
                    <td>{{ $obj->rating }}</td>
                    <td>{{ $obj->comment }}</td>
                    <td>{{ $obj->created_at }}</td>
                    <td>{{ $obj->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div>{{ $objs->links() }}</div>
@endsection
