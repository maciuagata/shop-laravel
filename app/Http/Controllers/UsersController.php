<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

use Auth;
use Session;

class UsersController extends Controller
{
    public function getSignup()
    {
        return view ('users.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required',
            'email'=> 'email|required|unique:users',
            'password'=> 'required|min:4'
        ]);

        $user = new User([
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'password'=> bcrypt($request->input('password'))
        ]);
        $user->save();

        Auth::login($user);

        if (Session::has('oldUrl')) {
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }

        return redirect()->route('users.profile');
    }

    public function getSignin() {
        return view('users.signin');
    }

    public function postSignin(Request $request) {
        $this->validate($request, [
            'email'=> 'email|required',
            'password'=> 'required|min:4'
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            if (Session::has('oldUrl')) {
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->route('users.profile');
        }
        return redirect()->back();
    }

    public function getProfile() {
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('users.profile', ['orders' => $orders]);
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('users.signin');
    }
}