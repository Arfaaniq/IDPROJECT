<?php

namespace App\Http\Controllers\Admin; // Jika Anda tetap ingin menggunakan namespace ini

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Blog;

class BlogController extends Controller // Tetap dengan nama BlogController atau ganti menjadi CustomerBlogController
{
    /**
     * Menampilkan halaman utama (daftar blog) untuk customer.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $blog = Blog::latest()->paginate(9); // Sesuaikan jumlah per halaman
        $recentPosts = Blog::latest()->take(5)->get();
        return view('customers.blog', compact('blog', 'recentPosts')); // Pastikan view ini benar
    }

    /**
     * Menampilkan detail satu artikel blog untuk customer.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $item = Blog::findOrFail($id);
        $recentPosts = Blog::latest()->take(5)->get();
        return view('customers.blogdetail', compact('item', 'recentPosts')); // Pastikan view ini benar
    }

    /**
     * Menangani pencarian blog untuk customer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        $blog = Blog::where('judul', 'like', "%{$query}%")
                    ->orWhere('deskripsi', 'like', "%{$query}%")
                    ->latest()
                    ->paginate(9)
                    ->withQueryString();

        $recentPosts = Blog::latest()->take(5)->get();

        return view('customers.blog', compact('blog', 'recentPosts', 'query')); // Pastikan view ini benar
    }
}