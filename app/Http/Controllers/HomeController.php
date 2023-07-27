<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Userpost;
use App\Models\Leaserpost;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $email=Auth::user()->email;
        
        $userposts = Userpost::where('useremail','=',$email)->get();
        $user=User::where('email','=',$email)->get();
        
        return view('home',compact('user','userposts'));
    }

    public function leaserIndex(){

        $email=Auth::user()->email;
        
        $leaserposts = Leaserpost::where('leaseremail','=',$email)->get();
        $user=User::where('email','=',$email)->get();
  
        return view('leaser',compact('user','leaserposts'));

    }

    public function post(){
        
        $email=Auth::user()->email;
        
        $leaserposts = Leaserpost::where('leaseremail','=',$email)->get();
        return view('leaserpost',compact('leaserposts'));
    }

    public function show($id){

        $leaserpost = Leaserpost::findOrFail($id);
        return view('detailleaserpost',compact('leaserpost'));
    }

    public function edit($id){

        $leaserpost = Leaserpost::findOrFail($id);
        return view('editleaserpost',compact('leaserpost'));
    }

    public function finding(){
        $userposts = Userpost::paginate(4);
        return view('userfindingpost',compact('userposts'));
    }

    public function search(Request $request){

        $str=$request->search;

        $userposts = Userpost::where('user_id', 'LIKE', '%' . $str . '%')
                     ->orWhere('username', 'LIKE', '%' . $str . '%')
                     ->paginate(6);
        $userposts->appends(['userposts' => $str]);

        return redirect()->route('user-findingpost',compact('userposts'));

    }
    
}
