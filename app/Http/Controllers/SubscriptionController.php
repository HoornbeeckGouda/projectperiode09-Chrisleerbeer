<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $id)
    {
        $user = auth()->user();
        if($user === NULL) {
            return redirect()->route('home')->with('no_account', 'You need an account for this.');
        }
        else {
            if ($user->rol === 'lezer')
            {
                if ($user->userSubscription()->exists())
                {
                    return redirect()->route('home')->with('error', 'You already have an active subscription.');
                }
                else
                {
                    Subscription::create([
                        'subscription_plan_id'=> $id,
                        'user_id'=> $user->id,
                        'start_date'=> now(),
                        'end_date'=> now()->addMonths(12)
                    ]);
                    return redirect()->route('home')->with('success', 'Subscription added successfully.');
                }
            }
            else 
            {
                return redirect()->route('home')->with('error', 'Sorry your account is not allowed to have subscriptions.');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
