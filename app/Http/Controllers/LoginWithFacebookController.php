<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class LoginWithFacebookController extends Controller
{
    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        try {
            

            $user = Socialite::driver('facebook')->user();
         
            $finduser = User::where('facebook_id', $user->id)->first();
        
            if($finduser){
         
                Auth::login($finduser);
        
                return redirect()->route('home');
         
            }else{
                $myuser = User::where('email','=', $user->email)->first();

                

                if($myuser['email']!=""){
 
 
                     //update google id only
                     $newUser =User::find($myuser['id']);
 
                     //dd($unewUser);
 
                     $newUser->facebook_id=$user->id;
                     $newUser->save();
 
                    
 
                }
                else{
 
                         //create new Account
 
                     $newUser = User::create([
 
                             'name' => $user->name,
                             'email' => $user->email,
                             'facebook_id'=> $user->id,
                             'user_type'=>"user",
                             'phone'=>"none",
                             'address'=>"none",
                             'photo'=>"none",
                             'password' => encrypt('123456dummy')
                             
                             ]);
 
                       }
 
                 Auth::login($newUser);
       
                 return redirect()->route('home');
            }
        
        } 
        catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
