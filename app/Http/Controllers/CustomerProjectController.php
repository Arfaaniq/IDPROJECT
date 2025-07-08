<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class CustomerProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('customers.projects.index', compact('projects'));
    }
     
}
