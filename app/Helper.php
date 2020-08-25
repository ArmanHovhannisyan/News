<?php


namespace App;


use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Helper
{
    public  function upload_images($image_path, $news_update)
    {
            $img = new Images();
            foreach ($image_path as $image) {
                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = public_path('/images');
                $images = Image::make($image->getRealPath());
                $images->resize(400, 244, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path . '/' . $image_name);

                $img->create([
                    'image_path'=>$image_name,
                    'news_id' => $news_update->id
                ]);
            }

            return true;

    }

    public  function delete_image($image_list)
    {
        $img = new Images();
        foreach ($image_list as $id => $images) {

            $img->findOrFail($images->id);

            $image_path = public_path("images/" . $images->image_path);

            if (file_exists($image_path)) {
                File::delete($image_path);
            }
            else {
                return back()->with('error','Image Not found');
            }

            $images->delete();
            $img->delete();

            return true;
        }
    }

    public  function delete_avatar($news)
    {
        $image_path = public_path("images/avatar/" . $news->avatar);

        if (file_exists($image_path)) {
            File::delete($image_path);
        }
        else {
            return back()->with('error','Image Not found');
        }

        return true;
    }



    public  function created_view($id,$ip, $news)
    {

        $visits = View_news::where([
            ['ip', '=', $ip],
            ['news_id', '=', $id]
        ])->get();

        if (!$visits->count()) {
            View_news::insert([
                'news_id' => $id,
                'ip' => $ip,

            ]);

        }

    }
}
