@include('adminlayout.master')
<div class="container">

    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($room as $room)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $room->profile_image) }}" alt=""
                                style="width: 45px; height: 45px" class="rounded-circle" />
                            <div class="ms-3">
                                <p class="fw-bold">{{ $room->name }}</p>

                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal"> {{ $room->price() }}</p>
                    </td>
                    <td>
                        <a href="{{ route('viewroom', $room->id) }}" class="btn btn-link btn-sm btn-rounded">
                            View
                        </a>
                        <button type="" class="btn btn-link btn-sm btn-rounded">
                            Edit
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@include('adminlayout.script')
