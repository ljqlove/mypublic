@extends('home.layouts.default')

@section('content')
	<div class="col-md-6 col-md-offset-3">
		<form class="form-horizontal" action="/admin/user/doUpdate" method="post">
		  <div class="form-group has-success ">
		    <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>
		    <div class="col-sm-10">
		      <input type="email" class="input-md form-control" name="email" id="inputEmail3" value="{{$res->email}}">
		    </div>
		  </div>
		  <div class="form-group has-success  ">
		    <label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
		    <div class="col-sm-10">
		      <input type="password" class="input-md form-control" name="password" id="inputPassword3" placeholder="Password">
		    </div>
		  </div>
		  <div class="form-group has-success ">
		    <label for="inputPassword3" class="col-sm-2 control-label">重复密码</label>
		    <div class="col-sm-10">
		      <input type="password" name="repassword" class="input-md form-control" id="inputPassword3" placeholder="rePassword">
		    </div>
		  </div>
		  <!-- <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox"> Remember me
		        </label>
		      </div>
		    </div>
		  </div> -->
		  <input type="hidden" name="id" value="{{$res->id}}">
		   {{ csrf_field() }}
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">确认修改</button>
		    </div>
		  </div>
		</form>
	</div>
@stop