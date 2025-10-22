<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'location' => ['nullable', 'integer', 'min:1'],
        ]);
        $f_location = $request->has('location') ? $request->location : null;

        $objs = Client::when(isset($f_location), fn($query) => $query->where('location_id', $f_location))
            ->with('location')
            ->withCount('works', 'myReviews')
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.client.index')
            ->with([
                'objs' => $objs,
            ]);
    }
}
