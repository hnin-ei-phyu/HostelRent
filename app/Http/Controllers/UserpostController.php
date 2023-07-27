<?php

namespace App\Http\Controllers;

use App\Models\Userpost;
use App\Models\Category;
use App\Models\Township;
use Illuminate\Http\Request;

class UserpostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userposts = Userpost::paginate(8);
        return view('userposts.index',compact('userposts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $townships = Township::all();
        return view('userpost',compact('categories','townships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = "#".rand(10000,99999);
        $post_date = "".date('d-m-y');

        Userpost::create([
            'user_id'=>$user_id,
            'username' =>$request->username,
            'useremail'=>$request->useremail,
            'userphoto'=>$request->userphoto,
            'category' =>$request->category,
            'room_type' =>$request->room_type,
            'location' =>$request->township,
            'price' =>$request->price,
            'post_date' =>$post_date,
            'phone' =>$request->phone,
        ]);
        return redirect()->route('home');
    }

    /*public function success()
    {
        $userposts = Userpost::all();
        return view('viewpost',compact('userposts'));
    }*/
    

    public function viewpost()
    {
        $userposts = Userpost::paginate(4);
        return view('viewpost',compact('userposts'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $userpost = Userpost::all();
        return view('userposts.details',compact('userpost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Userpost $userpost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Userpost $userpost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }

    public function search(Request $request){

        $str=$request->search;

        $userposts = Userpost::where('user_id', 'LIKE', '%' . $str . '%')
                     ->orWhere('username', 'LIKE', '%' . $str . '%')
                     ->paginate(8);
        $userposts->appends(['userposts' => $str]);

        return view('userposts.index',compact('userposts'));

    }

    public function find(Request $request){

        $str=$request->search;

        $userposts = Userpost::where('user_id', 'LIKE', '%' . $str . '%')
                     ->orWhere('username', 'LIKE', '%' . $str . '%')
                     ->paginate(8);
        $userposts->appends(['userposts' => $str]);

        return view('viewpost',compact('userposts'));



    }

}
