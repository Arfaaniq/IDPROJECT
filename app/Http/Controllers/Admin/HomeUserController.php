<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InstagramEmbed;
use App\Models\Project;


class HomeUserController extends Controller
{
    /**
     * Menampilkan halaman utama (home).
     *
     * @return \Illuminate\View\View
     */
    public function index()
{
    $recentEmbeds = InstagramEmbed::latest()->take(4)->get();
    $projects = Project::latest()->take(8)->get(); // Tambahkan ini
    return view('customers.home', compact('recentEmbeds', 'projects'));
}
    
   
}
