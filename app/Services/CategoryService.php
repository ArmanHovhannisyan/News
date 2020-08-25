<?php


namespace App\Services;


use App\Category;
use App\Contracts\CategoryControllerInterface;
use App\Helper;
use App\Images;
use App\News;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class CategoryService implements CategoryControllerInterface
{
    /**
     * @var Category
     */
    private $category;
    /**
     * @var News
     */
    private $news;
    /**
     * @var Images
     */
    private $img;
    /**
     */


    public function __construct()
    {
        $this->category = new Category();
        $this->news = new News();
        $this->img = new Images();


    }

    public function store($request)
    {
        $this->category->create($request->all());
        return true;
    }

    public function show($category_id)
    {

        $news_info = $this->news::with('category')->where('category_id', $category_id)->paginate(20);
        return $news_info;
    }

    public function edit($category_id)
    {
        $category = $this->category->where('id', $category_id)->first();
        if ($category == Null) {
            return abort(404);
        }
        return $category;
    }

    public function update($request, $category_id)
    {

        $category = $this->category->where('id', $category_id)->first();
        if ($category == Null) {
            return abort(404);
        }
        $category->update($request->all());
        return true;
    }

    public function destroy($category_id)
    {

        $category = $this->category->with('news')->where('id', $category_id)->first();
        if ($category != NULL) {
            $helper = new Helper();
            foreach ($category->news as $img_id) {
                $news = $img_id;
                $helper->delete_avatar($news);
                $image_list = $this->img->with('news')->where('news_id', $img_id->id)->get();
                $helper->delete_image($image_list);
                $img_id->delete();
            }
            $category->delete();
        } else {
            return abort(404);
        }

        return true;

    }

}
