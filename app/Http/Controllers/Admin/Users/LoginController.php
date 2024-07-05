<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function index(){
        return view('admin.users.login',[
            'title'=>"Login to System"
        ]);
    }
    public function store(Request $request){
        //dd($request->input());
        $this->validate($request,[
            'email'=>'required|email:filter',
            'password'=>'required'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember')?true:false;
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            // Authentication was successful...
            return redirect()->route('admin');
        }
        //$request->session()->flash('error', "Tên Đăng nhập không đúng");
        Session::flash('error', "Tên Đăng Nhập không chính xác");
        return redirect()->back();
    }
}
