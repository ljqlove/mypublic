@extends('home.layouts.default')

@section('content')
	<table class="table table-bordered table-striped table-hover">
		<tr class="active"><td>ID</td><td>用户名(email)</td><td>密码</td><td>操作</td></tr>
		<?php $i=0 ?>
		@foreach($select as $v)
		<?php $i++ ?>
		<tr class="{{ $i%2==0 ? 'info' : 'success' }}">
			<td>{{$v->id}}</td>
			<td>{{$v->email}}</td>
			<td>{{$v->password}}</td>
			<td>
				<a class="btn btn-info btn-sm" href="user/update/{{$v->id}}">修改</a> 
				<form action="{{route('delete')}}" method="post" style="display:inline">
                	<input type="hidden" name="_method" value="delete">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$v->id}}">
                    <button class="btn btn-danger btn-sm">删除</button>                                                                
                </form>
			</td>
		</tr>
		@endforeach
	</table>
@stop

