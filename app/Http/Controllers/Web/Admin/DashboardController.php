<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\IpAddress;
use App\Models\UserAgent;
use App\Models\Visitor;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function index()
    {
        $visitors = Visitor::with('ipAddress', 'userAgent')->get();
        $userAgents = UserAgent::withCount('visitors')->get();
        $ipAddresses = IpAddress::withCount('visitors')->get();

        return view('admin.auth.dashboard', compact('visitors', 'userAgents', 'ipAddresses'));
    }
}
