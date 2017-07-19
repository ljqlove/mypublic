<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Album;
use Image;

/**
 * 相册控制器
 */
class AlbumsController extends Controller
{

    /**
     * 首页
     * @return 
     */
    public function index()
    {
        $albums = Album::all();
        return   view('home', compact('albums'));
    }

    /**
     * 相册信息保存
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
        //数据验证
        $this->validate($request, [
            'name' => 'required|max:50',
            'cover'=>'required',
        ]);

        //数据存储
     /*   $album = Album::create([
            'name' => $request->name,
            'intro' => $request->intro,
        ]);*/

        //封面图片压缩存储并生成路径
         $cover_path = "images/album/covers/" . time() . ".jpg";
         Image::make($request->cover)->resize(355, 200)->save(public_path($cover_path));
        $album = new Album();
        $album->name=$request->name;
        $album->intro = $request->intro;
        $album->cover =  "/" . $cover_path;
        $album->save();

        //返回
        session()->flash('success', 'create successful');
        return back();
    }

    
    /**
     * 相册信息更新
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id)
    {
        //数据验证
        $this->validate($request, [
            'name' => 'required|max:50',
        ]);

        //更新数据
        $album = Album::findOrFail($id);
        $album->update([
            'name' => $request->name,
            'intro' => $request->intro,
        ]);
         //如果上传了封面图片，存储封面
        if($request->hasFile('cover')){
            //封面图片压缩存储并生成路径
            $cover_path = "images/album/covers/" . time() . ".jpg";
            Image::make($request->cover)->resize(355, 200)->save(public_path($cover_path));
            //更新封面图片
            $album->update([
                'cover' => "/" . $cover_path,
            ]);
        }

        //返回
        session()->flash('success', 'Edit successful');
        return back();
    }
    /**
     * 相册详情页
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id)
    {
        //获取相册数据
        $album = Album::findOrFail($id);

        //获取照片数据
        $photos = $album->photos()->orderBy('created_at', 'desc')->paginate(10);

        //返回
        return view('albums.show', compact(['album','photos']));
    }

     
    /**
     * 删除相册
     * @param  $id 相册id
     * @return [type]
     */
    public function destroy($id)
    {
        //删除
        $album = Album::findOrFail($id);
        $album->delete();

        //返回
        session()->flash('success','Delete Successful');
        return redirect()->route('home');

    }
}