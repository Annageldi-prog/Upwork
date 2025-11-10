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
            <thead class="small text-center">
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
            @forelse($objs as $obj)
                <tr class="text-center">
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->client?->first_name ?? 'Unknown' }} {{ $obj->client?->last_name ?? '' }}</td>
                    <td>{{ $obj->freelancer?->first_name ?? 'Not assigned' }} {{ $obj->freelancer?->last_name ?? '' }}</td>
                    <td>{{ $obj->profile?->id ?? 'N/A' }}</td>
                    <td>
                        <span class="badge bg-{{ $obj->experienceLevelColor() ?? 'secondary' }}-subtle text-{{ $obj->experienceLevelColor() ?? 'secondary' }}-emphasis">
                            {{ $obj->experienceLevel() ?? 'Unknown' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('auth.proposals.index', ['work' => $obj->id]) }}" class="text-decoration-none" target="_blank">
                            <i class="bi-box-arrow-up-right"></i> {{ $obj->proposals_count ?? 0 }}
                        </a>
                    </td>
                    <td>{{ $obj->title ?? '-' }}</td>
                    <td>{{ $obj->created_at?->format('Y-m-d H:i') ?? '-' }}</td>
                    <td>{{ $obj->updated_at?->format('Y-m-d H:i') ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center text-muted py-3">No works found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
