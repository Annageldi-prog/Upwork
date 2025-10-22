@extends('layouts.app')
@section('title')
    Proposals
@endsection
@section('content')
    <div>
        @include('app.nav')
    </div>

    <div class="h3 p-3">
        Proposals
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm">
            <thead class="small">
            <tr>
                <th>Id</th>
                <th>Work</th>
                <th>Freelancer</th>
                <th>Cover Letter</th>
                <th>Status</th>
                <th width="7.5%">Created At</th>
                <th width="7.5%">Updated At</th>
            </tr>
            </thead>

            <tbody>
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->work->id }}</td>
                    <td>{{ $obj->profile?->id }}</td>
                    <td>{{ $obj->cover_letter }}</td>
                    <td>
                        <span class="badge bg-{{ $obj->statusColor() }}-subtle text-{{ $obj->statusColor() }}-emphasis">
                            {{ $obj->status() }}
                        </span>
                    </td>
                    <td>{{ $obj->created_at }}</td>
                    <td>{{ $obj->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div>{{ $objs->links() }}</div>
@endsection
