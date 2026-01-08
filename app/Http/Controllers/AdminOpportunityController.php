<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class AdminOpportunityController extends Controller
{
    public function index()
    {
        return view('admin.opportunities.index', [
            'pendingOpportunities' => Opportunity::latest()->paginate(10)
        ]);
    }

    public function update(Opportunity $opportunity)
    {
        $opportunity->update([
            'status' => request('status')
        ]);

        return back()->with('success', 'Status opportunity diperbarui.');
    }

    public function destroy(Opportunity $opportunity)
    {
        $opportunity->delete();
        return back()->with('success', 'Opportunity dihapus.');
    }
}

