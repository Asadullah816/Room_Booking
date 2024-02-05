@include('adminlayout.master')

<div class="container">
    <form id="formdata" action="{{ route('room_check') }}" method="POST">
        @csrf
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
            <div class="col">
                <div data-mdb-input-init class="form-outline">
                    <input type="date" name="checkin" id="checkin" class="form-control" />
                    <label class="form-label" for="form3Example1">CheckIn</label>
                </div>
            </div>
            <div class="col">
                <div data-mdb-input-init class="form-outline">
                    <input type="date" name="checkout" id="checkout" class="form-control" />
                    <label class="form-label" for="form3Example2">CheckOut</label>
                </div>
            </div>
        </div>
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4" id="submit">Check</button>

    </form>
</div>
<div class="container mt-5 pt-5">

    <select name="" id="ul-items">

    </select>
</div>


@include('adminlayout.script')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#submit').on('click', function(e) {
            let checkin = $('#checkin').val();
            let checkout = $('#checkout').val();
            e.preventDefault();
            $.ajax({
                url: "{{ route('room_check') }}",
                type: 'POST',
                data: {
                    checkin,
                    checkout,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#ul-items').empty();
                    let listItems = "";
                    $.each(response, function(index, room) {
                        $('#ul-items').append("<option>  Room Number :" + room
                            .room_no +
                            "</option>");
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            })
        })
    })
</script>
