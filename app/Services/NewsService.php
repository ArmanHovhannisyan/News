<?php


namespace App\Services;


use App\Contracts\NewsControllerInterface;
use App\Hashtag;
use App\Helper;
use App\Images;
use App\News;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Intervention\Image\Filters\FilterInterface;

class NewsServices implements NewsControllerInterface
{

    private $news;
    private $img;
    private $hashtag;

    public function __construct()
    {
        $this->news = new News();
        $this->img = new Images();
        $this->hashtag = new Hashtag();

    }

    public function store($request)
    {
        $img = $this->img;
        $hashtag = $this->hashtag;
        $photo = time() . '.' . request()->avatar->getClientOriginalExtension();
        $img::make($_FILES['avatar']['tmp_name'])->resize(900, 550)->save(public_path() . '/images/avatar/' . $photo);
        $news_all = $request->all();
        $news_all['avatar'] = $photo;

        $news = $this->news::create($news_all);

//        Upload Image_Path
        $image_path = $request->file('image_path');
        if (!is_null($image_path)) {
            foreach ($image_path as $image) {

                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = public_path('/images');
                $imgx = $img::make($image->getRealPath());
                $imgx->resize(400, 244, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path . '/' . $image_name);

                $img->image_path = $image_name;
                $img->news_id = $news->id;
                $img->save();
            }
        }

//        Upload Hashtag

        $hashtags = $request->hashtags;

        if (!is_null($hashtags)) {
            foreach ($hashtags as $hashtag_name) {
                if (!is_null($hashtag_name)) {
                    $hashtag::create([
                        "name" => $hashtag_name,
                        "news_id" => $news->id,
                    ]);
                }
            }
        }

        return $news;

    }

    public function show($id)
    {
        $this->news::findOrFail($id);
        $news_list = $this->news::with('category')->where('id', $id)->get();
        return $news_list;
    }

    public function edit($id)
    {
        $news = $this->news::findOrFail($id);
        $hashtag = $this->hashtag::with('news')->where('news_id', $id)->get();
        $img = $this->img::with('news')->where('news_id', $id)->get();

        $info = [
            'news' => $news,
            'hashtag' => $hashtag,
            'img' => $img
        ];
        return $info;

    }

    public function update($request, $id)
    {

        $news = $this->news::findOrFail($id);

        $hashtag = $this->hashtag;
        $img = $this->img;
        if ($request->avatar != Null) {
            $image_path = public_path("images/avatar/" . $news->avatar);

            if (file_exists($image_path)) {
                File::delete($image_path);
            }

            $photo = time() . '.' . request()->avatar->getClientOriginalExtension();
            //$img->make($_FILES['avatar']['tmp_name'])->resize(810, 630)->save(public_path() . '/images/avatar/' . $photo);
        } else {
            $photo = $news->avatar;
        }
        $news_all = $request->all();
        $news_all['avatar'] = $photo;

        $news_update = $this->news::updated($news_all);


        $image_path = $request->file('image_path');
        if (!is_null($image_path)) {
            foreach ($image_path as $image) {

                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = public_path('/images');
                $imgx = $img->make($image->getRealPath());
                $imgx->resize(400, 244, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path . '/' . $image_name);

                $img->image_path = $image_name;
                $img->news_id = $news_update->id;
                $img->save();
            }
        }

        $hashtag::with('news')->where('news_id', $id)->delete();
        $hashtags = $request->hashtags;

        if (!is_null($hashtags)) {
            foreach ($hashtags as $hashtag_name) {
                if (!is_null($hashtag_name)) {
                    $hashtag::create([
                        "name" => $hashtag_name,
                        "news_id" => $news->id,
                    ]);
                }
            }
        }

        return $news_update;
    }

    public function destroy($id)
    {
        $news = $this->news::findOrFail($id);

        $image_list = $this->img::with('news')->where('news_id', $id)->get();
        $image_path = public_path("images/avatar/" . $news->avatar);

        if (file_exists($image_path)) {
            File::delete($image_path);
        }

        foreach ($image_list as $id => $images) {
            $img = $this->img::findOrFail($images->id);

            $image_path = public_path("images/" . $img->image_path);

            if (file_exists($image_path)) {
                File::delete($image_path);
            }

            $images->delete();
            $img->delete();

        }
        $hashtags = $this->hashtag::with('news')->where('news_id', $id)->delete();

        $news->delete();

        return response(['message' => 'ok']);
    }

    public function delete_hashtag($request)
    {
        $id = $request->id;
        $hashtag = $this->hashtag::findOrFail($id);
        $hashtag->delete();
        return response(['message' => 'ok']);
    }

    public function delete_img($request)
    {
        $id = $request->img_path;
        $this->img::findOrFail($id);
        $image_list = $this->img::with('news')->where('id', $id)->get();
        foreach ($image_list as $id => $images) {
            $img = $this->img::findOrFail($images->id);

            $image_path = public_path("images/" . $img->image_path);

            if (file_exists($image_path)) {
                File::delete($image_path);
            }

            $images->delete();
            $img->delete();
        }
        return response(['message' => 'ok']);
    }
}
