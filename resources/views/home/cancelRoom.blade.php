@include('adminlayout.master')

<div class="container">
    @forelse ($booking as $booking)
        <h1>Name : {{ $booking->name }}</h1>
        <h3>Email : {{ $booking->email }}</h3>
        <h3>Room : Id {{ $booking->room_id }}</h3>
        <button class="mt-5 btn btn-danger text-light"><a class="text-light"
                href="{{ route('deletebooking', $booking->id) }}">Room
                Cancel</a></button>
    @empty
        <h1 class="text-danger">No Bookings Yet!</h1>
    @endforelse
</div>
@include('adminlayout.script')
