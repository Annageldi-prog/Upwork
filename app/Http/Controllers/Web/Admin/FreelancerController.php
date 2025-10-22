<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Freelancer;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'location' => ['nullable', 'integer', 'min:1'],
        ]);
        $f_location = $request->has('location') ? $request->location : null;

        $objs = Freelancer::when(isset($f_location), fn($query) => $query->where('location_id', $f_location))
            ->with('location')
            ->withCount('profiles', 'freelancerSkills', 'myReviews', 'clientReviews', 'works', 'proposals')
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.freelancer.index')
            ->with([
                'objs' => $objs,
            ]);
    }
}
