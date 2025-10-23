<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Freelancer;
use App\Models\IpAddress;
use App\Models\User;
use App\Models\UserAgent;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 1,
            'data' => [
                'visitors' => Visitor::with('ipAddress', 'userAgent')->get(),
                'userAgents' => UserAgent::withCount('visitors')->get(),
                'ipAddresses' => IpAddress::withCount('visitors')->get(),
            ],
        ], Response::HTTP_OK);
    }
}
