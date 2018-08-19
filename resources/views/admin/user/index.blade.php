@extends('layouts.master')

@section('title', 'Danh mục tài khoản')

@section('content')
<form action="{{ route('delall_user') }}" method="POST" class="form-inline" role="form">
	@csrf
	<button type="submit" class="btn btn-danger">DeleteSelect</button>
	<a href="{{ route('add-user') }}" class="btn btn-success">Thêm mới</a>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th><input type="checkbox" name=""></th>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Created at</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $k => $user)
		<tr>
			<td><input type="checkbox" name="delid[]" value="{{ $user->id }}"></td>
			<td>{{ $k+1 }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ date('Y-m-d', strtotime($user->created_at))}}</td>
			<td>
				<a href="{{ route('edit-user', ['id'=>$user->id]) }}" class="btn btn-xs btn-info">Sửa</a>
				<a href="{{ route('del-user', ['id'=>$user->id]) }}" class="btn btn-xs btn-danger">Xóa</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</form>
@stop