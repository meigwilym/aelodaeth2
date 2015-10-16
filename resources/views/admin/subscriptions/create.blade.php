@extends('layout.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">

        <div class="page-header">
            <h1>New Subscription</h1>
            <p class="lead">{!! $member->full_name !!}</p>
        </div>

        <p>Is @if(!$member->subscription || !$member->subscription->isActive()) <strong>not</strong> @endif a current member. New membership will start on
            <span class="label label-primary">
                @if(!$member->subscription || !$member->subscription->isActive())
                  {!! App\Season::starts()->format('F j, Y') !!}.
                @else
                  {!! $member->subscription->ends_on->addDay()->format('F j, Y') !!}.
                @endif
            </span>
        </p>

          <div class="row">
            <div class="col-sm-6">
                {!! Form::open(['route' => ['admin.subscriptions.store', $member->id]]) !!}

                    {!! Form::label('membership_id', 'Membership Level') !!}
                    @foreach($memberships as $membership)
                        <?php $finishStr = '&pound;'.$membership->cost.' &ndash; '.$membership->name; ?>
                        {!! BootForm::radio('membership_id', $finishStr, $membership->id) !!}
                    @endforeach

                    {!! BootForm::select('payment_method_id', 'Payment Method', $paymentMethods->lists('name', 'id')) !!}

                    {!! BootForm::textarea('notes') !!}

                    {!! BootForm::submit('Save') !!}


                {!! BootForm::close() !!}
            </div>
        </div>

    </div>
  </div>
</div>

@endsection