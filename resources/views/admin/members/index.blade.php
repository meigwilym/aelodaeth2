@extends('layout.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
          <h1>Members</h1>

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Town</th>
                    <th>PostCode</th>
                    <th>Phone</th>
                    <th>Current</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($members as $member)
                    <tr data-id="{!! $member->id !!}">
                      <td>{!! link_to_route('admin.members.show', $member->fullName, $member->id) !!}</td>
                      <td>{!! $member->email !!}</td>
                      <td>{!! $member->address !!}</td>
                      <td>{!! $member->billing_town !!}</td>
                      <td>{!! $member->billing_postcode !!}</td>
                      <td>{!! $member->rhif_ffon !!}</td>
                        <td>
                          @if($member->isActive())
                                yes
                          @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection