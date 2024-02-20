@include('adminlayout.master')

<div class="container mt-5 pt-5">
    <div class="btn-list">
        <a class="btn btn-success mt-4" href="{{ route('addroom') }}"> AddRoom</a>
        <a class="btn btn-success mt-4" href="{{ route('roomtable') }}">Room Tables</a>
        <a class="btn btn-success mt-4" href="{{ route('checkRoom') }}">Check Available Rooms</a>
        <a class="btn btn-primary mt-4" href="{{ route('cancel_room') }}">Cencel Room</a>
        @guest
            <a class="btn btn-success mt-4" href="{{ route('login') }}">Login</a>
        @else
            <a class="btn btn-danger mt-4" href="{{ route('logout') }}">Logout</a>
        @endguest

    </div>
</div>
@include('adminlayout.script')
