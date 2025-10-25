@extends('layouts.app')
@section('title')
    Works
@endsection
@section('content')
    <div class="h3 p-3">
        Works
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="small">
            <tr>
                <th>Id</th>
                <th>Client</th>
                <th>Freelancer</th>
                <th>Profile</th>

                <th>Experience Level</th>
                <th>Proposals</th>
                <th>Title</th>
                <th width="10%">Created At</th>
                <th width="10%">Updated At</th>
            </tr>
            </thead>

            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->client->first_name }} {{ $obj->client->last_name }}</td>
                    <td>{{ $obj->freelancer?->first_name }} {{ $obj->freelancer?->last_name }}</td>
                    <td>{{ $obj->profile?->id }}</td>
                    <td>
                        <span class="badge bg-{{ $obj->experienceLevelColor() }}-subtle text-{{ $obj->experienceLevelColor() }}-emphasis">
                            {{ $obj->experienceLevel() }}
                        </span>
                    </td>
                    <td><a href="{{ route('auth.proposals.index', ['work' => $obj->id]) }}" class="text-decoration-none" target="_blank"><i class="bi-box-arrow-up-right"> </i>{{ $obj->proposals_count }}</a></td>
                    <td>{{ $obj->title }}</td>
                    <td>{{ $obj->created_at }}</td>
                    <td>{{ $obj->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
