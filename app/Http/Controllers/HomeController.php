<?php

namespace App\Http\Controllers;



use App\Contracts\HomeDbControllerInterface;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    /**
     * @var HomeDbControllerInterface
     */
    private $HomeDbControllerInterface;

    public function __construct(HomeDbControllerInterface $HomeDbControllerInterface)
    {
        $this->HomeDbControllerInterface = $HomeDbControllerInterface;

    }

    public function index()
    {
        $categories=$this->HomeDbControllerInterface->index();
        return view('index',compact('categories'));
    }

    public function show($id,Request $request){

        $news=$this->HomeDbControllerInterface->show($id,$request);
        return view('single',compact('news'));
    }

    public function changeLocale($locale)
    {
        $this->HomeDbControllerInterface->changeLocale($locale);
        return redirect()->back();
    }
    public function search(Request $request){
        $search = $this->HomeDbControllerInterface->search($request);

        return view('search',compact('search'));
    }

}
