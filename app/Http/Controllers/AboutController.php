<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
class AboutController extends Controller
{
    /**
     * Menampilkan halaman utama (home).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('customers/about'); // Mengembalikan tampilan home.blade.php
    }
}
