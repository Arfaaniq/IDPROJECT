<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

     // menampilkan form create project baru
     public function create()
     {
         return view('admin.projects.create');
     }

    // store create project baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

         // menyimpan gambar
         if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public'); // menyimpan di folder public/images
            }
            
            Project::create([
                'name' => $request['name'],
                'image_path' => $imagePath,
                'user_id' => auth('admin')->id(), 
            ]);
            
            return redirect()->route('projects.index')->with('success', 'Project added successfully');
    }

     // controller hapus galeri
     public function destroy(Project $project)
     {
     // Hapus file gambar jika perlu
     if ($project->image_path && Storage::disk('public')->exists($project->image_path)) {
         Storage::disk('public')->delete($project->image_path);
     }
 
     $project->delete();
 
     return redirect()->route('projects.index')->with('success', 'Gambar berhasil dihapus.');
     }
    
}