<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Opportunity;
use App\Models\OpportunityCategory;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalCategories'      => OpportunityCategory::count(),
            'pendingOpportunitiesList' => Opportunity::where('status', 'pending')->latest()->get(),
            'totalOpportunities'   => Opportunity::count(),
            'totalUsers'           => User::count(),
            'totalBlogs'           => Blog::count(),
        ]);
    }
}
