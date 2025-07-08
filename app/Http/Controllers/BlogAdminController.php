<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::query();

        // Cek apakah ada input pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $blogs = $query->latest()->paginate(10);

        $user = auth()->user(); // ambil user saat ini, bisa dipakai di view jika perlu

        return view('admin.blog.index', compact('blogs', 'user'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('blog', 'public');
        }


        Blog::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil ditambahkan');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('blog', 'public');
        }

        $blog->update($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil diperbarui');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil dihapus');
    }

    // Fungsi untuk customer/view frontend, kalau perlu tetap di sini
    public function customerView(Request $request)
    {
        $query = Blog::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $blogs = $query->latest()->get();
        $recentBlogs = $blogs->take(3); // Ambil 3 terbaru

        return view('blogs.customer', compact('blogs', 'recentBlogs'));
    }

    public function customerDetail($id)
    {
        $blog = Blog::findOrFail($id);
        $recentBlogs = Blog::latest()->take(3)->get();

        return view('blogs.detail', compact('blog', 'recentBlogs'));
    }
}
