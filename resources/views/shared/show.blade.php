@extends('app')

@section('title', $album->name)

@section('content')

<!-- 相册信息 -->
<div class="row">
    <div class="col-sm-3">
        @if( $album->cover == '' )
            <img class="img-responsive" src="/images/album/covers/default.jpg">
        @else
            <img class="img-responsive" src="{{ $album->cover }}">
        @endif
    </div>
    <div class="col-sm-9">
        <h2>{{ $album->name }}</h2>
        <p>{{ $album->intro }}</p>

        <!-- 上传照片：弹出框按钮 -->
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadPhoto">
          Upload Photo
        </button>
        <!-- 编辑相册：弹出框按钮 -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editAlbum">
          Edit Album
        </button>
        <!-- 删除相册：弹出框按钮 -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAlbum">
          Delete Album
        </button>
    </div>
</div>
<!-- 上传照片：弹出框 -->
<div class="modal fade" id="uploadPhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Photo</h4>
      </div>
      <div class="modal-body">
          <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="album_id" value="{{ $album->id }}">
            <div class="form-group">
              <input type="file" name="photo[]" multiple="multiple"   required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Click here to add a title for this photo">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="intro" placeholder="Click here to add an introduction for this photo">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- 编辑相册：弹出框 -->
<div class="modal fade" id="editAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Album</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" action="{{ route('albums.update', $album->id) }}" method="post"  enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Album name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" required value="{{ $album->name }}">
              </div>
            </div>
            <div class="form-group">
              <label for="intro" class="col-sm-2 control-label">Album introduction</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="intro" name="intro" value="{{ $album->intro }}">
              </div>
            </div>

            <!-- 封面图片上传接口 -->
              <div class="form-group">
                <label for="intro" class="col-sm-2 control-label">Cover picture</label>
                <div class="col-sm-10">
                  <input type="file" name="cover">
                </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>


<!-- 删除相册：弹出框 -->
<div class="modal fade" id="deleteAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="text-align:center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Do you want to delete this album?</h4>
      </div>
      <div class="modal-body">
          <form action="{{ route('albums.destroy', $album->id) }}" method="post" style="display: inline-block;">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">Dlete</button>
          </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>



<!-- 照片显示 -->
<div></div>
<div class="row  masonry">
   
   <div class="col-md-3 col-sm-4 photo  item">
    <div class="panel panel-default">
      <div class="panel-body">
        <img class="img-responsive" src="{{ $photo->src }}">
        <p class="photo-name">{{ $photo->name }}</p>
        @if($photo->intro == '')
            <p class="photo-intro">no introduction ..</p>
        @else
            <p class="photo-intro">{{ $photo->intro }}</p>
        @endif
        <!-- 编辑照片：弹出框按钮 -->
        <span class="glyphicon glyphicon-cog photo-conf"  data-toggle="modal" data-target="#editPhoto{{ $photo->id }}"></span>
      </div>
    </div>
</div>


<!-- 编辑照片：弹出框 -->
<div class="modal fade" id="editPhoto{{ $photo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Photo</h4>
      </div>
      <div class="modal-body">
          <form action="{{ route('photos.update', $photo->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="{{ $photo->name }}" placeholder="Click here to add a title to this photo">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="intro" value="{{ $photo->intro }}" placeholder="Click here to add an introduction to this photo">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
          </form>
          <form action="{{ route('photos.destroy', $photo->id) }}" method="post" style="float:right;position:relative;top:-35px">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>

      </div>
    </div>
  </div>
</div>
</div>

{!! $photos->render() !!}

<!--瀑布流-->
<script>
 var container = $('.masonry');
  container.imagesLoaded(function() {
    container.masonry({
    itemSelector: '.item',
    isAnimated: true,
    });
});

</script>

@endsection
