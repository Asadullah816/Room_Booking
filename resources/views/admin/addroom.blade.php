@include('adminlayout.master')

<div class="container mt-5 pt-5">
    <form action="{{ route('Addroom') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
            <div class="col">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" name="name" id="form3Example1" class="form-control" />
                    <label class="form-label" for="form3Example1">Room Name</label>
                </div>
            </div>
            <div class="col">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" id="form3Example2" name="price" class="form-control" />
                    <label class="form-label" for="form3Example2">Price</label>
                </div>
            </div>
            <div class="col">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" id="form3Example2" name="room_no" class="form-control" />
                    <label class="form-label" for="form3Example2">Room Number</label>
                </div>
            </div>
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="customFile">Profile Image</label>
            <input type="file" name="profile_image" class="form-control" id="customFile" />
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="customFile">Room Images</label>
            <input type="file" name="images[]" class="form-control" id="customFile" multiple />
        </div>

        <!-- Checkbox -->
        <div class="col d-flex justify-content-between mb-5 align-items-center ">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="features[]" value="WiFi"
                    id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">WiFi</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="features[]" value="break fast"
                    id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">Break Fast</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="features[]" value="AC"
                    id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">AC</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="features[]" value="Mattress"
                    id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">Mattress</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="features[]" value="3 Beds"
                    id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">3 Beds</label>
            </div>

        </div>
        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Add Room</button>
    </form>
</div>

@include('adminlayout.script')
