<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usertype;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        
        $users=User::paginate(8);
        return view('users.index',compact('users'));
    }

    public function edit($id)
    { 
        $usertypes = Usertype::all();
        $users = User::findOrFail($id);
        return view('users.edit',compact('users','usertypes'));
    }

    public function update(Request $request,$id){

        if(Auth::user()->user_type=="user"){

            if($request->password !=""){
                $user = User::findOrFail($id);
                $user->password=$request->password_confirmation;

                $user->save();
                return back();
            }

            if($request->user_type !=""){

                $user = User::findOrFail($id);
                $usertype = $request->user_type;
                $user->user_type=$usertype;
            
                $user->save();
                return redirect()->route('users.index');
            }
            
            elseif($request->file('user_photo')!=""){
                $photo_name="";
                if($request->file('user_photo')){
                    $photo_name=$request->file('user_photo')->getClientOriginalName();
                    $request->file('user_photo')->move(public_path('images',$photo_name));
                }
                $user=User::findOrFail($id);
                $user->photo=$photo_name;
                $user->save();
                return back();
            }
            else{
                $user=User::findOrFail($id);
                $user->name=$request->newname;
                $user->full_name=$request->newfull_name;
                $user->phone=$request->newphone;
                $user->birthday=$request->newbirthday;
                $user->country=$request->newcountry;
                $user->state=$request->newstate;
                $user->address=$request->newaddress;
                $user->career=$request->newcareer;
                $user->save();

                return back();
            }

        } elseif(Auth::user()->user_type=="leaser"){

            if($request->password !=""){
                $user = User::findOrFail($id);
                $user->password=$request->password_confirmation;
    
                $user->save();
                return redirect()->route('leaser-home');
            }

            if($request->user_type !=""){

                $user = User::findOrFail($id);
                $usertype = $request->user_type;
                $user->user_type=$usertype;
            
                $user->save();
                return redirect()->route('users.index');
            }
            
            elseif($request->file('user_photo')!=""){
                $photo_name="";
                if($request->file('user_photo')){
                    $photo_name=$request->file('user_photo')->getClientOriginalName();
                    $request->file('user_photo')->move(public_path('images',$photo_name));
                }
                $user=User::findOrFail($id);
                $user->photo=$photo_name;
                $user->save();
                return redirect()->route('leaser-home');
            }
            else{
                $user=User::findOrFail($id);
                $user->name=$request->newname;
                $user->full_name=$request->newfull_name;
                $user->phone=$request->newphone;
                $user->birthday=$request->newbirthday;
                $user->country=$request->newcountry;
                $user->state=$request->newstate;
                $user->address=$request->newaddress;
                $user->career=$request->newcareer;

                $user->save();
                return redirect()->route('leaser-home');
            }
    
    
        }

    }

    public function search(Request $request){

        $str=$request->search;

        $users = User::where('name', 'LIKE', '%' . $str . '%')
                     ->orWhere('full_name', 'LIKE', '%' . $str . '%')
                     ->paginate(8);
        $users->appends(['users' => $str]);

        return view('users.index',compact('users'));

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
