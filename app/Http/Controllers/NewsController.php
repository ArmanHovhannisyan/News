<?php

namespace App\Http\Controllers;

use App\Contracts\NewsControllerInterface;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Http\Requests\UserSettingRequest;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $NewsControllerInterface;

    /**
     * NewsController constructor.
     * @param NewsControllerInterface $NewsControllerInterface
     */
    public function __construct(NewsControllerInterface $NewsControllerInterface)
    {
        $this->NewsControllerInterface = $NewsControllerInterface;

    }

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
        $this->NewsControllerInterface->store($request);
        return back()->with('message', 'Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $news_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($news_id)
    {
        $news_list = $this->NewsControllerInterface->show($news_id);
        return view('admin.news.news', compact('news_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $news_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($news_id)
    {
        $news = $this->NewsControllerInterface->edit($news_id);

        return view('admin.news.news_edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NewsUpdateRequest $request, $news_id)
    {

        $this->NewsControllerInterface->update($request,$news_id);

        return back()->with('message', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $news_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($news_id)
    {
        $this->NewsControllerInterface->destroy($news_id);

        return redirect()->route('news.index')->with('message', 'The news has been deleted');
    }


    public function delete_img(Request $request)
    {

        $this->NewsControllerInterface->delete_img($request);
        return back()->with('message', 'Delete image successfully');
    }


}
