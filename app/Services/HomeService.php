<?php


namespace App\Services;



use App\Category;
use App\Contracts\HomeControllerInterface;
use App\Hashtag;
use App\Helper;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeControllerService implements HomeControllerInterface
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
     * @var Hashtag
     */
    private $Hashtag;

    public function __construct()
    {
        $this->category = new Category();
        $this->news = new News();
        $this->Hashtag = new Hashtag();
    }
    public function index()
    {
        $categories =  $this->category::with('news')->paginate(20);
        return $categories;
    }

    public function show($id,$request){
        $news = $this->news::findOrFail($id);
        $hashtag_news = $this->Hashtag::with('news')->where('news_id',$id)->get();
        $ip = $request -> ip() ;
        Helper::created_view($id,$ip,$news);
        if(!empty($hashtag_news)) {
            foreach ($hashtag_news as $q)
                $related_news = Hashtag::with('news')->where('name', 'LIKE', $q->name . '%')->take(3)->get();
        }
        $info = [
            'news'=>$news,
            'related_news'=>$related_news
        ] ;

        return $info;
    }
    public  function changeLocale($locale){
        $availableLocales = ['ru', 'en' , 'hy'];
        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.locale');
        }
        session(['locale' => $locale]);
        App::setLocale($locale);
    }
}
