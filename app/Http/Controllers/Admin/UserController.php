<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function read(){
    	$users = User::all();
    	return view('admin.user.index', compact('users'));
    }

    public function add(){
    	return view('admin.user.add');
    }

    public function create(Request $req){
    	$this->validate($req,
    		[
    			'name' => 'required',
    			'email' => 'required|email|unique:users,email',
    			'password' => 'required|min:6',
    			're_password' => 'required|same:password'
    		],
    		[
    			'required' => ':attribute không được rỗng',
    			'email' => ':attribute không đúng định dạng',
    			'unique' => ':attribute đã tồn tại',
    			'min' => ':attribute ít nhất phải từ :min ký tự trở lên',
    			'same' => ':attribute nhập lại không đúng'
    		]);
    	$password = bcrypt($req->password);
    	$req->merge(['password'=>$password]);
    	User::create($req->all());
    	return redirect()->route('read-user');
    }

    public function edit($id){
    	$use = User::find($id);
    	return view('admin.user.edit', compact('use'));
    }

    public function update($id, Request $req){
    	Validator::make($req->all(),
    		[
    			'name' => 'required,'.$id,
    			'email' => 'required|email,'.$id,
    			'password' => 'required|min:6',
    			're_password' => 'required|same:password'
    		],
    		[
    			'required' => ':attribute không được rỗng',
    			'email' => ':attribute không đúng định dạng',
    			'unique' => ':attribute đã tồn tại',
    			'min' => ':attribute ít nhất phải từ :min ký tự trở lên',
    			'same' => ':attribute nhập lại không đúng'
    		]);
    	$password = bcrypt($req->password);
    	$req->merge(['password'=>$password]);
    	User::find($id)->update($req->all());
    	return redirect()->route('read-user');
    }

    public function delete($id){
    	User::destroy($id);
    	return redirect()->route('read-user');
    }

    public function del_all(Request $req){
    	$id = $req->delid;
    	User::destroy($id);
    	return redirect()->route('read-user');
    }
}
