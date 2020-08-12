<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Images extends Model
{
    protected $fillable = [
        'image_path', 'news_id',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function upload_images($image_path, $news)
    {
        if (!is_null($image_path)) {
            foreach ($image_path as $image) {


                $img = new Images();
                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = public_path('/images');
                $imgx = Image::make($image->getRealPath());
                $imgx->resize(400, 244, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path . '/' . $image_name);

                $img->image_path = $image_name;
                $img->news_id = $news->id;
                $img->save();
            }
        }
    }

    public function delete_image($image_list){
        foreach ($image_list as $id => $images) {
            $img = Images::findOrFail($images->id);

            $image_path = public_path("images/" . $img->image_path);

            if (file_exists($image_path)) {
                //File::delete($image_path);
                File::delete($image_path);
            }
            $images->delete();
            $img->delete();

        }
    }
}
