<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('dashboard.index', [
            'savedOpportunities' => $user->savedOpportunities()->latest()->get(),
            'threads' => $user->threads()->latest()->get(),
            'blogs' => $user->blogs()->latest()->get(),
        ]);
    }
}

