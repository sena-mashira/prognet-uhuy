<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserSavedOpportunityController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $saved = $user->savedOpportunities()->latest()->get();
        dd($saved);

        return view('opportunities.saved', compact('saved'));
    }

    public function store($opportunityId)
    {
        $user = Auth::user();

        $isSaved = $user->savedOpportunities()
            ->where('opportunity_id', $opportunityId)
            ->exists();

        if ($isSaved) {
            $user->savedOpportunities()->detach($opportunityId);

            return back()->with('success', 'Peluang dihapus dari list.');
        }

        $user->savedOpportunities()->attach($opportunityId);

        return back()->with('success', 'Peluang berhasil disimpan');
    }
}
