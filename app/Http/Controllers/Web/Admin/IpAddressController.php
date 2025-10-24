<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\IpAddress;

class IpAddressController extends Controller
{
    public function index()
    {
        $objs = IpAddress::orderBy('id', 'desc')->paginate(10);

        return view('admin.ipAddress.index')->with([
            'objs' => $objs,
        ]);
    }

}
