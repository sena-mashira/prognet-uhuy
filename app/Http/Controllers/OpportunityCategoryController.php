<?php

namespace App\Http\Controllers;

use App\Models\OpportunityCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\OpportunityCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpportunityCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = OpportunityCategory::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OpportunityCategoryRequest $request)
    {
        $validated = $request->validated();

        OpportunityCategory::create($validated);

        return back()->with('success', 'Kategori berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OpportunityCategory $opportunityCategory)
    {
        $category = $opportunityCategory;
        $opportunities = $category->opportunities;
        
        return view('category.show', compact('category', 'opportunities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OpportunityCategory $opportunityCategory)
    {
        $category = $opportunityCategory;
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OpportunityCategoryRequest $request, OpportunityCategory $opportunityCategory)
    {
        //
        $validated = $request->validated();
        $opportunityCategory->update($validated);

        return back()->with('success', 'Kategori berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OpportunityCategory $opportunityCategory)
    {
        $opportunityCategory->delete();
        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}
