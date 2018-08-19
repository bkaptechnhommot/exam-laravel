@extends('layouts.master')

@section('title', 'Thêm mới danh mục sản phẩm')

@section('content')
<form action="" method="POST" role="form">
	@csrf
	<div class="form-group">
		<label for="">Tên danh mục</label>
		<input type="text" class="form-control" name="name" id="name" value="{{ $cate->name }}">
		@if($errors->has('name'))
			<div class="help-block">
				{{ $errors->first('name') }}
			</div>
		@endif
	</div>
	<div class="form-group">
		<label for="">Đường dẫn tĩnh</label>
		<input type="text" class="form-control" name="slug" id="slug" value="{{ $cate->slug }}">
		@if($errors->has('slug'))
			<div class="help-block">
				{{ $errors->first('slug') }}
			</div>
		@endif
	</div>

	<button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@stop