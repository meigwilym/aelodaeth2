@extends('layout/admin')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-3 col-sm-offset-3">
      <h1>Log In...</h1>
      <p>...with your email address and password.</p>
      {!! Form::open(['url' => 'login']) !!}

      {!! BootForm::email('email', 'Email Address') !!}

      {!! BootForm::password() !!}

      {!! BootForm::checkbox('remember', 'Remember Me?', true) !!}

      {!! BootForm::submit('Log In') !!}

      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection