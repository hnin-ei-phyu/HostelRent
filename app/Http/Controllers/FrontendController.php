<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Leaserpost;
use App\Models\Category;
use App\Models\Township;
use App\Models\User;


class FrontendController extends Controller
{
    public function welcome(){
        $users = User::all();
        $categories = Category::all();
        $townships = Township::all();
        $leaserposts=Leaserpost::paginate(6);
        return view('welcome',compact('leaserposts','categories','townships','users'));
    }

    public function show($id){
        
        $leaserposts=Leaserpost::inRandomOrder()
                      ->limit(4)
                      ->get();


        $leaserpost = Leaserpost::findOrFail($id);
        return view('details',compact('leaserpost','leaserposts'));
    }

    public function call($id){
        
        $leaserpost = Leaserpost::findOrFail($id);
        return view('call',compact('leaserpost'));
    }


    public function search(Request $request){

        $str1=$request->category;
        $str2=$request->roomtype;
        $str3=$request->township;
        $str4=$request->price;

        $users = User::all();
        $categories = Category::all();
        $townships = Township::all();
        $leaserposts = Leaserpost::where('category','=', $str1 )
                    ->orWhere('roomtype','=',$str2)
                    ->orWhere('township','=',$str3)
                    ->orWhere('price','=',$str4)
                     ->paginate(8);
        /*
                     ->orWhere('roomtype','=', $str2 )
                     ->orWhere('price', 'LIKE', '%' . $str4 . '%')
                     ->orWhere('township', 'LIKE', '%' . $str3 . '%')
                     ->paginate(8);*/

      
        //dd(count($leaserposts));

        //$leaserposts->appends(['leaserposts' => $str]);

        return view('welcome',compact('leaserposts','categories','townships','users'));

    }

    public function post(){
        if(Auth::check()){
            $email=Auth::user()->email;
        
            $leaserposts = Leaserpost::where('leaseremail','=',$email)->get();
            return view('viewleaserpost',compact('leaserposts'));

        }
        else{
            return redirect()->route('login');
        }
        
        
    }
}
