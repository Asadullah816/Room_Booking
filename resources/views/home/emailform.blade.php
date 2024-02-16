@include('adminlayout.master')

<div class="container">
    <form action="{{ route('sendemail') }}" method="POST">
        @csrf
        <div class="col-3 mt-4">
            <div data-mdb-input-init class="form-outline">
                <input type="text" name="title" class="form-control" />
                <label class="form-label" for="form3Example1">Title</label>
            </div>
        </div>
        <div class="col-3 mt-4">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="form3Example1" name="body" class="form-control" />
                <label class="form-label" for="form3Example1">Body</label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Send Email</button>
    </form>
</div>
@include('adminlayout.script')
