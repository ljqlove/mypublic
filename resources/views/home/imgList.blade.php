@extends('home.layouts.default')
@section('content')
<div class="hover">
	@foreach($img as $v)
	<div class="bg-info">
		<img src="{{$v->img}}" alt="" class="bg-danger pull-left" style="width:200px;border-radius: 10px;padding:10px;margin:10px">
	</div>
	@endforeach
</div>
@stop