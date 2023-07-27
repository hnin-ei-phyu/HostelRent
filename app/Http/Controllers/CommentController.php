<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){

        
            $request->validate([
                'body'=>'required',
            ]);
    
            $input = $request->all();
            $input['user_id'] = auth()->user()->id;
        
            Comment::create($input);
    
            return back();
        }
        else{

            return redirect()->route('login');

        }

    }
}
