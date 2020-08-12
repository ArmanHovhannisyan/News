<?php

namespace App\Http\Controllers;

use App\Category;
use App\Hashtag;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use App\News;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Images;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.news.news_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewsRequest $request)
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

        $images = new Images();
        $image_path = $request->file('image_path');
        $images->upload_images($image_path, $news);
        $hashtag = new Hashtag();
        $hashtags = $request->hashtags;
        $hashtag->upload_hashtags($hashtags, $news);

        return back()->with('message', 'Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        News::findOrFail($id);
        $news_list = News::with('category')->where('id', $id)->get();

        return view('admin.news.news', compact('news_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $hashtag = Hashtag::with('news')->where('news_id',$id)->get();
        $img = Images::with('news')->where('news_id',$id)->get();
        return view('admin.news.news_edit',compact('news','hashtag','img'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);


        if ($request->avatar != Null) {
            $image_path = public_path("images/avatar/" . $news->avatar);

            if (file_exists($image_path)) {
                //File::delete($image_path);
                File::delete($image_path);
            }
            $photo = time() . '.' . request()->avatar->getClientOriginalExtension();
            Image::make($_FILES['avatar']['tmp_name'])->resize(900, 550)->save(public_path() . '/images/avatar/' . $photo);
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

        $images = new Images();
        $image_path = $request->file('image_path');
        $images->upload_images($image_path, $news);
        $hashtag = new Hashtag();
        Hashtag::with('news')->where('news_id',$id)->delete();
        $hashtags = $request->hashtags;
        $hashtag->upload_hashtags($hashtags, $news);

        return back()->with('message', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $image_list = Images::with('news')->where('news_id', $id)->get();
        $image_path = public_path("images/avatar/" . $news->avatar);

        if (file_exists($image_path)) {
            //File::delete($image_path);
            File::delete($image_path);
        }

        $img = new Images();
        $img->delete_image($image_list);
        $hashtags = Hashtag::with('news')->where('news_id', $id)->delete();
        $news->delete();
        return redirect()->route('home')->with('message', 'The news has been deleted');
    }

    public function delete_hashtag(){
        $id = $_GET['id'];
        $hashtag = Hashtag::findOrFail($id);
        $hashtag->delete();
    }

    public function delete_img(Request $request){
        $img = new Images();
        $id = $request->img_path;
        Images::findOrFail($id);
        $image_list = Images::with('news')->where('id', $id)->get();
        $img->delete_image($image_list);
        return back()->with('message', 'Delete image successfully');
    }
}
