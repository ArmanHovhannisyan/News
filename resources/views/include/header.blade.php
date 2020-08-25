<header>
    <div class="container">
        @if ($message = session('message'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif
            @if ($message = session('block'))
                <div class="alert alert-danger">{{ $message }}</div>
            @endif
        <div class="top_ber">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_ber_left">
                        @guest
                            @else
                            @if (!Auth::guest())
                                <a href="{{ url('chat') }}">Chatting</a>
                            @endif
                        @endguest
                    </div><!--top_ber_left-->
                </div><!--col-md-6-->
                <div class="col-md-6">
                    <div class="top_ber_right">
                        <div class="top-menu">
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div><!--top-menu-->
                    </div><!--top_ber_left-->
                </div><!--col-md-6-->
            </div><!--row-->
        </div><!--top_ber-->

        <div class="header-section">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <a  href="{{route('home_news')}}"><img class="img-responsive" src="{{asset('assets/img/logo.png')}}" alt=""></a>
                    </div><!--logo-->
                </div><!--col-md-3-->

                <div class="col-md-6">
                    <div class="header_ad_banner">
                        <a  href="#"><img class="img-responsive" src="{{asset('assets/img/img_ad.jpg')}}" alt=""></a>
                    </div>
                </div><!--col-md-6-->

                <div class="col-md-3">
                    <div class="social_icon1">
                        <div class="sharethis-inline-follow-buttons"></div>
                    </div> <!--social_icon1-->
                </div><!--col-md-3-->
            </div> <!--row-->
        </div><!--header-section-->
    </div><!-- /.container -->

    <nav class="navbar main-menu navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="offcanvas">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="collapse navbar-collapse sidebar-offcanvas">
                <ul class="nav navbar-nav">
                    <li class="hidden"><a href="#"></a></li>

                        @foreach($categories as $id=> $category)
                            <li><a class="page-scroll" href="">{{$category["name_".App::getLocale()]}}</a></li>
                        @endforeach

{{--                    <li class="dropdown">--}}
{{--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a href="#">Action</a></li>--}}
{{--                            <li><a href="#">Another action</a></li>--}}
{{--                            <li><a href="#">Something else here</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                </ul>
                <div class="pull-right">
                    <form class="navbar-form" role="search" action="{{route('search')}}" method="get">
                        <div class="input-group">
                            <input value="{{Request()->q}}" class="form-control" placeholder="Search" name="q" type="text">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- .navbar -->
</header>
