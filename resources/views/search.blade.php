@extends('layouts.main')
@section('content')
    <div class="col-md-9">
        <div class="single_content_layout">
            <div class="single_related_news">
                <div class="single_media_title"><h2>Search result</h2></div>
                <div class="media_wrapper">
                    @if($search == Null)

                        <div class="media-body">
                            <h4 class="media-heading">Your search returned nothing</h4>
                        </div><!--media-body-->
                    @else
                        @foreach($search as $news)
                            <div class="media">
                                <div class="media-left">
                                    <a href="{{route('show',$news->id)}}"><img width="120px" class="media-object"
                                                                               src="{{asset('images/avatar/'.$news->avatar)}}"></a>
                                </div><!--media-left-->
                                <div class="media-body">
                                    <h4 class="media-heading"><a
                                            href="{{route('show',$news->id)}}">{!!$news["title_".App::getLocale()]!!}</a>
                                    </h4>
                                    <div class="media_meta"><a
                                            href="{{route('show',$news->id)}}">{{ date('d M Y - H:i:s', $news->created_at->timestamp)}}</a>
                                    </div>
                                    <div class="media_content">
                                        <p>{!! Str::substr($news["short_description_".App::getLocale()],0,40)!!}...</p>
                                    </div><!--media_content-->
                                </div><!--media-body-->
                            </div><!--media-->
                        @endforeach

                            {{ $search->appends(request()->only('q'))->links() }}
                    @endif
                </div><!--media_wrapper-->
            </div>


            <div class="ad">
                <img class="img-responsive" src="{{asset('assets/img/img-single-ad.jpg')}}" alt="">
            </div>


        </div><!--single_content_layout-->
    </div>
@endsection
