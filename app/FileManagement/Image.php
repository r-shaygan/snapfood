<?php

namespace App\FileManagement;

use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Image
{
    public static function store(string $name,BannerRequest|Request $request,string $input='image')
    {
        File::ensureDirectoryExists(public_path(config("image.{$name}")));
        $image_name = self::setImgName($input, $request);
        $request->$input->move(public_path(config("image.{$name}")),$image_name );
        return $image_name;
    }

    public static function remove(string $name,string $image_name){
        $image_path = public_path(config("image.{$name}") . $image_name);
        file_exists($image_path) && File::delete($image_path);
    }

    public static function update(string $name,string $image_name,BannerRequest|Request $request,string $input='image'){
        self::remove($name,$image_name);
        return self::store($name,$request,$input);
    }

    public static function setImgName(string $input, BannerRequest|Request $request): string
    {
        return "pic" . microtime() . $request->$input->getClientOriginalName();
    }

}
