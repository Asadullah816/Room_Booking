<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class AdminController extends Controller
{
    public function addroom(Request $req){
        $room = new Room;
        $room->name = $req->name;
        $room->profile_image = $req->file('profile_image')->store('images','public');
        $room->features =json_encode($req->features);
        $roomImages = [];
       if($req->images){
         foreach($req->file('images') as $image)
         {
            $imagepath = $image->store('image','public');
            $roomImages[] = $imagepath;
         }
       }
        $room->images = implode(',',$roomImages);
        $room->price = $req->price;
        $room->save();
        return back();
    }
    public function roomtable(){
        $room = Room::all();
        return view('admin.roomtable',compact('room'));
    }
    public function viewroom($id){
        $room = Room::find($id);
        return view('admin.room',compact('room'));
    }
}