<?php

namespace App\Http\Controllers;

use App\Models\Township;
use Illuminate\Http\Request;

class TownshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $townships = Township::all();
        return view('township.index',compact('townships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('township.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Township::create([
            
                'township'=> $request->town,
            ]);
        return redirect()->route('township.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Township $township)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $township = Township::findOrFail($id);
        return view('township.edit',compact('township'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $township = Township::findOrFail($id);
        $township->township=$request->township;
        $township->save();
        return redirect()->route('township.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $township = Township::findOrFail($id);
        $township->delete();
        return redirect()->route('township.index');
    }
}
