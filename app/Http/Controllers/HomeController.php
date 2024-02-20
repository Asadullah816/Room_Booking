<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ReservationMail;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\booking;
use App\Models\Check;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function showCheck()
    {
        return view('home.checkin');
    }
    public function checkroom(Request $req)
    {
        $check = Check::find(1);
        $req->validate([
            'checkin' => 'required',
            'checkout' => 'required'
        ]);
        $checkin = $req->checkin;
        $checkout = $req->checkout;
        $rooms = DB::table('rooms')
            ->whereNotIn('id', function ($query) use ($checkin, $checkout) {
                $query->select('room_id')
                    ->from('bookings')
                    ->where(function ($query) use ($checkin, $checkout) {
                        $query->whereBetween('checkin', [$checkin, $checkout])
                            ->orWhereBetween('checkout', [$checkin, $checkout]);
                    });
            })->get();
        $check->checkin = $checkin;
        $check->checkout = $checkout;
        $check->save();
        // dd($rooms);
        return response()->json($rooms);
    }
    public function booking_form(Request $req)
    {
        $room = Room::find($req->id);
        $check = Check::find(1);

        return view('home.bookingform', compact('room', 'check'));
    }
    public function viewroom($id)
    {
        $room = Room::find($id);
        return view('admin.room', compact('room'));
    }
    public function booking(Request $req)
    {
        $checkin = $req->checkin;
        $checkout = $req->checkout;
        $checked = DB::table('rooms')->whereNotIn('id', function ($query) use ($checkin, $checkout) {
            $query->select('room_id')
                ->from('bookings')
                ->where(function ($query) use ($checkin, $checkout) {
                    $query->whereBetween('checkin', [$checkin, $checkout])
                        ->orWhereBetween('checkout', [$checkin, $checkout]);
                });
        })->where('id', $req->room_id)
            ->exists();

        if ($checkin <= Carbon::yesterday() || $checkout <= Carbon::yesterday()) {
            return back()->with('dateError', 'Please Enter the Correct date You cannot book the Room in Past!!!');
        } else {
            if ($checked) {
                $req->validate([
                    'name' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'checkin' => 'required',
                    'checkout' => 'required',
                    'adults' => 'required',
                    'childrens' => 'required',
                    'room_id' => 'required',
                ]);
                $booking = new Booking;
                $booking->name = $req->name;
                $booking->email = $req->email;
                $booking->phone = $req->phone;
                $booking->checkin = $checkin;
                $booking->checkout = $checkout;
                $booking->adults = $req->adults;
                $booking->childrens = $req->childrens;
                $booking->room_id = $req->room_id;
                $booking->save();
                return back()->with('success', 'The Room has booked success fully!');
            } else {
                return back()->with('error', 'The Room is Already booked on this date');
            }
        }
    }
    public function mailsend(Request $req)
    {
        $maildata = [
            'title' => $req->title,
            'body' => $req->body,
        ];
        Mail::to('johnbhai608@gmail.com')->send(new ReservationMail($maildata));
        dd('The Email has been send successfully !!!');
    }
    public function cancelRoom(Request $req)
    {
        $email =  $req->email;
        $booking = Booking::where('email', $email)->get();

        // dd($booking);
        return view('home.cancelRoom', compact('booking'));
    }
    public function deleteBooking($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect('/');
    }
}
