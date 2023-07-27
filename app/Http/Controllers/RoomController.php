<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Category;
use App\Models\Township;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::paginate(6);
        return view('rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $townships = Township::all();
        return view('rooms.create',compact('categories','townships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo_one="";
        $photo_two="";
        $photo_three="";
        $photo_four="";

        if($request->file('one')){
            $photo_one=$request->file('one')->getClientOriginalName();
            $request->file('one')->move(public_path('images'),$photo_one);
        }
        else{
            $photo_one="none";
        }

        if($request->file('two')){
            $photo_two=$request->file('two')->getClientOriginalName();
            $request->file('two')->move(public_path('images'),$photo_two);
        }
        else{
            $photo_two="none";
        }

        
        if($request->file('three')){
            $photo_three=$request->file('three')->getClientOriginalName();
            $request->file('three')->move(public_path('images'),$photo_three);
        }
        else{
            $photo_three="none";
        }

        if($request->file('four')){
            $photo_four=$request->file('four')->getClientOriginalName();
            $request->file('four')->move(public_path('images'),$photo_four);
        }
        else{
            $photo_four="none";
        }

        $room_id = "#".rand(10000,99999);
        $post_date = "".date('d-m-y');

        Room::create([
            'room_id'=>$room_id,
            'post_date'=>$post_date,
            'category'=>$request->category,
            'roomtype'=>$request->roomtype,
            'room_area'=>$request->room_area,
            'township'=>$request->township,
            'address'=>$request->address,
            'price'=>$request->price,
            'facilities'=>$request->facilities,
            'description'=>$request->description,
            'phone'=>$request->phone,
            'photo1'=>$photo_one,
            'photo2'=>$photo_two,
            'photo3'=>$photo_three,
            'photo4'=>$photo_four,

        ]);
        return redirect()->route('rooms.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.detail',compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.edit',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $photo_first="";
        if($request->file('newphoto1')){
            $photo_first=$request->file('newphoto1')->getClientOriginalName();
            $request->file('newphoto1')->move(public_path('images'),$photo_first);
        }
        else{
            $photo_first=$request->currphoto1;
        }
        $photo_second="";
        if($request->file('newphoto2')){
            $photo_second=$request->file('newphoto2')->getClientOriginalName();
            $request->file('newphoto2')->move(public_path('images'),$photo_second);
        }
        else{
            $photo_second=$request->currphoto2;
        }
        $photo_third="";
        if($request->file('newphoto3')){
            $photo_third=$request->file('newphoto3')->getClientOriginalName();
            $request->file('newphoto3')->move(public_path('images'),$photo_third);
        }
        else{
            $photo_third=$request->currphoto3;
        }
        $photo_fourth="";
        if($request->file('newphoto4')){
            $photo_fourth=$request->file('newphoto4')->getClientOriginalName();
            $request->file('newphoto4')->move(public_path('images'),$photo_fourth);
        }
        else{
            $photo_fourth=$request->currphoto4;
        }
        $room = Room::findOrFail($id);
        $room->roomtype=$request->roomtype;
        $room->room_area=$request->room_area;
        $room->address=$request->address;
        $room->price=$request->price;
        $room->facilities=$request->facilities;
        $room->description=$request->description;
        $room->phone=$request->phone;
        $room->photo1=$photo_first;
        $room->photo2=$photo_second;
        $room->photo3=$photo_third;
        $room->photo4=$photo_fourth;
        $room->save();

        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('rooms.index');
    }

    public function search(Request $request){

        $str=$request->search;

        $rooms = Room::where('category', 'LIKE', '%' . $str . '%')
                     ->orWhere('township', 'LIKE', '%' . $str . '%')
                     ->paginate(8);
        $rooms->appends(['rooms' => $str]);

        return view('rooms.index',compact('rooms'));

    }
}
