@extends('layouts.app')

@section('title')
    Proposals
@endsection

@section('content')
    <div class="h3 p-3">
        Proposals
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="small text-center">
            <tr>
                <th>Id</th>
                <th>Freelancer</th>
                <th>Work</th>
                <th>Profile</th>
                <th>Cover Letter</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>

            <tbody>
            @forelse($objs as $obj)
                <tr class="text-center">
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->freelancer?->first_name ?? 'Not assigned' }} {{ $obj->freelancer?->last_name ?? '' }}</td>
                    <td>{{ $obj->work?->title ?? 'No work' }}</td>
                    <td>{{ $obj->profile?->id ?? 'N/A' }}</td>
                    <td>{{ $obj->cover_letter ?? '-' }}</td>
                    <td>
                        @if(isset($obj->status))
                            <span class="badge bg-{{ $obj->status == 1 ? 'success' : 'warning' }}-subtle text-{{ $obj->status == 1 ? 'success' : 'warning' }}-emphasis">
                                {{ $obj->status == 1 ? 'Accepted' : 'Pending' }}
                            </span>
                        @else
                            <span class="badge bg-secondary-subtle text-secondary-emphasis">Unknown</span>
                        @endif
                    </td>
                    <td>{{ $obj->created_at?->format('Y-m-d H:i') ?? '-' }}</td>
                    <td>{{ $obj->updated_at?->format('Y-m-d H:i') ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center text-muted py-3">No proposals found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
