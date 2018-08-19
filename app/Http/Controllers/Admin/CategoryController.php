<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function read(){
    	$cates = Category::all();
    	return view('admin.category.index', compact('cates'));
    }

    public function add(){
    	return view('admin.category.add');
    }

    public function create(Request $req){
    	$this->validate($req,
    		[
    			'name' => ':required|unique:category,name',
    			'slug' => ':required|unique:category,slug'
    		],
    		[
    			'required' => ':attribute không được rỗng',
    			'unique' => ':attribute đã tồn tại'
    		]);
    	Category::create($req->all());
    	return redirect()->route('read-cate');
    }

      public function delete($id){
    	Category::destroy($id);
    	return redirect()->route('read-cate');
    }

    public function del_all(Request $req){
    	$id = $req->delid;
    	Category::destroy($id);
    	return redirect()->route('read-cate');
    }

    public function edit($id){
    	$cate = Category::find($id);
    	return view('admin.category.edit', compact('cate'));
    }

    public function update($id, Request $req){
    		$this->validate($req,
    		[
    			'name' => ':required|unique:category,name,'.$id,
    			'slug' => ':required|unique:category,slug,'.$id
    		],
    		[
    			'required' => ':attribute không được rỗng',
    			'unique' => ':attribute đã tồn tại'
    		]);
    	Category::find($id)->update($req->all());
    	return redirect()->route('read-cate');
    }
}
