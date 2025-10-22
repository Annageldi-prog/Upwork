<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $objs = Review::with('freelancer', 'client')
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.review.index')
            ->with([
                'objs' => $objs,
            ]);
    }
}
