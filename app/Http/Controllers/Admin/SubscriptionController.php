<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Subscription, App\Member, App\Membership, App\Payment, App\PaymentMethod;
use App\Http\Requests\SubscriptionRequest;

class SubscriptionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $member = Member::find($id);
        $memberships = Membership::all();
        $paymentMethods = PaymentMethod::all();
        
        return view('admin.subscriptions.create', compact('member', 'memberships', 'paymentMethods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriptionRequest $request, $id)
    {
        $member = Member::find($id);
        $subscription = new Subscription;
        
        $membership = Membership::find($request->get('membership_id'));
        
        $subscription->setMembership($membership);
        
        $member->subscribe($subscription);
        
        // payment method
        $method = PaymentMethod::find($request->input('payment_method_id'));
        $payment = (new Payment);
        $payment->payBy($method);
        
        $subscription->takePayment($payment);

        return redirect()->route('admin.members.show', $member->id)
            ->withSuccess('Subscription created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
