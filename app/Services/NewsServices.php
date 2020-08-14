<?php


namespace App\Services;


use App\Hashtag;
use App\Helper;
use App\Images;
use App\News;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class NewsServices
{
    public static function store($request)
    {
        $photo = time() . '.' . request()->avatar->getClientOriginalExtension();
        Image::make($_FILES['avatar']['tmp_name'])->resize(900, 550)->save(public_path() . '/images/avatar/' . $photo);
        $news = News::create([
            'category_id' => $request->category_id,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'title_hy' => $request->title_hy,
            'short_description_ru' => $request->short_description_ru,
            'short_description_en' => $request->short_description_en,
            'short_description_hy' => $request->short_description_hy,
            'long_description_en' => $request->long_description_en,
            'long_description_ru' => $request->long_description_ru,
            'long_description_hy' => $request->long_description_hy,
            'avatar' => $photo,
        ]);


        $image_path = $request->file('image_path');
        Helper::upload_images($image_path, $news);

        $hashtags = $request->hashtags;
        Helper::upload_hashtags($hashtags, $news);
    }

    public  static function show($id){
        News::findOrFail($id);
        $news_list = News::with('category')->where('id', $id)->get();
        return $news_list;
    }

    public static function update($request,$id){
        $news = News::findOrFail($id);


        if ($request->avatar != Null) {
            $image_path = public_path("images/avatar/" . $news->avatar);

            if (file_exists($image_path)) {
                //File::delete($image_path);
                File::delete($image_path);
            }
            $photo = time() . '.' . request()->avatar->getClientOriginalExtension();
            Image::make($_FILES['avatar']['tmp_name'])->resize(810, 630)->save(public_path() . '/images/avatar/' . $photo);
        } else {
            $photo = $news->avatar;
        }
        News::where('id', $id)->update([
            'category_id' => $request->category_id,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'title_hy' => $request->title_hy,
            'short_description_ru' => $request->short_description_ru,
            'short_description_en' => $request->short_description_en,
            'short_description_hy' => $request->short_description_hy,
            'long_description_en' => $request->long_description_en,
            'long_description_ru' => $request->long_description_ru,
            'long_description_hy' => $request->long_description_hy,
            'avatar' => $photo,
        ]);


        $image_path = $request->file('image_path');
        Helper::upload_images($image_path, $news);
        Hashtag::with('news')->where('news_id', $id)->delete();
        $hashtags = $request->hashtags;
        Helper::upload_hashtags($hashtags, $news);
    }

    public static function destroy($id){
        $news = News::findOrFail($id);
        $image_list = Images::with('news')->where('news_id', $id)->get();
        $image_path = public_path("images/avatar/" . $news->avatar);

        if (file_exists($image_path)) {
            //File::delete($image_path);
            File::delete($image_path);
        }

        Helper::delete_image($image_list);
        $hashtags = Hashtag::with('news')->where('news_id', $id)->delete();
        $news->delete();
    }

    public static function delete_img($request){
        $id = $request->img_path;
        Images::findOrFail($id);
        $image_list = Images::with('news')->where('id', $id)->get();
        Helper::delete_image($image_list);
    }
}
