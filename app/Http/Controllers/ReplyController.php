<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    use AuthorizesRequests;
    
    public function store(Request $request, Thread $thread)
    {
        if ($thread->is_locked) {
            abort(403, 'Thread ini telah dikunci.');
        }

        $request->validate([
            'body' => 'required|string',
        ]);

        $thread->replies()->create([
            'user_id' => Auth::id(),
            'body'    => $request->body,
        ]);

        return back()->with('success', 'Balasan ditambahkan.');
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('delete', $reply);

        $reply->delete();

        return back()->with('success', 'Balasan berhasil dihapus.');
    }
}
