<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 

class BlogdetailController extends Controller
{
    /**
     * Menampilkan halaman utama (home).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('customers/blogdetail'); // Mengembalikan tampilan home.blade.php
    }
}