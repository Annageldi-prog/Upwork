@extends('layouts.app')

@section('title', 'Create Freelancer')

@section('content')
    <div class="container py-3">
        <h3>Create Freelancer</h3>

        <form action="{{ route('auth.freelancers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">First Name <span class="text-danger">*</span></label>
                <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Username (+993) <span class="text-danger">*</span></label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Location</label>
                <select name="location_id" class="form-select">
                    <option value="">-- Select Location --</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                            {{ $location->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="verified" class="form-check-input" id="verified" value="1" {{ old('verified') ? 'checked' : '' }}>
                <label class="form-check-label" for="verified">Verified</label>
            </div>

            <div class="mb-3">
                <label class="form-label">Avatar</label>
                <input type="file" name="avatar" class="form-control">
            </div>


            {{-- Rating --}}
            <div class="mb-2">
                <label class="form-label">Rating </label>
                <br>
                <div class="star-rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="star" data-value="{{ $i }}">&#9733;</span>
                    @endfor
                    <input type="hidden" name="rating" value="{{ old('rating', 0) }}">
                </div>
            </div>


            {{-- Total Jobs --}}
            <div class="mb-3">
                <label class="form-label">Total Jobs</label>
                <input type="number" min="0" name="total_jobs" class="form-control" value="{{ old('total_jobs', 0) }}">
            </div>

            {{-- Total Earnings --}}
            <div class="mb-3">
                <label class="form-label">Total Earnings</label>
                <input type="number" min="0" step="0.01" name="total_earnings" class="form-control" value="{{ old('total_earnings', 0) }}">
            </div>

            {{-- Previous Clients --}}
            <div class="mb-3">
                <label class="form-label">Previous Clients (JSON format)</label>
                <textarea name="previous_clients" class="form-control" rows="3" placeholder='["Client 1", "Client 2"]'>{{ old('previous_clients') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Create Freelancer</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const stars = document.querySelectorAll('.star-rating .star');
            const input = document.querySelector('.star-rating input[name="rating"]');

            stars.forEach((star, idx) => {
                // клик по звезде
                star.addEventListener('click', () => {
                    input.value = star.dataset.value;
                    stars.forEach((s, i) => {
                        s.classList.toggle('selected', i <= idx);
                    });
                });

                // наведение
                star.addEventListener('mouseover', () => {
                    stars.forEach((s, i) => {
                        s.classList.toggle('hover', i <= idx);
                    });
                });

                star.addEventListener('mouseout', () => {
                    stars.forEach(s => s.classList.remove('hover'));
                });
            });
        });
    </script>

@endsection


