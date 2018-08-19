@extends('layouts.master')

@section('title', 'Danh sách sản phẩm')

@section('content')
<form action="" method="GET" class="form-inline" role="form">
	<div class="form-group">
		<input type="text" class="form-control" name="search" placeholder="Input name">
	</div>
	<button type="submit" class="btn btn-default">Lọc</button>
</form>

<form action="" method="POST" class="form-inline" role="form">
	@csrf
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th><input type="checkbox" name=""></th>
			<th>STT</th>
			<th>Name</th>
			<th>Image</th>
			<th>Price</th>
			<th>Content</th>
			<th>Category</th>
			<th>Created at</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $k => $product)
		<tr>
			<td><input type="checkbox" name="delid[]" value="{{ $product->id }}"></td>
			<td>{{ $k+1 }}</td>
			<td>{{ $product->name }}</td>
			<td><img src="{{ url('uploads') }}/{{ $product->image }}" width="50"></td>
			<td>{{ $product->price }}</td>
			<td>{{ $product->content }}</td>
			<td>{{ $product->cate->name}}</td>
			<td>{{ date('Y-m-d', strtotime($product->created_at)) }}</td>
			<td>
				<a href="{{ route('edit-pro', $product->id) }}" class="btn btn-xs btn-info">Sửa</a>
				<a href="{{ route('del-pro', $product->id) }}" class="btn btn-xs btn-danger">Xóa</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
	<button type="submit" class="btn btn-danger">DeleteSelect</button>
	<a href="{{ route('add-pro') }}" class="btn btn-success">Thêm mới</a>
</form>
@stop