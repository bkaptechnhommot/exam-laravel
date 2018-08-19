@extends('layouts.login')

@section('content')
<div class="login-box-body">
<p class="login-box-msg">Sign in to start your session</p>

<form action="" method="post">
	{{ csrf_field() }}
  <div class="form-group has-feedback @if($errors->has('email')) has-error @endif">
    <input type="text" class="form-control" name="email" placeholder="{{$errors->first('email')}}">
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
  </div>
  <div class="form-group has-feedback @if($errors->has('password')) has-error @endif">
    <input type="password" class="form-control" name="password" placeholder="{{$errors->first('password')}}">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
  </div>
  <div class="row">
    <div class="col-xs-8">
      <div class="checkbox icheck">
        <input type="checkbox" name="remember"> Ghi nhớ đăng nhập
      </div>
    </div>
    <!-- /.col -->
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
    </div>
    <!-- /.col -->
  </div>
</form>
@if(Session::has('error'))
	<div class="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong style="color: red">{{ Session::get('error') }}</strong>
	</div>
@endif

</div>
<!-- /.login-box-body -->
@stop
