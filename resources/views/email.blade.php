@include('adminlayout.master')
<div class="container">
    <h2>{{ $maildata['title'] }}</h2>
    <p>{{ $maildata['body'] }}</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque velit ab est libero odio quisquam ratione
        enim quasi ipsa! Quibusdam velit laborum, soluta minima nobis magni asperiores ducimus blanditiis facere.</p>
    <h5>Thank You</h5>
</div>
@include('adminlayout.script')
