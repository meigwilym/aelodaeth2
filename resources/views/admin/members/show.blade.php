@extends('layout.admin')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-12">

      <div class="page-header">
        <h1>{!! $member->fullName !!}</h1>
      </div>
      
      <ul class="nav nav-tabs">
        <li class="active"><a href="#member" data-toggle="tab">Member Details</a></li>
        <li><a href="#subscriptions" data-toggle="tab">Subscriptions</a></li>
      </ul>
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="member">
        {!! BootForm::open(['model' => $member, 'update' => 'admin.members.update', 'store' => 'admin.members.store']) !!}

        @include('admin.members.form')
        </div>
        <div class="tab-pane fade in" id="subscriptions">


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Level</th>
                        <th>Until</th>
                        <th>Amount</th>
                        <th>Paid On</th>
                        <th>Method</th>
                        <th>By</th>
                        <th>Notes</th>
                        <th>Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($member->subscriptionHistory as $sub)
                    <tr @if($sub->isActive())  class="success" @endif >
                        <td>{!! $sub->membership->name !!}</td>
                        <td>{!! $sub->ends_on->format('F j, Y') !!}</td>
                        <td>&pound;{!! $sub->cost !!}</td>
                        <td>{!! $sub->created_at->format('F j, Y') !!}</td>
                        <td></td>
                        <td>@todo</td>
                        <td>{!! $sub->notes !!}</td>
                        <td>{!! $sub->updated_at->diffForHumans() !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
      </div>
      
    </div>
  </div>
</div>

@endsection