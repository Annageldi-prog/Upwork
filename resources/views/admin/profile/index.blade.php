@extends('layouts.app')
@section('title')
    Profiles
@endsection
@section('content')
    <div class="h3 p-3">
        Profiles
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="small">
            <tr>
                <th>Id</th>
                <th>Freelancer</th>
                <th>Title</th>
                <th width="10%">Body</th>
                <th>Works</th>
                <th>Proposals</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->freelancer?->first_name }} {{ $obj->freelancer?->last_name }}</td>                    <td>{{ $obj->body }}</td>
                    <td><a href="{{ route('auth.works.index', ['profile' => $obj->id]) }}" class="text-decoration-none" target="_blank"><i class="bi-box-arrow-up-right"> </i>{{ $obj->works_count }}</a></td>
                    <td><a href="{{ route('auth.proposals.index', ['profile' => $obj->id]) }}" class="text-decoration-none" target="_blank"><i class="bi-box-arrow-up-right"> </i>{{ $obj->proposals_count }}</a></td>
                    <td>{{ $obj->created_at }}</td>
                    <td>{{ $obj->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
