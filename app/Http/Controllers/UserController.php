<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Cart;
use Session;
use Hash;
use Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            // return Hash::make(12345);
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {

                if(!empty($_COOKIE['package_id']))
                {
                        $count = Cart::where(['package_id'=>$_COOKIE['package_id'], 'user_id'=>auth()->user()->id])->count();
                        if($count > 0){
                            return redirect()->route('cart')->with('success_message', 'Login successfully');
                        }
                        $cart = new Cart();
                        $cart->package_id = $_COOKIE['package_id'];
                        $cart->user_id = auth()->user()->id;
                        // $cart->package_duration = $_COOKIE['package_duration'];
                        $cart->name = $_COOKIE['name'];
                        $cart->image = $_COOKIE['image'];
                        $cart->price = $_COOKIE['price'];
                        $cart->save();
                        if($cart->save()){
                            unset($_COOKIE['package_id']);
                            // unset($_COOKIE['package_duration']);
                            unset($_COOKIE['name']);
                            unset($_COOKIE['image']);
                            unset($_COOKIE['price']);
                        }
                        return redirect()->route('cart')->with('success_message', 'Login successfully');
                }

                $session = Str::random(50);
                Session::put('session', $session);
                return redirect('/');
            }else{
                Session::flash('error_message', 'Invalid Email or Password');
                return redirect()->back();
            }
        }else{
            return view('front.login');
        }
    }

    public function register(Request $request)
    {
        if($request->isMethod('post')){
            $data = request()->all();
            $newUser = new User();
            $newUser->name = $data['name'];
            //  $newUser->phone = $data['phone'];
            //  $newUser->address = $data['address'];
            $newUser->email = $data['email'];
           
            $newUser->password = Hash::make($data['password']);
            $newUser->save();
            Session::flash('success_message', 'Your account has created successfully!');
            return redirect('login');
            
        }
        else{
            return view('front.register');
        }
       
    }

    public function updateUserAccount(Request $request)
    {
        if($request->isMethod('post')){
            $data = request()->all();
              //Update User details
            User::where('email',auth()->user()->email)->update(['name'=>$data['name'],'phone'=>$data['phone'],'address'=>$data['address']]); 
            Session::flash('success_message','Account has been updated successfully!');
   
            return redirect()->back();
        }
       
        return view('front.userAccount');
    }

    public function updateUserPassword(Request $request)
    {
        if($request->isMethod('post')){
            $data = request()->all();
          //Update User Password 
          if(Hash::check($data['current_pwd'],auth()->user()->password)){
            //check if new and confirm password is matching
            if($data['new_pwd']==$data['confirm_pwd']){
               User::where('id',auth()->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
               Session::flash('success_message','Password has been updated successfully!');
            }else{
               Session::flash('error_message','New password and Confirm password is not matchng');
             }
            } else{
            Session::flash('error_message','Your current password is incorrect');
            }
            return redirect()->back();
          }
           return view('front.userAccount');
    }

    
    public function logout(){
        auth()->logout(); 
        Session::flash('success_message','Account has been Logout successfully');
        return redirect('/');
    }

}
