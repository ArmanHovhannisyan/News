<?php


namespace App\Services;


use App\Contracts\NewsControllerInterface;
use App\Helper;
use App\Images;
use App\News;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Null_;

class NewsService implements NewsControllerInterface
{

    private $news;
    private $img;


    public function __construct()
    {
        $this->news = new News();
        $this->img = new Images();


    }

    public function store($request)
    {
        $photo = time() . '.' . request()->avatar->getClientOriginalExtension();
        Image::make($_FILES['avatar']['tmp_name'])->resize(900, 550)->save(public_path() . '/images/avatar/' . $photo);
        $news_all = $request->all();
        $news_all['avatar'] = $photo;

        $news_update = $this->news->create($news_all);

//        Upload Image_Path
        if($request->hasFile('image_path')) {
            $helper = new Helper();
            $image_path=$request->image_path;
            $helper->upload_images($image_path, $news_update);
        }


        return $news_update;

    }

    public function show($news_id)
    {
        $news_list = $this->news::with('category')->where('id', $news_id)->get();

        if ($news_list ){
            return $news_list;
        }
        else{
            return abort(404);
        }

    }

    public function edit($news_id)
    {

        $news = $this->news::with('image')->where('id',$news_id)->first();

        if($news != Null){
            return $news;
        }
        else{
            return abort(404);
        }


    }

    public function update($request, $news_id)
    {
        $news_update = $this->news->with('image')->where('id',$news_id)->first();
        if($news_update != Null) {
            $helper = new Helper();
            if ($request->avatar != Null) {
                $news = $news_update;
                $helper->delete_avatar($news);
                $photo = time() . '.' . request()->avatar->getClientOriginalExtension();
                Image::make($_FILES['avatar']['tmp_name'])->resize(810, 630)->save(public_path() . '/images/avatar/' . $photo);

            } else {
                $photo = $news_update->avatar;
            }
            $news_all = $request->all();
            $news_all['avatar'] = $photo;

            $news = $news_update->update($news_all);


            if($request->hasFile('image_path')) {
                $image_path=$request->image_path;
                $helper->upload_images($image_path, $news_update);
            }

            return $news;
        }
        else {
            return  abort(404);
        }
    }

    public function destroy($news_id)
    {
        $news = $this->news->with('image')->where('id',$news_id)->first();
        if($news != Null) {
            $helper = new Helper();
            $image_list = $news->image;
            $helper->delete_avatar($news);

            $helper->delete_image($image_list);
            $news->delete();
            return true;
        }
        else {
            return  abort(404);
        }
    }



    public function delete_img($request)
    {
        $id = $request->img_path;

        $image_list=$this->img->where('id',$id)->get();
        if($image_list ->count()){
            $helper = new Helper();
            $helper->delete_image($image_list);
        }
        else{
            return abort(404);
        }

        return true;
    }

}
