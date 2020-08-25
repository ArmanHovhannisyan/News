@extends('layouts.main')
@section('meta')
    <meta property="og:title" content="{!!$news["title_".App::getLocale()]!!}"/>
    <!--<meta property="og:url" content="https://lragir.info/pages/1028" />-->
    <meta property="og:image" content="{{asset('images/avatar/'.$news->avatar)}}"/>
    <meta property="og:image:secure_url" content="{{ asset('images/avatar/'.$news->avatar) }}"/>
    <meta property="og:site_name" content="News.am"/>
    <meta property="og:description" content="{!!$news["short_description_".App::getLocale()]!!}"/>
@endsection
@section('content')
    <div class="col-md-9">
        <div class="single_content_layout">
            <div class="item feature_news_item">
                <div class="item_img">
                    <img class="img-responsive" src="{{asset('images/avatar/'.$news->avatar)}}" alt="">
                </div><!--item_img-->
                <div class="item_wrapper">
                    <div class="news_item_title">
                        <h2><a href="#">{!!$news["title_".App::getLocale()]!!}</a></h2>
                    </div><!--news_item_title-->
                    <div class="item_meta"><a href="#">{{ date('d M Y - H:i:s', $news->created_at->timestamp)}}</a></div>
                    <p class="ml-2 "><i class="fa fa-eye"></i>{{$news->view_news->count()}}</p>

                    <div class="sharethis-inline-share-buttons"></div>

                    <div class="item_content">
                        {!!$news["short_description_".App::getLocale()]!!}
                    </div><!--item_content-->
                </div><!--item_wrapper-->
            </div><!--feature_news_item-->


            <div class="ad">
                <img class="img-responsive" src="{{asset('assets/img/img-single-ad.jpg')}}" alt="">
            </div>


        </div><!--single_content_layout-->
    </div>
@endsection
