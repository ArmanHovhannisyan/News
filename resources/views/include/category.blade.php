<section id="feature_category_section" class="feature_category_section section_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @foreach($categories as  $category)
                    @if($category -> news()-> count())
                        <div class="category_layout">
                            <div class="item_caregory red"><h2><a
                                        href="category.html">{!! $category["name_".App::getLocale()] !!}</a></h2></div>
                            <div class="row">
                                @foreach($news as $id => $new)
                                    @if($new->category_id == $category->id)
                                        @if($loop->first)
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
                                                                    <a href="#">{!!$new["title_".App::getLocale()]!!}</a>
                                                                </h2>
                                                            </div><!--news_item_title-->
                                                            <div class="item_meta">{{$new->created_at}}</div>
                                                        </div><!--item_title_date-->
                                                    </div><!--item_wrapper-->
                                                    <div
                                                        class="item_content">{!!$new["short_description_".App::getLocale()]!!}
                                                    </div><!--item_content-->

                                                </div><!--feature_news_item-->
                                            </div><!--col-md-7-->
                                        @endif
                                    @endif
                                @endforeach


                                <div class="col-md-5">
                                    <div class="media_wrapper">
                                        @foreach($news as $id => $new)
                                            @if($new->category_id == $category->id)
                                                @if($id < 5)
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#"><img class="media-object"
                                                                         src="{{asset('images/avatar/'.$new->avatar)}} " width="100px"></a>
                                                    </div><!--media-left-->
                                                    <div class="media-body">
                                                        <h3 class="media-heading"><a href="#">{!!$new["title_".App::getLocale()]!!}
                                                            </a></h3>

{{--                                                        <p>{!!$new["short_description_".App::getLocale()]!!}</p>--}}

                                                    </div><!--media-body-->
                                                </div><!--media-->
                                                @endif
                                            @endif
                                        @endforeach
                                    </div><!--media_wrapper-->

                                </div><!--col-md-5-->

                            </div><!--row-->

                        </div><!--category_layout-->
                    @endif
                @endforeach
            </div><!--col-md-9-->

            <div class="col-md-3">

                <div class="tab sitebar">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#1" data-toggle="tab">Latest</a></li>
                        <li><a href="#2" data-toggle="tab">Populer</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="1">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/img/img-list.jpg"
                                                     alt="Generic placeholder image"></a>
                                </div><!--media-left-->
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">Spain going to made class football</a></h4>
                                    <span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-full"></i>
									</span>
                                </div><!--media-body-->
                            </div><!--media-->

                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/img/img-list5.jpg"
                                                     alt="Generic placeholder image"></a>
                                </div><!--media-left-->
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">Spain going to made class football</a></h4>
                                    <span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-full"></i>
									</span>
                                </div><!--media-body-->
                            </div><!--media-->

                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/img/img-list2.jpg"
                                                     alt="Generic placeholder image"></a>
                                </div><!--media-left-->
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="#">Spain going to made class football</a></h3>
                                    <span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-full"></i>
									</span>
                                </div><!--media-body-->
                            </div><!--media-->

                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/img/img-list3.jpg"
                                                     alt="Generic placeholder image"></a>
                                </div><!--media-left-->
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="#">Spain going to made class football</a></h3>
                                    <span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-full"></i>
									</span>
                                </div><!--media-body-->
                            </div><!--media-->
                        </div><!--tab-pane-->

                        <div class="tab-pane" id="2">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/img/img-list4.jpg"
                                                     alt="Generic placeholder image"></a>
                                </div><!--media-left-->
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="#">Spain going to made class football</a></h3>
                                    <span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-full"></i>
									</span>
                                </div><!--media-body-->
                            </div><!--media-->

                            <div class="media">
                                <div class="media-left">
                                    <a href="#"><img class="media-object" src="assets/img/img-list.jpg"
                                                     alt="Generic placeholder image"></a>
                                </div><!--media-left-->
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="#">Spain going to made class football</a></h3>
                                    <span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-full"></i>
									</span>
                                </div><!--media-body-->
                            </div><!--media-->
                        </div><!--tab-pane-->
                    </div><!--tab-content-->
                </div><!--tab-->

                <div class="ad">
                    <img class="img-responsive" src="assets/img/img-sitebar.jpg" alt="img"/>
                    <img class="img-responsive" src="assets/img/img-sitebar.jpg" alt="img"/>
                    <img class="img-responsive" src="assets/img/img-sitebar.jpg" alt="img"/>
                    <img class="img-responsive" src="assets/img/img-sitebar.jpg" alt="img"/>
                </div><!--ad-->

                <div class="ad">
                    <img class="img-responsive" src="assets/img/img-ad.jpg" alt="img"/>
                </div>

                <div class="ad">
                    <img class="img-responsive" src="assets/img/img-ad2.jpg" alt="img"/>
                </div>

                <div class="most_comment">
                    <div class="sidebar_title">
                        <h2>Most Commented</h2>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="assets/img/img-list.jpg"
                                             alt="Generic placeholder image"></a>
                        </div><!--media-left-->
                        <div class="media-body">
                            <h3 class="media-heading"><a href="#">Spain going to made class football</a></h3>
                            <div class="comment_box">
                                <div class="comments_icon"><i class="fa fa-comments" aria-hidden="true"></i></div>
                                <div class="comments"><a href="#">9 Comments</a></div>
                            </div><!--comment_box-->
                        </div><!--media-body-->
                    </div><!--media-->
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="assets/img/img-list2.jpg"
                                             alt="Generic placeholder image"></a>
                        </div><!--media-left-->
                        <div class="media-body">
                            <h3 class="media-heading"><a href="#">Spain going to made class football</a></h3>
                            <div class="comment_box">
                                <div class="comments_icon"><i class="fa fa-comments" aria-hidden="true"></i></div>
                                <div class="comments"><a href="#">20 Comments</a></div>
                            </div><!--comment_box-->
                        </div><!--media-body-->
                    </div><!--media-->
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="assets/img/img-list3.jpg"
                                             alt="Generic placeholder image"></a>
                        </div><!--media-left-->
                        <div class="media-body">
                            <h3 class="media-heading"><a href="#">Spain going to made class football</a></h3>
                            <div class="comment_box">
                                <div class="comments_icon"><i class="fa fa-comments" aria-hidden="true"></i></div>
                                <div class="comments"><a href="#">23 Comments</a></div>
                            </div><!--comment_box-->
                        </div><!--media-body-->
                    </div><!--media-->
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="assets/img/img-list3.jpg"
                                             alt="Generic placeholder image"></a>
                        </div><!--media-left-->
                        <div class="media-body">
                            <h3 class="media-heading"><a href="#">Spain going to made class football</a></h3>
                            <div class="comment_box">
                                <div class="comments_icon"><i class="fa fa-comments" aria-hidden="true"></i></div>
                                <div class="comments"><a href="#">44 Comments</a></div>
                            </div><!--comment_box-->
                        </div><!--media-body-->
                    </div><!--media-->
                </div><!--most_comment-->
            </div>
        </div>
</section><!--feature_category_section-->
