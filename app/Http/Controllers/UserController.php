<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login()
    {
        return view('users.login');
    }
    public function home()
    {
        $userId = Session::get('user_id');

        $user = User::find($userId);
        $products = Product::all();
        $topseller = Product::where('type', 'top seller')->get();
        $featured = Product::where('type', 'featured')->get();

        return view('users.home', ['user' => $user], compact('topseller', 'featured', 'products'));
    }
    public function register()
    {
        return view('users.register');
    }
    public function loginCheck(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if (!empty($user)) {

            if (Hash::check($password, $user->password)) {

                Session::put('user_id', $user->id);

                if ($user->user_type == 'admin') {

                    return redirect()->route('admin.dash');
                } else {
                    return redirect()->route('user.home');
                }
            } else {
                return view('users.login', [
                    'msg' => 'Invalid username and password.',
                ]);
            }
        } else {
            return view('users.login', [
                'msg' => 'User does not exist.',
            ]);
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect()->route('user.login');
    }
    public function UserStore(Request $request)
    {

        $validate = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'repeat_password' => 'same:password',
            'gender' => 'required',
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
            'dob' => 'required',
        ]);

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->dob = $request->input('dob');
        $user->address = $request->input('address');
        $user->save();


        return view('users.login');
    }
    public function AdminDash()
    {
        $products = Product::all();
        $userId = Session::get('user_id');

        $user = User::find($userId);
        return view('Admin.Admin_dashboard', compact('products'), ['user' => $user]);
    }
    public function UserProduct($id)
    {
        $user = User::find($id);
        $user_favourites = $user->products;
        return view('users.fav', ['user' => $user], compact('user_favourites'));
    }
    public function dash()

    {
        $products = Product::all();
        $topseller = Product::where('type', 'top seller')->get();
        $featured = Product::where('type', 'featured')->get();

        return view('welcome', compact('topseller', 'featured', 'products'));
    }
}