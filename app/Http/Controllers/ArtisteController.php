<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Project;
use Illuminate\Http\Request;

class ArtisteController extends Controller
{
    //

    public function index(){
        $projects = Project::with('partners')->get();
        // dd($projects); // Uncomment for debugging
        return view("artistes.index", compact('projects'));
    }
}
