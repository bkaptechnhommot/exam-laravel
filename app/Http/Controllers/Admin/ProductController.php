<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
	// Hiển thị sản phẩm
    public function read(){
    	$products = Product::search()->get();
    	return view('admin.product.index', compact('products'));
    }

    //Thêm mới sản phẩm
    public function add(){
    	$cate = Category::all();
    	return view('admin.product.add', compact('cate'));
    }

    public function create(Request $req){
    	$file_name = '';
    	$this->validate($req,
    		[
    			'name' => 'required|max:255|unique:product,name',
    			'upload_file' => 'required|mimes:jpg,png,jpeg,gif,bmp',
    			'price' => 'required',
    		],
    		[
    			'required' => ':attribute không được rỗng',
    			'mimes' => ':attribute không đúng định dạng ảnh',
    			'unique' => ':attribute đã tồn tại',
    			'max' => ':attribute tôi đa :max ký tự'
    		]);
    	if ($req->hasFile('upload_file')) {
    		$file = $req->file('upload_file');
    		$img = $file->getClientOriginalName();
    		$file->move('uploads', $img);
    	}

    	$req->merge(['image'=>$img]);
    	Product::create($req->all());
    	return redirect()->route('read-pro');
    }

    // Chỉnh sửa, cập nhật sản phẩm
    public function edit($id){
    	$cate = Category::all();
    	$product = Product::find($id);
    	return view('admin.product.edit', compact('product', 'cate'));
    }

    public function update($id, Request $req){
    	$product = Product::find($id);
    	$img = $product->image;
    	$this->validate($req,
    		[
    			'name' => 'required|max:255|unique:product,name,'.$id,
    			'upload_file' => 'required|mimes:jpg,png,jpeg,gif,bmp',
    			'price' => 'required',
    		],
    		[
    			'required' => ':attribute không được rỗng',
    			'mimes' => ':attribute không đúng định dạng ảnh',
    			'unique' => ':attribute đã tồn tại',
    			'max' => ':attribute tôi đa :max ký tự'
    		]);
    	if ($req->hasFile('upload_file')) {
    		$file = $req->file('upload_file');
    		$img = $file->getClientOriginalName();
    		$file->move('uploads', $img);
    	}

    	$req->merge(['image'=>$img]);
    	// Product::find($id)->update($req->all());
    	$product->update($req->all());
    	return redirect()->route('read-pro');
    }

    // Xóa một sản phẩm
     public function delete($id){
    	Product::destroy($id);
    	return redirect()->route('read-pro');
    }
}
