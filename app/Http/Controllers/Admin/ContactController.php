<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 

class ContactController extends Controller
{
    /**
     * Menampilkan halaman utama (home).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('customers/contact'); // Mengembalikan tampilan home.blade.php
    }
}
