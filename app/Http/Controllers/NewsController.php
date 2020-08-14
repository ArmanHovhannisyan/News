<?php

namespace App\Http\Controllers;
use App\Hashtag;
use App\Http\Requests\NewsRequest;
use App\Images;
use App\Services\NewsServices;
use App\News;
use Illuminate\Http\Request;



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
        NewsServices::store($request);
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
        $news_list = NewsServices::show($id);

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
        $hashtag = Hashtag::with('news')->where('news_id', $id)->get();
        $img = Images::with('news')->where('news_id', $id)->get();
        return view('admin.news.news_edit', compact('news', 'hashtag', 'img'));
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
        NewsServices::update($request,$id);

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
        NewsServices::destroy($id);
        return redirect()->route('home')->with('message', 'The news has been deleted');
    }

    public function delete_hashtag()
    {
        $id = $_GET['id'];
        $hashtag = Hashtag::findOrFail($id);
        $hashtag->delete();
    }

    public function delete_img(Request $request)
    {

        NewsServices::delete_img($request);
        return back()->with('message', 'Delete image successfully');
    }
}
