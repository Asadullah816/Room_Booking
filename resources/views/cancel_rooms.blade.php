@include('adminlayout.master')


<form action="{{ route('Roomcencel') }}" method="POST">
    @csrf
    <h1>Please Enter your Email to Cencel the ROOM</h1>
    <div class="d-flex justify-content-center align-items-center">
        <label for="">Email :</label>
        <input type="email" name="email">
        <button class="mt-5 btn btn-success" type="submit">Submit</button>
    </div>
</form>

@include('adminlayout.script')
