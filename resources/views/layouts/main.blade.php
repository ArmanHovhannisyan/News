<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sports</title>
    @yield('meta')
    <!-- Goole Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto:400,500" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Owl carousel -->
    <link href="{{asset('assets/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet">

    <!-- Off Canvas Menu -->
    <link href="{{asset('assets/css/offcanvas.min.css')}}" rel="stylesheet">

    <!--Theme CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">


    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f3afd6346e1c70012113e76&product=inline-share-buttons" async="async"></script>
</head>
<body>
<div id="main-wrapper">
    <!-- Header Section -->
@include('include.header')
    <section id="feature_category_section" class="feature_category_section section_wrapper">
        <div class="container">
            <div class="row">


@yield('content')
                <div class="col-md-3">

                    <div class="tab sitebar">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#1" data-toggle="tab">Latest</a></li>
                            <li><a href="#2" data-toggle="tab">Populer</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="1">

                                @foreach($news_show as $news)

                                    <div class="media">
                                    <div class="media-left">
                                        <a href="{{route('show',$news->id)}}"><img width="80px" class="media-object" src="{{asset('images/avatar/'.$news->avatar)}}"
                                                         alt="Generic placeholder image"></a>
                                    </div><!--media-left-->
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="{{route('show',$news->id)}}">{{Str::substr($news["title_".App::getLocale()],0,40)}}...</a></h4>
                                        <span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-full"></i>
									</span>
                                    </div><!--media-body-->
                                </div><!--media-->
                                @endforeach
                            </div><!--tab-pane-->

                            <div class="tab-pane" id="2">

                                @foreach($news_top as $news)

                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{route('show',$news->id)}}"><img width="80px" class="media-object" src="{{asset('images/avatar/'.$news->avatar)}}"
                                                             alt="Generic placeholder image"></a>
                                        </div><!--media-left-->
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="{{route('show',$news->id)}}">{{Str::substr($news["title_".App::getLocale()],0,40)}}...</a></h4>
                                            <span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-full"></i>
									</span>
                                        </div><!--media-body-->
                                    </div><!--media-->
                                @endforeach

                            </div><!--tab-pane-->
                        </div><!--tab-content-->
                    </div><!--tab-->

                    <div class="ad">
                        <img class="img-responsive" src="{{asset('assets/img/img-sitebar.jpg')}}" alt="img"/>
                        <img class="img-responsive" src="{{asset('assets/img/img-sitebar.jpg')}}" alt="img"/>
                        <img class="img-responsive" src="{{asset('assets/img/img-sitebar.jpg')}}" alt="img"/>
                        <img class="img-responsive" src="{{asset('assets/img/img-sitebar.jpg')}}" alt="img"/>
                    </div><!--ad-->

                    <div class="ad">
                        <img class="img-responsive" src="{{asset('assets/img/img-ad.jpg')}}" alt="img"/>
                    </div>

                    <div class="ad">
                        <img class="img-responsive" src="{{asset('assets/img/img-ad2.jpg')}}" alt="img"/>
                    </div>

                </div>
            </div>
    </section><!--feature_category_section-->
<!-- Footer Section -->
@include('include.footer')

<!--main-wrapper-->
</div>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>

<!-- Owl carousel -->
<script src="{{asset('assets/js/owl.carousel.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<!-- Theme Script File-->
<script src="{{asset('assets/js/script.js')}}"></script>

<!-- Off Canvas Menu -->
<script src="{{asset('assets/js/offcanvas.min.js')}}"></script>


</body>
</html>
