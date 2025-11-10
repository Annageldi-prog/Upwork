<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'client' => ['nullable', 'integer', 'min:1'],
            'freelancer' => ['nullable', 'integer', 'min:1'],
            'profile' => ['nullable', 'integer', 'min:1'],
        ]);

        $objs = Work::when($request->filled('client'), fn($q) => $q->where('client_id', $request->client))
            ->when($request->filled('freelancer'), fn($q) => $q->where('freelancer_id', $request->freelancer))
            ->when($request->filled('profile'), fn($q) => $q->where('profile_id', $request->profile))
            ->with('client', 'freelancer', 'profile')
            ->withCount('proposals', 'workSkills')
            ->orderByDesc('id')
            ->paginate(10); 

        return view('admin.work.index', compact('objs'));
    }
}
