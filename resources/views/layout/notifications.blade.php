@if(Session::has('errors'))
<div class="container">
    <div class="alert alert-danger">
    @foreach($errors->all() as $error)
        {!! $error !!}
    @endforeach
    </div>
</div>
@endif

@if(Session::has('message'))
<div class="container">
    <div class="alert alert-info">
        {!! Session::get('message') !!}
    </div>
</div>
@endif

@if(Session::has('success'))
<div class="container">
    <div class="alert alert-success">
        {!! Session::get('success') !!}
    </div>
</div>
@endif