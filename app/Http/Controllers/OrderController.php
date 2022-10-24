<?php

namespace App\Http\Controllers;

use App\Order;
use App\Cart;
use Auth;
use App\OrderProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
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
        //Setting the due data basing on current date, here we adding 7 days to the current date as the due data
         $date = Carbon::now();
         $dateInFuture = $date->addDays(7);
         //due data end

        $orderr = (Order::max('id'))+1;
        
        $order=Order::create([
        'order_number' => 'EKM-ORD-'.$orderr,
         'payment_method'=> request('payment_method'),
         'payment_status'=> 'Paid',
         'order_status' => 'Pending',
        'due_date' => $dateInFuture,
        'customer_id' =>  request('customer_id'),
        'totalprice'=> request('total_price')
        ]);
               

        $products = Cart::where('customer_id','=',Auth::user()->id)->get();


    
    $orderProducts = [];
    foreach ($products as $product) {
        $orderProducts[] = [
            'order_id' => $order->id,
            'product_id' => $product->product_id
            
        ];
    }
    OrderProduct::insert($orderProducts);


       return redirect('cart')->with('success','Order placed successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
