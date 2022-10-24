<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\payments;
use Auth;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $user_product = Cart::where('customer_id','=',Auth::user()->id)->join('products','products.id', '=', 'carts.product_id')->get();
        $payment_status = payments::where('customer_id','=',Auth::user()->id)->first();
        return view('ekomers.cart',['user_products'=>$user_product,'payment_status'=>$payment_status]);
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
        $cart = new Cart();


        $productNo = Cart::where('customer_id',request('customer_id'))->get();


        $cart->customer_id =request('customer_id');
        $cart->product_id = request('product_id');
        $cart->quantity  = request('quantity');
        $cart->totalprice = request('totalprice');


        $cart->save();

        return back()->with(['productsNo'=>$productNo])->with('success','successfully added to the cart');
      
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function updatee(Request $request)
    {
        $id = request('prod_id');
        $cart= Cart::findOrFail($id);
        $cart->customer_id =request('customer_id');
        $cart->product_id = request('product_id');
        $cart->quantity  = request('quantity');
        $cart->totalprice = request('quantity')*request('unitprice');

        $cart->update();
        return redirect('cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idd)
    {
        $product = Cart::findOrFail($idd);
        $product->delete();
        return redirect('cart');
        //
    }
}
