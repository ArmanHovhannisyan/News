<div class="col-md-9">
    @foreach($categories as  $category)
        @if($category -> news()-> count())
            <div class="category_layout">
                <div class="item_caregory red"><h2><a
                            href="category.html">{!! $category["name_".App::getLocale()] !!}</a></h2></div>
                <div class="row">


                    @foreach($category->news as $new)
                        @if( $loop->last )
                            <div class="col-md-7">
                                <div class="item feature_news_item">
                                    <div class="item_wrapper">
                                        <div class="item_img">
                                            <img class="img-responsive"
                                                 src="{{asset('images/avatar/'.$new->avatar)}}"
                                                 alt="Chania">
                                        </div><!--item_img-->
                                        <div class="item_title_date">
                                            <div class="news_item_title">
                                                <h2>
                                                    <a href="{{route('show',$new->id)}}">{!!$new["title_".App::getLocale()]!!}</a>
                                                </h2>
                                            </div><!--news_item_title-->
                                            <div class="item_meta">{{$new->created_at}}</div>
                                        </div><!--item_title_date-->
                                    </div><!--item_wrapper-->
                                    <div
                                        class="item_content">{!! Str::substr($new["short_description_".App::getLocale()],0,40)!!}
                                    </div><!--item_content-->

                                </div><!--feature_news_item-->
                            </div><!--col-md-7-->
                        @endif
                    @endforeach
                    <div class="col-md-5">
                        <div class="media_wrapper">
                            @foreach($category->news as $id => $new)
                                @if($new->category_id == $category->id && $id<5)

                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{route('show',$new->id)}}"><img class="media-object"
                                                             src="{{asset('images/avatar/'.$new->avatar)}} "
                                                             width="100px"></a>
                                        </div><!--media-left-->
                                        <div class="media-body">
                                            <h3 class="media-heading"><a href="{{route('show',$new->id)}}">{!!$new["title_".App::getLocale()]!!}
                                                </a></h3>

                                            {{--                                                        <p>{!!$new["short_description_".App::getLocale()]!!}</p>--}}

                                        </div><!--media-body-->
                                    </div><!--media-->
                                @endif
                            @endforeach

                        </div><!--media_wrapper-->

                    </div><!--col-md-5-->


                </div><!--row-->

            </div><!--category_layout-->
        @endif
    @endforeach

</div>
<!--col-md-9-->


