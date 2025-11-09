@extends('layouts.app')

@section('title')
    Freelancers
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center p-3">
        <h3 class="m-0">Freelancers</h3>
        <a href="{{ route('auth.freelancers.create') }}" class="btn btn-success btn-sm">
            <i class="bi bi-plus-circle"></i> Create Freelancer
        </a>
    </div>


    <div class="table-responsive px-3">
        <table class="table table-striped table-hover table-bordered table-sm align-middle">
            <thead class="table-light small text-center">
            <tr>
                <th>ID</th>
                <th>Location</th>
                <th>Name<br>Surname</th>
                <th>Username</th>
                <th>Verified</th>
                <th>Rating</th>
                <th>Total jobs</th>
                <th>Total earnings</th>
                <th>Skills</th>
                <th>Works</th>
                <th>Proposals</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
            @forelse($freelancers as $freelancer)
                <tr class="text-center">
                    <td>{{ $freelancer->id }}</td>
                    <td>{{ $freelancer->location?->name ?? 'Not specified' }}</td>
                    <td>{{ $freelancer->first_name }} <br> {{ $freelancer->last_name }}</td>
                    <td>+993 {{ $freelancer->username }}</td>
                    <td>
                        @if($freelancer->verified)
                            <span class="badge bg-success-subtle text-success-emphasis">Verified</span>
                        @else
                            <span class="badge bg-warning-subtle text-warning-emphasis">Not Verified</span>
                        @endif
                    </td>
                    <td class="bi-star-fill text-warning"><span class="text-dark ps-2">{{ $freelancer->rating }}</span></td>
                    <td>{{ $freelancer->total_jobs }}</td>
                    <td>{{ $freelancer->total_earnings }}</td>
                    <td>
                        <a href="{{ route('auth.skills.index', ['freelancer' => $freelancer->id]) }}" class="text-decoration-none" target="_blank">
                            <i class="bi bi-box-arrow-up-right"></i> {{ $freelancer->freelancer_skills_count }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('auth.works.index', ['freelancer' => $freelancer->id]) }}" class="text-decoration-none" target="_blank">
                            <i class="bi bi-box-arrow-up-right"></i> {{ $freelancer->works_count }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('auth.proposals.index', ['freelancer' => $freelancer->id]) }}" class="text-decoration-none" target="_blank">
                            <i class="bi bi-box-arrow-up-right"></i> {{ $freelancer->proposals_count }}
                        </a>
                    </td>
                    <td>{{ $freelancer->created_at->format('Y-m-d H:i') }}</td>
                    <td>{{ $freelancer->updated_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <form action="{{ route('auth.freelancers.destroy', $freelancer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this freelancer?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="14" class="text-center text-muted py-3">No freelancers found.</td>
                </tr>
            @endforelse

            </tbody>
        </table>
    </div>
@endsection
