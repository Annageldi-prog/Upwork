<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function index()
    {
        $objs = Visitor::with(['ipAddress', 'userAgent'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.visitor.index')->with([
            'objs' => $objs,
        ]);
    }
}
