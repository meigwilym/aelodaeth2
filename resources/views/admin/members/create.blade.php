@extends('layout.admin')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-12">

      <h1>New Member</h1>

      {!! BootForm::open(['model' => null, 'store' => 'admin.members.store', 'update' => 'admin.members.update'] ) !!}

      @include('admin.members.form')

    </div>
  </div>
</div>

@endsection