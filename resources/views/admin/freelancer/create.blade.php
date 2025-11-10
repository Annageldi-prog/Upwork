@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-light">Create Freelancer</h2>

        <form action="{{ route('auth.freelancers.store') }}" method="POST" enctype="multipart/form-data" class="bg-dark p-4 rounded shadow-sm">
            @csrf

            {{-- Name fields --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label text-light">First Name</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-light">Last Name</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>
            </div>

            {{-- Username & Password --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label text-light">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-light">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>

            {{-- Avatar upload --}}
            <div class="mb-3">
                <label class="form-label text-light">Avatar</label>
                <input type="file" name="avatar" class="form-control">
            </div>

            {{-- Location --}}
            <div class="mb-3">
                <label class="form-label text-light">Location</label>
                <select name="location_id" class="form-select">
                    <option value="">-- Select location --</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Rating --}}
            <div class="mb-3">
                <label class="form-label text-light">Rating</label>
                <div class="star-rating d-flex">
                    <input type="hidden" name="rating" value="0">
                    <span class="star" data-value="1">★</span>
                    <span class="star" data-value="2">★</span>
                    <span class="star" data-value="3">★</span>
                    <span class="star" data-value="4">★</span>
                    <span class="star" data-value="5">★</span>
                </div>
            </div>

            {{-- Total jobs / earnings --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label text-light">Total Jobs</label>
                    <input type="number" name="total_jobs" class="form-control" min="0" value="0">
                </div>
                <div class="col-md-6">
                    <label class="form-label text-light">Total Earnings ($)</label>
                    <input type="number" name="total_earnings" class="form-control" min="0" value="0">
                </div>
            </div>

            {{-- Previous Clients --}}
            <div class="mb-3">
                <label class="form-label text-light">Previous Clients (comma separated)</label>
                <input type="text" name="previous_clients" class="form-control" placeholder="Example: Google, Microsoft, Tesla">
            </div>

            {{-- Skills --}}
            <div class="mb-3">
                <label class="form-label text-light">Skills</label>
                <select name="skills[]" class="form-select" multiple>
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Works --}}
            <div class="mb-3">
                <label class="form-label text-light">Works (one per line)</label>
                <textarea name="works" class="form-control" rows="3" placeholder="Project 1&#10;Project 2"></textarea>
            </div>

            {{-- Proposals --}}
            <div class="mb-3">
                <label class="form-label text-light">Proposals (one per line)</label>
                <textarea name="proposals" class="form-control" rows="3" placeholder="Proposal 1&#10;Proposal 2"></textarea>
            </div>

            {{-- Verified --}}
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="verified" id="verified">
                <label class="form-check-label text-light" for="verified">Verified</label>
            </div>

            <button type="submit" class="btn btn-success">Create Freelancer</button>
        </form>
    </div>

    {{-- Star rating JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const stars = document.querySelectorAll('.star-rating .star');
            const input = document.querySelector('.star-rating input[name="rating"]');

            stars.forEach((star, idx) => {
                star.addEventListener('click', () => {
                    input.value = star.dataset.value;
                    stars.forEach((s, i) => {
                        if(i < idx + 1) s.classList.add('selected');
                        else s.classList.remove('selected');
                    });
                });

                star.addEventListener('mouseover', () => {
                    stars.forEach((s, i) => {
                        if(i <= idx) s.classList.add('hover');
                        else s.classList.remove('hover');
                    });
                });

                star.addEventListener('mouseout', () => {
                    stars.forEach(s => s.classList.remove('hover'));
                });
            });
        });
    </script>

    {{-- Rating styles --}}
    <style>
        .star-rating {
            font-size: 1.8rem;
            cursor: pointer;
            color: #ccc;
        }
        .star-rating .star.selected,
        .star-rating .star.hover {
            color: gold;
        }
    </style>
@endsection
