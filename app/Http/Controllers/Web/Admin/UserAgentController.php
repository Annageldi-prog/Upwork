<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAgent;


class UserAgentController extends Controller
{
    public function index()
    {
        $objs = UserAgent::orderBy('id', 'desc')->paginate(10);

        return view('admin.userAgent.index')->with([
            'objs' => $objs,
        ]);
    }
}
