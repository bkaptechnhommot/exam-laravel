@extends('layouts.master')

@section('title', 'Thêm mới sản phẩm')

@section('content')
<form action="" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="">Tên sản phẩm</label>
		<input type="text" class="form-control" name="name" value="{{ $product->name }}">
		@if($errors->has('name'))
		<div class="help-block">
			{{ $errors->first('name') }}
		</div>
		@endif
	</div>
	<div class="form-group">
		<label for="">Ảnh sản phẩm</label>
		<input type="file" name="upload_file">
		<img src="{{ url('uploads')}}/{{ $product->image }}" width="100">
		@if($errors->has('upload_file'))
		<div class="help-block">
			{{ $errors->first('upload_file') }}
		</div>
		@endif
	</div>
	<div class="form-group">
		<label for="">Giá sản phẩm</label>
		<input type="text" class="form-control" name="price" value="{{ $product->price }}">
		@if($errors->has('price'))
		<div class="help-block">
			{{ $errors->first('price') }}
		</div>
		@endif
	</div>
	<div class="form-group">
		<label for="">Giá khuyến mãi</label>
		<input type="text" class="form-control" name="sale_price" value="{{ $product->sale_price }}">
	</div>
	<div class="form-group">
		<label for="">Danh mục</label>
		<select name="category_id" class="form-control" required="required">
			@foreach($cate as $cat)
			<?php $selected = ($product->category_id == $cat->id)? 'selected' : ''?>
			<option {{ $selected }} value="{{ $cat->id }}">{{ $cat->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="">Mô tả</label>
		<textarea name="content" class="form-control" rows="3">{{ $product->content }}</textarea>
	</div>
	

	<button type="submit" class="btn btn-primary">Thêm mới</button>
</form>
@stop