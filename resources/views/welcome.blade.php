@include('adminlayout.master')

<div class="container mt-5 pt-5">
    <div class="btn-list">
        <a class="btn btn-success mt-4" href="{{ route('addroom') }}"> AddRoom</a>
        <a class="btn btn-success mt-4" href="{{ route('roomtable') }}">Room Tables</a>
        <a class="btn btn-success mt-4" href="{{ route('booking_form') }}">Booking form</a>
    </div>
</div>
@include('adminlayout.script')
