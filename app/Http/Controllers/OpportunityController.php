<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Http\Controllers\Controller;
use App\Http\Requests\OpportunityRequest;
use App\Models\OpportunityCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = Opportunity::all();
        // dd($opportunities);  
        // return view('opportunity.index', compact('opportunities'));
        return view('opportunity.index');
    }

    public function create()
    {
        $categories = OpportunityCategory::all();
        return view('opportunity.create', compact('categories'));
    }

    public function store(OpportunityRequest $request)
    {
        $data = $request->validated();
        // Generate slug otomatis jika kosong
        if (empty($data['slug'])) {
            $baseSlug = Str::slug($data['title']);
            $slug = $baseSlug;
            $counter = 1;

            while (Opportunity::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $data['slug'] = $slug;
        }

        if ($request->hasFile('poster_url')) {
            $data['poster_url'] = $request->file('poster_url')
                ->store('poster/opportunity', 'public');
        }

        Opportunity::create($data);

        return redirect()->route('opportunities.index')
            ->with('success', 'Tulisan berhasil diterbitkan.');
    }

    public function show(Opportunity $opportunity)
    {
        return view('opportunity.show', compact('opportunity'));
    }

    public function edit(Opportunity $opportunity)
    {
        $categories = OpportunityCategory::all();
        return view('opportunity.edit', compact('opportunity', 'categories'));
    }

    public function update(OpportunityRequest $request, Opportunity $opportunity)
    {
        $opportunity->update($request->validated());

        return back()->with('success', 'Peluang berhasil diubah.');
    }

    public function destroy(Opportunity $opportunity)
    {
        $opportunity->delete();

        return back()->with('success', 'Peluang berhasil dihapus.');
    }

    public function addToCalendar(Opportunity $opportunity)
{
    $client = $this->client();
    $client->setAccessToken(session('google_token'));

    $service = new Calendar($client);

    $event = new Calendar\Event([
        'summary' => $opportunity->title,
        'description' => $opportunity->description,
        'start' => [
            'dateTime' => $opportunity->start_date->toRfc3339String(),
            'timeZone' => 'Asia/Jakarta',
        ],
        'end' => [
            'dateTime' => $opportunity->end_date->toRfc3339String(),
            'timeZone' => 'Asia/Jakarta',
        ],
    ]);

    $service->events->insert('primary', $event);
}

}
