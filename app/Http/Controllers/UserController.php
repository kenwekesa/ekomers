<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       return view('layout.login');  
    }

    public function checklogin(Request $request)
    {
        

        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required'
           ]);
      
           $user_data = array(
            'email'  => $request['email'],
            'password' => $request['password']
           );
      
           if(Auth::attempt($user_data))
           {
                return redirect('main/successlogin');
           }
           else
           {

              return back()->with('error', 'Wrong Login Details');
           }
    
    }
    function successlogin()
    {        
        $product = Product::get();
        $productNo =Cart::where('customer_id',Auth::user()->id)->get();
            if(Auth::User()->flag == "Super admin")
            {
                return view('dashboard.admin_super');
            }
            else if(Auth::User()->flag == "Admin")
            {
                return view('dashboard.admin');
            }
            else
            {
                return view('dashboard.main',['product'=>$product],['productsNo'=>$productNo]);
            }
     
    }
//LOGOUT THE ADMIN
    function logout()
    {
     Auth::logout();
     return redirect('main');
    }

    //LOGOUT CUSTOMER FUNCTION
    function logoutcustomer()
    {
     Auth::logout();
     return redirect('home');
    }
    /**
     * Show the form for user signup.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layout.signsuper');
    }

    //show the form for user Login
    
    public function loginadmin()
    {
        //
        return view('layout.loginadmin');
    }

    public function signup()
    {

        return view('layout.signup');
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
        $user = new User();

        $file = $request->file('photo');
        
        $user->name = request('name');
        $user->flag = request('flag');
        $user->email = request('email');
        $user->city = request('city');
        $user->phone = request('phone');
        $user->profile = request('profile');
        $user->password = Hash::make(request('password'));

        $user->save();

        return redirect('loginadmin')->with('success','Successfully signed up.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('photo'))
        {   
            $image = $request->file('photo');
            $destinationPath = public_path('/images');
            $imagename = $image->getClientOriginalName();
            $image->move($destinationPath, $imagename);
            $user =User::findOrFail($id);

            $user->profile = 'images/'.$imagename;
            $user->name =$request->get('name');
    
    

            $user->update();

            return redirect()->back();
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
