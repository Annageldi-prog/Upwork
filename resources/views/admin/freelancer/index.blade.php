@extends('layouts.app')
@section('title')
    Freelancers
@endsection
@section('content')

    <div class="h3 p-3">
        Freelancers
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="small">
            <tr>
                <th>Id</th>
                <th>Location</th>
                <th>Name<br>surname</th>
                <th width="10%">Username</th>
                <th>Verified</th>
                <th>Skills</th>
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
                    <td>{{ $obj->location?->name ?? 'Not specified' }}</td>
                    <td>{{ $obj->first_name }} <br> {{ $obj->last_name }}</td>
                    <td>+993 {{ $obj->username }}</td>
                    <td>
                        @if($obj->verified)
                            <div class="badge bg-success-subtle text-success-emphasis">Verified</div>
                        @else
                            <div class="badge bg-warning-subtle text-warning-emphasis">Not Verified</div>
                        @endif
                    </td>
                    <td><a href="{{ route('auth.skills.index', ['freelancer' => $obj->id]) }}" class="text-decoration-none" target="_blank"><i class="bi-box-arrow-up-right"> </i>{{ $obj->freelancer_skills_count }}</a></td>
                    <td><a href="{{ route('auth.works.index', ['freelancer' => $obj->id]) }}" class="text-decoration-none" target="_blank"><i class="bi-box-arrow-up-right"> </i>{{ $obj->works_count }}</a></td>
                    <td><a href="{{ route('auth.proposals.index', ['freelancer' => $obj->id]) }}" class="text-decoration-none" target="_blank"><i class="bi-box-arrow-up-right"> </i>{{ $obj->proposals_count }}</a></td>
                    <td>{{ $obj->created_at }}</td>
                    <td>{{ $obj->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

