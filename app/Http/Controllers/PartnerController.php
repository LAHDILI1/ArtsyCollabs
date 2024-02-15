<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    // Partner partner

    public function index(){
        $partners = Partner::all();
        // dd($partners); // Uncomment for debugging
        return view("partners.index", compact('partners'));
    }

    public function create(){
        return view("partners.create");
    }

    public function store(Partner $partner , Request $request){
        
        $data = $request->validate([
            'name_partner' => "required",
            'description' => "required",
        ]);

        $partner::create($data);
        return redirect()->route("partners");
    }
    public function edit(Partner $partner) {
       
        return view('partners.edit', ['partner' => $partner]);
    }
    public function update(Partner $partner, Request $request) {
        $data = $request->validate([
            'name_partner' => "required",
            'description' => "required",
        ]);

        $partner->update($data);
        return redirect(route("partners"))->with('success', "partner successfully updated");
    }

    public function destroy(Partner $partner) {
        $partner->delete();
        return redirect(route("partners"))->with('success', "partner successfully deleted"); 
    }

}
