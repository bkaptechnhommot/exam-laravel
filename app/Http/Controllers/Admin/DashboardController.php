<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
    public function login(){
    	return view('admin.login');
    }

    public function post_login(Request $req){
    	$this->validate($req,
    		[
    			'email' => 'required|email',
    			'password' => 'required'
    		],
    		[
    			'required' => ':attribute không được rỗng',
    			'email' => ':attribute không đúng định dạng'
    		]);
    	if (Auth::attempt($req->only('email', 'password'), $req->has('remember'))) {
    		return view('admin.index');
    	} else {
    		return redirect()->back()->with('error', 'Đăng nhập thất bại vui lòng thử lại');
    	}
    }

    public function logout(){
    	Auth::logout();
    	return redirect()->route('login');
    }

    public function index(){
    	return view('admin.index');
    }
}
