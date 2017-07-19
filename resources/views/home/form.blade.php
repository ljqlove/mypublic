@extends('home.layouts.default')

@section('content')
	<div class="col-md-6">
			<form action="/form" method="post" enctype="multipart/form-data">
				<!-- <div class="form-group">
			    <label for="exampleInputEmail1">邮箱</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">密码</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
			  </div> -->
			  <div class="form-group">
			    <label for="exampleInputFile">选择头像</label>
			    <input type="file" name="img" id="exampleInputFile">
			    <p class="help-block">请选择一个图片</p>
			  </div>
			 <!--  <div class="checkbox">
			    <label>
			      <input type="checkbox"> 记住我！！
			    </label>
			  </div> -->
			  {{csrf_field()}}
			  <button type="submit" class="btn btn-default">确认上传</button>
			</form>
		</div>

@stop