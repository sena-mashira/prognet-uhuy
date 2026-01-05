<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{

    use AuthorizesRequests;

    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        // dd($blogs);
        return view('blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(BlogRequest $request)
    {
        $data = $request->validated();
        $data['author_id'] = Auth::id();

        // Generate slug otomatis jika kosong
        if (empty($data['slug'])) {
            $baseSlug = Str::slug($data['title']);
            $slug = $baseSlug;
            $counter = 1;

            while (Blog::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $data['slug'] = $slug;
        }

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')
                ->store('thumbnails/blog', 'public');
        }

        Blog::create($data);

        return redirect()->route('blogs.index')
            ->with('success', 'Tulisan berhasil diterbitkan.');
    }


    public function show(Blog $blog)
    {
        return view('blog.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $this->authorize('update', $blog);

        $data = $request->validated();

        // Jika ada thumbnail baru
        if ($request->hasFile('thumbnail')) {

            // Hapus thumbnail lama jika ada
            if ($blog->thumbnail && Storage::disk('public')->exists($blog->thumbnail)) {
                Storage::disk('public')->delete($blog->thumbnail);
            }

            // Simpan thumbnail baru
            $data['thumbnail'] = $request->file('thumbnail')
                ->store('thumbnails/blog', 'public');
        }

        // Jika slug kosong, regenerate dari title
        if (empty($data['slug'])) {
            $data['slug'] = $this->generateUniqueSlug($data['title'], $blog->id);
        }

        $blog->update($data);

        return redirect()
            ->route('blogs.index')
            ->with('success', 'Tulisan berhasil diperbarui.');
    }

    public function destroy(Blog $blog)
    {
        $this->authorize('delete', $blog);

        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Article deleted.');
    }

    private function generateUniqueSlug(string $title, $ignoreId = null): string
{
    $slug = Str::slug($title);
    $original = $slug;
    $counter = 1;

    while (
        Blog::where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
    ) {
        $slug = $original . '-' . $counter++;
    }

    return $slug;
}
}
