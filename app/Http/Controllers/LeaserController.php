<?php

namespace App\Http\Controllers;

use App\Models\Leaser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Userpost;
use App\Models\User;
use App\Models\Room;
use App\Models\Category;
use App\Models\Township;


class LeaserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */

    public function login()
    {

        session()->put('user','leaser');
      
         return view('leasers.login');
    }
    public function register()
    {
         $leasers = Leaser::all();
         return view('leasers.register',compact('leasers'));
    }

    public function index()
    {
        $email=Leaser::leaser()->email;
        $leaser=Leaser::where('email','=',$email)->get();
        
        return view('leaser',compact('leaser'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function store()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    protected function create()
    {
       //
    }

    /**
     * Display the specified resource.
     */
    public function show(Leaser $leaser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leaser $leaser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
         //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leaser $leaser)
    {
        //
    }


}
