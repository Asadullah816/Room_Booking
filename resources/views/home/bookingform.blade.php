@include('adminlayout.master')

<div class="container mt-5 pt-5">
    @if (session()->has('error'))
        <h1 class="text-danger">{{ session('error') }}</h1>
    @endif
    @if (session()->has('success'))
        <h1 class="text-success">{{ session('success') }}</h1>
    @endif
    <h1>Booking form for Room number {{ $room->room_no }}</h1>
    <form action="{{ route('booking') }}" method="POST">
        @csrf
        <div class="row mb-4">
            <div class="col-3 mt-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" name="name" class="form-control" />
                    <label class="form-label" for="form3Example1">Name</label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="email" name="email" class="form-control" />
                    <label class="form-label" for="form3Example1">Email</label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="date" id="form3Example1" value="{{ $check->checkin }}" name="checkin"
                        class="form-control text-success" />
                    <label class="form-label" for="form3Example1">CheckIn Date</label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="date" name="checkout" value="{{ $check->checkout }}"
                        class="form-control text-danger" />
                    <label class="form-label" for="form3Example2">CheckOut Date</label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" name="phone" class="form-control" />
                    <label class="form-label" for="form3Example1">Phone No</label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="number" name="adults" min="1" max="5" class="form-control" />
                    <label class="form-label" for="form3Example1">Number of Adults</label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="number" name="childrens" min="0" max="5" class="form-control" />
                    <label class="form-label" for="form3Example2">Childrens</label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="hidden" name="room_id" value="{{ $room->id }}" class="form-control" />
                    {{-- <label cl  ass="form-label" for="form3Example2">Room Number {{ $room->room_no }}</label> --}}
                </div>
            </div>

        </div>

        {{-- <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control" />
            <label class="form-label" for="form3Example3"></label>
        </div>


        <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" id="form3Example4" class="form-control" />
            <label class="form-label" for="form3Example4"></label>
        </div>
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control" />
            <label class="form-label" for="form3Example3"></label>
        </div>


        <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" id="form3Example4" class="form-control" />
            <label class="form-label" for="form3Example4"></label>
        </div> --}}
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Book Room</button>
    </form>

    <div class="container">
        <h3>If the date is not valid Check Again the Available Room !</h3>
        <a class="btn btn-success" href="{{ route('checkRoom') }}">Check Room</a>
    </div>
</div>

@include('adminlayout.script')
