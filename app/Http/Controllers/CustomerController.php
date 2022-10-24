<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
class CustomerController extends Controller
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

        return view('customers.add');
        //
    }

    public function signupcustomer()
    {

        return view('layout.signup');
        //
    }

    public function logincustomer()
    {
        //
        return view('layout.login');
    }

    public function logintobuy()
    {

        return redirect()->back()->with('error', 'Login to proceed');
        
    }



    public function checklogin(Request $request)
    {
       

        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required'
           ]);
           
           $customer_data = $request->only('email','password');
      
           if(Auth::attempt($customer_data))
           {
            return redirect('main/successlogin');
           }
           else
           {
            dd(request()->all()); 
           }
    
    }


    function successlogin()
    {       if(Auth::User()->flag == "Super admin")
        {
            return view('dashboard.admin_super');
        }
        else if(Auth::User()->flag == "Admin")
        {
            return view('dashboard.admin');
        }
        else
        {
            return view('dashboard.main');
        }

        
        $product = Product::get();

        
        return view('dashboard.main' ,['product'=>$product]);
     
     
    }



    function logout()
    {
     Auth::logout();
     return redirect('main');
    }
    /**
     * Show the form for user signup.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function store(Request $request)
    {
        $customer = new Customer();
        
        $customer->name = request('name');
        $customer->city = request('city');
        $customer->email = request('email');
        $customer->phone = request('phone');
        $customer->password = Hash::make(request('password'));

        $customer->save();

        return redirect('home')->with('success','Successfully signed up.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.editcustomer');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
