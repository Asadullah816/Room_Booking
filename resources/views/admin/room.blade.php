    @include('adminlayout.master')

    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-6">
                <img class="w-100" src="{{ asset('storage/' . $room->profile_image) }}" alt="">
            </div>
            <div class="col-6">
                <h2>Name : {{ $room->name }}</h2>
                <h4>Price : {{ $room->price() }}</h4>
                <ul class="list-group list-group-light">
                    <h2>Features</h2>
                    @forelse (json_decode($room->features) as $feature)
                        <li class="list-group list-group-light ">
                            {{ $feature }}
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="row mt-4    ">
            <h2>Room Images</h2>
            @forelse (explode(',', $room->images) as $image)
                <div class="col-4 mt-3">
                    <img class="w-100 h-100" src="{{ asset('storage/' . $image) }}" alt="">
                </div>
            @empty
            @endforelse
        </div>
    </div>
    @include('adminlayout.script')
