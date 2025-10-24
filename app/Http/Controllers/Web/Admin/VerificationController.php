<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Verification;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function index()
    {
        $objs = Verification::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.verification.index')->with([
            'objs' => $objs,
        ]);
    }
}
