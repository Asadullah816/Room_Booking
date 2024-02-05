@include('adminlayout.master')

<div class="container mt-5 pt-5">
    <form action="{{ route('booking') }}" method="POST">
        @csrf
        <div class="row mb-4">
            <div class="col-3 mt-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" id="form3Example1" name="name" class="form-control" />
                    <label class="form-label" for="form3Example1">Name</label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="email" id="form3Example1" name="email" class="form-control" />
                    <label class="form-label" for="form3Example1">Email</label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" id="form3Example1" name="phone" class="form-control" />
                    <label class="form-label" for="form3Example1">Phone No</label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="date" id="form3Example1" name="checkin" class="form-control" />
                    <label class="form-label" for="form3Example1">CheckIn Date</label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="date" id="form3Example2" name="checkout" class="form-control" />
                    <label class="form-label" for="form3Example2">CheckOut Date</label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" id="form3Example1" name="adults" class="form-control" />
                    <label class="form-label" for="form3Example1">Number of Adults</label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" id="form3Example2" name="childrens" class="form-control" />
                    <label class="form-label" for="form3Example2">Childrens</label>
                </div>
            </div>
            <div class="col-3 mt-4">
                <label class="visually-hidden" for="inlineFormSelectPref">Rooms</label>
                <select name="room_id" data-mdb-select-init class="select">
                    @forelse ($room as $room)
                        <option value="{{ $room->id }}">Room Number : {{ $room->room_no }}</option>
                    @empty
                    @endforelse
                </select>
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
</div>

@include('adminlayout.script')
