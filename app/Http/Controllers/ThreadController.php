<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Thread;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ThreadController extends Controller
{

    use AuthorizesRequests;

    public function index()
    {
        $threads = Thread::with('author')
            ->latest()
            ->paginate(10);

        return view('threads.index', compact('threads'));
    }

    public function create()
    {
        return view('threads.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['title']);

        Thread::create($data);

        return redirect()->route('threads.index')
            ->with('success', 'Diskusi berhasil dibuat.');
    }

    public function show(Thread $thread)
    {
        $thread->load(['author', 'replies.author']);

        return view('threads.show', compact('thread'));
    }

    public function destroy(Thread $thread)
    {
        $this->authorize('delete', $thread);

        $thread->delete();

        return redirect()->route('threads.index')->with('success', 'Thread dihapus.');;
    }
}
