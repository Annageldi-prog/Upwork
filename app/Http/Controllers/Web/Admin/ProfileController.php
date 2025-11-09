<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::with('freelancer')->paginate(10);
        return view('admin.profile.index', compact('profiles'));
    }

    public function create()
    {
        $freelancers = Freelancer::all();
        return view('admin.profile.create', compact('freelancers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'freelancer_id' => 'required|exists:freelancers,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $validated['uuid'] = Str::uuid();

        Profile::create($validated);

        return redirect()->route('auth.profiles.index')->with('success', 'Profile created successfully!');
    }

    public function show(Profile $profile)
    {
        $profile->load('freelancer');
        return view('admin.profile.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        $freelancers = Freelancer::all();
        return view('admin.profile.edit', compact('profile', 'freelancers'));
    }

    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'freelancer_id' => 'required|exists:freelancers,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $profile->update($validated);

        return redirect()->route('auth.profiles.index')->with('success', 'Profile updated successfully!');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('auth.profiles.index')->with('success', 'Profile deleted successfully!');
    }
}
