<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Project project
    public function index(){
        $projects = Project::all();
        // dd($projects); // Uncomment for debugging
        return view("projects.index", compact('projects'));
    }

    public function create(){
        $partners = Partner::all();
        return view("projects.create", compact('partners'));
    }

    public function store(Request $request){
        
        $data = $request->validate([
            'title' => "required",
            'description' => "required",
            
        ]);
        
        $project = Project::create($data);
        $partners = $request->input('partners');
        $project->partners()->sync($partners);
        
        return redirect()->route("projects");
    }
    public function edit(Project $project) {
       
        return view('projects.edit', ['project' => $project]);
    }
    public function update(Project $project, Request $request) {
        $data = $request->validate([
            'title' => "required",
            'description' => "required",
        ]);

        $project->update($data);
        return redirect(route("projects"))->with('success', "project successfully updated");
    }

    public function destroy(Project $project) {
        $project->delete();
        return redirect(route("projects"))->with('success', "project successfully deleted"); 
    }

}
