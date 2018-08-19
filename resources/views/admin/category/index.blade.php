@extends('layouts.master')

@section('title', 'Danh sách danh mục')

@section('content')
<form action="{{ route('delall-cate') }}" class="form-inline" method="POST" role="form">
	<button type="submit" class="btn btn-danger">DeleteSelect</button>
	<a href="{{ route('add-cate') }}" class="btn btn-success">Thêm mới</a>
	@csrf
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th><input type="checkbox" name=""></th>
			<th>ID</th>
			<th>Name</th>
			<th>Created at</th>
		</tr>
	</thead>
	<tbody>
		@foreach($cates as $k => $cat)
		<tr>
			<td><input type="checkbox" name="delid[]" value="{{ $cat->id }}"></td>
			<td>{{ $k+1 }}</td>
			<td>{{ $cat->name }}</td>
			<td>{{ date('Y-m-d', strtotime($cat->created_at)) }}</td>
			<td>
				<a href="{{route('edit-cate', ['id'=>$cat->id])}}" class="btn btn-xs btn-info">Sửa</a>
				<a href="{{route('del-cate', $cat->id)}}" class="btn btn-xs btn-danger">Xóa</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</form>

@stop