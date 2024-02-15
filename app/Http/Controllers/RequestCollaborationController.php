<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\RequestCollaboration;
use Illuminate\Http\Request;

class RequestCollaborationController extends Controller
{
    // RequestCollaboration collaboration
    public function index(){
        $collaborations =RequestCollaboration::with(['users','projects'])->get();
        // dd($collaborations); // Uncomment for debugging
        return view("collaborations.index", compact('collaborations'));
    }

    // public function store(Project $project,$user_id, Request $request){
        
    //     $collaboration = RequestCollaboration::create([
    //         'project_id' => $project->id,
    //         'user_id' => $user_id,
    //     ]);
        
    //     return redirect()->route("collaborations");
    // }

    public function store(Project $project, $user_id ,Request $request) {

        // $collaboration = RequestCollaboration::create($request);
        // $project->request_collaborations()->sync($user_id);
        
        // dd($user_id);
        $collaboration = RequestCollaboration::create([
            'user_id' => $project->id,
            'project_id' => $user_id,
        ]);
        return redirect()->route("collaborations");
    }

    public function destroy(RequestCollaboration $collaboration) {
        $collaboration->delete();
        return redirect(route("collaborations"))->with('success', "collaboration successfully deleted"); 
    }
    public function accept(RequestCollaboration $collaboration) {
        foreach($collaboration->projects as $project){
        $user_id = $project->id;
        }
        $collaboration->projects->users()->sync($user_id);
        $collaboration->delete();
        return redirect(route("collaborations")); 
    }
}
