<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Freelancer;
use App\Models\Location;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FreelancerController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'location' => 'nullable|exists:locations,id',
        ]);

        $freelancers = Freelancer::when($request->location, fn($q) => $q->where('location_id', $request->location))
            ->with('location')
            ->withCount([
                'profiles',
                'freelancerSkills',
                'myReviews',
                'clientReviews',
                'works',
                'proposals'
            ])
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin.freelancer.index', compact('freelancers'));
    }

    public function create()
    {
        $locations = Location::all();
        $skills = Skill::all();
        return view('admin.freelancer.create', compact('locations', 'skills'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:freelancers,username',
            'password' => 'required|string|min:6',
            'location_id' => 'nullable|exists:locations,id',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'rating' => 'nullable|numeric|min:0|max:5',
            'total_jobs' => 'nullable|integer|min:0',
            'total_earnings' => 'nullable|integer|min:0',
            'previous_clients' => 'nullable|array',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
            'works' => 'nullable|string',
            'proposals' => 'nullable|string',
        ]);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('avatars/freelancers', 'public');
        }

        $validated['uuid'] = Str::uuid();
        $validated['password'] = bcrypt($validated['password']);
        $validated['verified'] = $request->boolean('verified');

        // Сохраняем previous_clients как JSON
        if (isset($validated['previous_clients'])) {
            $validated['previous_clients'] = json_encode($validated['previous_clients']);
        }

        $freelancer = Freelancer::create($validated);

        // Синхронизация навыков
        if ($request->filled('skills')) {
            $freelancer->freelancerSkills()->sync($request->skills);
        }

        // Создание Works
        if ($request->filled('works')) {
            foreach (explode("\n", $request->works) as $work) {
                $freelancer->works()->create([
                    'uuid' => Str::uuid(),
                    'title' => trim($work),
                    'client_id' => null,
                    'body' => null,
                ]);
            }
        }

        // Создание Proposals
        if ($request->filled('proposals')) {
            foreach (explode("\n", $request->proposals) as $proposal) {
                $freelancer->proposals()->create([
                    'uuid' => Str::uuid(),
                    'title' => trim($proposal),
                    'work_id' => null,
                    'profile_id' => null,
                    'cover_letter' => null,
                ]);
            }
        }

        return redirect()->route('auth.freelancers.index')
            ->with('success', 'Freelancer created successfully!');
    }

    public function show(Freelancer $freelancer)
    {
        $freelancer->load('location', 'freelancerSkills', 'profiles', 'works', 'proposals');
        return view('admin.freelancer.show', compact('freelancer'));
    }

    public function edit(Freelancer $freelancer)
    {
        $locations = Location::all();
        $skills = Skill::all();
        return view('admin.freelancer.edit', compact('freelancer', 'locations', 'skills'));
    }

    public function update(Request $request, Freelancer $freelancer)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:freelancers,username,' . $freelancer->id,
            'password' => 'nullable|string|min:6',
            'location_id' => 'nullable|exists:locations,id',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'verified' => 'sometimes|boolean',
            'previous_clients' => 'nullable|array',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ]);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('avatars/freelancers', 'public');
        }

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $validated['verified'] = $request->boolean('verified');

        // previous_clients как JSON
        if (isset($validated['previous_clients'])) {
            $validated['previous_clients'] = json_encode($validated['previous_clients']);
        }

        $freelancer->update($validated);

        if ($request->filled('skills')) {
            $freelancer->freelancerSkills()->sync($request->skills);
        }

        return redirect()->route('auth.freelancers.index')
            ->with('success', 'Freelancer updated successfully!');
    }

    public function destroy(Freelancer $freelancer)
    {
        $freelancer->delete();
        return redirect()->route('auth.freelancers.index')
            ->with('success', 'Freelancer deleted successfully!');
    }
}
