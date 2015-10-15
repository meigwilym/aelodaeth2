
<div class="row">
  <div class="col-sm-6">

    <div class="row">
      <div class="col-sm-6">{!! Bootform::text('first_name', 'First Name') !!}</div>
      <div class="col-sm-6">{!! Bootform::text('last_name', 'Last Name') !!}</div>
    </div>

    {!! Bootform::email() !!}

    {!! Bootform::text('rhif_ffon', 'Phone Number') !!}

    {!! Bootform::textarea('notes', 'Member Notes') !!}
    
  </div>
  <div class="col-sm-6">

    {!! Bootform::text('billing_address1', '1st Line of Address') !!}
    {!! Bootform::text('billing_address2', '2nd Line of Address') !!}
    {!! Bootform::text('billing_address3', '3rd Line of Address') !!}
    
    <div class="row">
      <div class="col-sm-6">{!! Bootform::text('billing_town', 'Town') !!}</div>
      <div class="col-sm-6">{!! Bootform::text('billing_postcode', 'Post Code') !!}</div>
    </div>
    
  </div>
</div>

{!! BootForm::submit('Save') !!}

{!! BootForm::close() !!}