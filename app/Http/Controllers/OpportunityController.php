<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Http\Controllers\Controller;
use App\Http\Requests\OpportunityRequest;
use App\Models\OpportunityCategory;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::all();
        // dd($opportunities);  
        return view('opportunity.index', compact('opportunities'));
    }

    public function create()
    {
        $categories = OpportunityCategory::all();
        return view('opportunity.create', compact('categories'));
    }

    // STORE — Bab kelahiran, saat tokoh baru memasuki panggung
    public function store(OpportunityRequest $request)
    {
        Opportunity::create($request->validated());

        return back()->with('success', 'Peluang berhasil ditambah');
    }

    // SHOW — Bab penelusuran, kita melihat tokoh secara lebih dekat
    public function show(Opportunity $opportunity)
    {
        return view('opportunity.show', compact('opportunity'));
    }

    public function edit(Opportunity $opportunity)
    {
        $categories = OpportunityCategory::all();
        return view('opportunity.edit', compact('opportunity', 'categories'));
    }

    // UPDATE — Bab perkembangan karakter, ketika ia berubah sesuai alur
    public function update(OpportunityRequest $request, Opportunity $opportunity)
    {
        $opportunity->update($request->validated());

        return back()->with('success', 'Peluang berhasil diubah.');
    }

    // DESTROY — Bab epilog, ketika seorang tokoh akhirnya menutup kisahnya
    public function destroy(Opportunity $opportunity)
    {
        $opportunity->delete();

        return back()->with('success', 'Peluang berhasil dihapus.');
    }
}
