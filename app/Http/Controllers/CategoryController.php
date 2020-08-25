<?php

namespace App\Http\Controllers;


use App\Contracts\CategoryControllerInterface;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public $CategoryControllerInterface;

    /**
     * NewsController constructor.
     * @param CategoryControllerInterface $CategoryControllerInterface
     */
    public function __construct(CategoryControllerInterface $CategoryControllerInterface)
    {
        $this->CategoryControllerInterface = $CategoryControllerInterface;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.category.category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest  $request)
    {
        $this->CategoryControllerInterface->store($request);

        return redirect()->route('category.create')->with('message', 'Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param $category_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function show($category_id)
    {

        $news_info=$this->CategoryControllerInterface->show($category_id);
        return  view('admin.news.news_show',compact('news_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $category_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function edit($category_id)
    {
        $category=$this->CategoryControllerInterface->edit($category_id);
        return view('admin.category.CategoryUpdate',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param $category_id
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, $category_id)
    {
        $this->CategoryControllerInterface->update($request,$category_id);
        return redirect()->route('category.edit',$category_id)->with('message','Category Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $category_id
     * @return RedirectResponse
     */
    public function destroy($category_id)
    {
        $this->CategoryControllerInterface->destroy($category_id);
        return  redirect()->route('home')->with('message','Delete successfully');
    }
}
