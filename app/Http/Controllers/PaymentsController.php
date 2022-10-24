<?php

namespace App\Http\Controllers;

use App\payments;
use Auth;
use Illuminate\Http\Request;

class PaymentsController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $pay_record = payments::where('customer_id','=',Auth::user()->id)->first();
        if($pay_record==null)
        {
        $pay = new payments();
        
        $paid = request('total_paid');
        $pay->amount_paid =request('total_paid');
        $pay->payment_method = request('method');
        $pay->customer_id = Auth::user()->id;
        $pay->balance = request('total_paid')- request('totalcost2');

        $pay->save();

        return redirect('cart')->with('success', 'Payment of Ksh. '.$paid.' successfully made');
       }
       else
       {
          $paid = request('total_paid');

          $pay_record->amount_paid = $pay_record->amount_paid + request('total_paid');
          $pay_record->payment_method = request('method');
          $pay_record->balance = ($pay_record->amount_paid + $paid)-request('totalcost2');

          $pay_record->save();

          return redirect('cart')->with('success', 'Payment of Ksh. '.$paid.' successfully made');

       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show(payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function edit(payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy(payments $payments)
    {
        //
    }
}
