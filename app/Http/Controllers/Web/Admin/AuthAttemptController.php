<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthAttempt;

class AuthAttemptController extends Controller
{
    public function index()
    {
        $objs = AuthAttempt::with(['ipAddress', 'userAgent'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.authAttempt.index')->with([
            'objs' => $objs,
        ]);
    }
}
