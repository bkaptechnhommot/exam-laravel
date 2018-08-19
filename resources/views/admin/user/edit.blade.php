@extends('layouts.master')

@section('title', 'Thêm mới tài khoản')

@section('content')
<form action="" method="POST" role="form">
	@csrf
	<div class="form-group">
		<label for="">Họ và tên</label>
		<input type="text" class="form-control" name="name" id="name" value="{{ $use->name }}">
		@if($errors->has('name'))
			<div class="help-block">
				{{ $errors->first('name') }}
			</div>
		@endif
	</div>
	<div class="form-group">
		<label for="">Địa chỉ email</label>
		<input type="text" class="form-control" name="email" id="email" value="{{ $use->email }}">
		@if($errors->has('email'))
			<div class="help-block">
				{{ $errors->first('email') }}
			</div>
		@endif
	</div>
	<div class="form-group">
		<label for="">Mật khẩu</label>
		<input type="password" class="form-control" name="password">
		@if($errors->has('password'))
			<div class="help-block">
				{{ $errors->first('password') }}
			</div>
		@endif
	</div>
	<div class="form-group">
		<label for="">Nhập lại mật khẩu</label>
		<input type="password" class="form-control" name="re_password" placeholder="Input re_password">
		@if($errors->has('re_password'))
			<div class="help-block">
				{{ $errors->first('re_password') }}
			</div>
		@endif
	</div>

	<button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@stop