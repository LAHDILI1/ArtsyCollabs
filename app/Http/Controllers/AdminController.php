<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){

        return view("admin.index");
        
    }
    public function blank(){
         
        return view("admin.blank");
        
    }
    public function calendar(){
         
        return view("admin.calendar");
        
    }
    public function forms(){
         
        return view("admin.forms");
        
    }
    public function tables(){
         
        return view("admin.tables");    
    }

    public function tabs(){
         
        return view("admin.tabs");    
    }
}
