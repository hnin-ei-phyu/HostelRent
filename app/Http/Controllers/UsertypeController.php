<?php

namespace App\Http\Controllers;

use App\Models\Usertype;
use Illuminate\Http\Request;

class UsertypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usertypes = Usertype::all();
        return view('usertype.index',compact('usertypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usertype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Usertype::create([
            'type'=>$request->type,
        ]);
        return redirect()->route('usertype.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usertype $usertype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usertype = Usertype::findOrFail($id);
        return view('usertype.edit',compact('usertype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $usertype = Usertype::findOrFail($id);
        $usertype->type=$request->type;
        $usertype->save();

        return redirect()->route('usertype.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usertype = Usertype::findOrFail($id);
        $usertype->delete();

        return redirect()->route('usertype.index');
    }
}
