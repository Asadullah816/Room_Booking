<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\booking;
use DB;

class HomeController extends Controller
{
    public function checkroom(Request $req)
    {
        $req->validate([
            'checkin'=>'required',
            'checkout'=>'required'
        ]);
        $checkin = $req->checkin;
        $checkout = $req->checkout;
        $rooms = DB::table('rooms')
        ->whereNotIn('id', function ($query) use ($checkin, $checkout) {
        $query->select('room_id')
            ->from('bookings')
            ->where(function ($query) use ($checkin, $checkout) {
                $query->whereBetween('checkin', [$checkin,$checkout])
                    ->orWhereBetween('checkin', [$checkout,$checkin]);
            });
        })->get();
        // dd($rooms);
        return response()->json($rooms);
    }
    public function booking_form(){
        $room = Room::all();
        return view('home.bookingform',compact('room'));
    }
    public function booking(Request $req)
    {
        $booking = new Booking;
        $booking->name = $req->name;
        $booking->email = $req->email;
        $booking->phone= $req->phone;
        $booking->checkin = $req->checkin;
        $booking->checkout = $req->checkout;
        $booking->adults = $req->adults;
        $booking->childrens = $req->childrens;
        $booking->room_id = $req->room_id;
        $booking->save();
        return back();
    }
}
