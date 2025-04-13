<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Example dashboard statistics
        $stats = [
            'total_services' => Service::count(),
            'active_users' => User::where('is_active', true)->count(),
            'recent_services' => Service::latest()->take(5)->get(),
        ];

        return view('dashboard.index', compact('stats'));
    }
}
