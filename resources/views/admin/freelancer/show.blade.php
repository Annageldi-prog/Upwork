@extends('layouts.app')

@section('title', 'Freelancer Details')

@section('content')
    <div class="p-3">
        <h3>{{ $freelancer->first_name }} {{ $freelancer->last_name }} (ID: {{ $freelancer->id }})</h3>

        <div class="mb-3">
            <strong>Username:</strong> +993 {{ $freelancer->username }} <br>
            <strong>Verified:</strong>
            @if($freelancer->verified)
                <span class="badge bg-success">Verified</span>
            @else
                <span class="badge bg-warning">Not Verified</span>
            @endif
            <br>
            <strong>Rating:</strong> {{ $freelancer->rating }} <br>
            <strong>Total Jobs:</strong> {{ $freelancer->total_jobs }} <br>
            <strong>Total Earnings:</strong> {{ $freelancer->total_earnings }} <br>
            <strong>Location:</strong> {{ $freelancer->location?->name ?? 'Not specified' }} <br>
            <strong>Previous Clients:</strong> {{ $freelancer->previous_clients ?? 'None' }} <br>
        </div>

        <h5>Skills ({{ $freelancer->freelancer_skills_count }}):</h5>
        <ul>
            @forelse($freelancer->freelancerSkills as $skill)
                <li>{{ $skill->name }}</li>
            @empty
                <li>No skills</li>
            @endforelse
        </ul>

        <h5>Works ({{ $freelancer->works_count }}):</h5>
        <div class="table-responsive mb-3">
            <table class="table table-striped table-bordered table-sm">
                <thead class="small text-center">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Proposals</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
                </thead>
                <tbody>
                @forelse($freelancer->works as $work)
                    <tr class="text-center">
                        <td>{{ $work->id }}</td>
                        <td>{{ $work->title }}</td>
                        <td>
                            <a href="{{ route('auth.proposals.index', ['work' => $work->id]) }}" target="_blank">
                                {{ $work->proposals_count ?? $work->proposals->count() }}
                            </a>
                        </td>
                        <td>{{ $work->created_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $work->updated_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No works</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <h5>Proposals ({{ $freelancer->proposals_count }}):</h5>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm">
                <thead class="small text-center">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Work</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
                </thead>
                <tbody>
                @forelse($freelancer->proposals as $proposal)
                    <tr class="text-center">
                        <td>{{ $proposal->id }}</td>
                        <td>{{ $proposal->title }}</td>
                        <td>
                            @if($proposal->work)
                                <a href="{{ route('auth.works.index', ['freelancer' => $freelancer->id]) }}">
                                    {{ $proposal->work->title }}
                                </a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $proposal->created_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $proposal->updated_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No proposals</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('auth.freelancers.index') }}" class="btn btn-secondary mt-3">Back to Freelancers</a>
    </div>
@endsection
