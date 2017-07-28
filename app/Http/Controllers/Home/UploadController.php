<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
//use YuanChao\Editor\EndaEditor;
use Redirect, Input, Response;

class UploadController extends Controller
{
    //Ajax上传图片
    public function imgUpload()
    {
        $file = Input::file('file');
        $id = Input::get('id');
        $allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => '只能上传的文件类型: png, jpg 或 gif.'];
        }

        $destinationPath = 'uploads/shoper/places/places/';
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        return Response::json(
            [
                'success' => true,
                'pic' => asset($destinationPath.$fileName),
                'id' => $id
            ]
        );
    }
}
