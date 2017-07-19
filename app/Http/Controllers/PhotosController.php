<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Photo;
use Image;
use Storage;

/**
 * 图片控制器
 */
class PhotosController extends Controller
{
     /**
      * 相片信息存储
      * @param  Request $request [description]
      * @return [type]           [description]
      */
    public function store(Request $request)
    {
        //数据验证
        $this->validate($request,[
            'photo' => 'required',
        ]);

        //生成路径，图片存储
       /* $name = "photo".time();
        $src = "images/album/photos/". $name .".jpg";
        Image::make($request->photo)->save(public_path($src));*/

        //批量上传图片
     
        foreach ($request->photo as $key => $value) {
            //生成路径，图片存储
            $prefix = "photo".mt_rand(1,1000);
            $Origname = $value->getClientOriginalName();
            $name = $prefix.$Origname;
            $src = "images/album/photos/".$name;
            $realPath = $value->getRealPath();
            Storage::disk('uploads')->put($src,file_get_contents($realPath));
       
        //如果输入了标题则存储否则存储之前生成的默认标题
        if($request->has('name')){
            $name = $request->name;
        }

        //存储数据
        $photo = Photo::create([
            'album_id' => $request->album_id,
            'name' => $name,
            'intro' => $request->intro,
            'src' => "/" . $src,
        ]);
    }
        //返回
        session()->flash('success', 'Upload Successful');
        return back();
    }

    /**
     * 照片信息更新
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id)
    {
        //更新
        $photo = Photo::findOrFail($id);
        $photo->update([
            'name' => $request->name,
            'intro' => $request->intro,
        ]);

        //返回
        session()->flash('success', 'Edit Successful');
        return back();
    }

     /**
      * 照片删除
      * @param  [type] $id [description]
      * @return [type]     [description]
      */
    public function destroy($id)
    {
        //删除
        $photo = Photo::findOrFail($id);
        $photo->delete();

        //返回
        session()->flash('success', 'Delete Successful');
        return back();
    }

}
