<?php


namespace App\Services;


use App\Category;
use App\Contracts\HomeDbControllerInterface;
use App\Hashtag;
use App\Helper;
use App\News;
use Illuminate\Support\Facades\App;

class HomeService implements HomeDbControllerInterface
{
    /**
     * @var Category
     */
    private $category;
    /**
     * @var News
     */
    private $news;


    public function __construct()
    {
        $this->category = new Category();
        $this->news = new News();

    }

    public function index()
    {
        $categories = $this->category->with('news')->take(10)->get();
        return $categories;
    }

    public function show($id, $request)
    {
        $news = $this->news->with('view_news')->where('id', $id)->first();
        if ($news != NUll) {
            $ip = $request->ip();
            $helper = new Helper();
            $helper->created_view($id, $ip, $news);
        } else {
            return abort(404);
        }
        return $news;
    }

    public function changeLocale($locale)
    {
        $availableLocales = ['ru', 'en', 'hy'];
        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.locale');
        }

        session(['locale' => $locale]);

        App::setLocale($locale);

        return true;
    }

    public function search($request){
        $q = $request->q ;
        if($q == ''){
            return Null;
        }
        else{
            return $this->news->where('title_en', 'LIKE', "%$q%")->orwhere('title_hy', 'LIKE', "%$q%")->where('title_ru', 'LIKE', "%$q%")->orderBy('id')->paginate(10);
        }

    }
}
