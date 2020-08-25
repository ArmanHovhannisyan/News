<!DOCTYPE html>
<html lang="{!! App::getLocale() !!}">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('admin/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet"
          media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('admin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet"
          media="all">
    <link href="{{asset('admin/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Main CSS-->
    <link href="{{asset('admin/css/theme.css')}}" rel="stylesheet" media="all">

</head>
<body class="animsition">
<div class="page-wrapper">
    <!-- HEADER MOBILE-->


    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="{{url('index')}}">
                        <img src="{{asset('admin/images/icon/logo.png')}}" alt="CoolAdmin"/>
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub">
                        <a class="js-arrow" href="{{url('index')}}">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('/chart') }}">
                            <i class="fas fa-chart-bar"></i>Charts</a>
                    </li>
                    <li>
                        <a href="{{ url('/table') }}">
                            <i class="fas fa-table"></i>Tables</a>
                    </li>
                    <li>
                        <a href="{{url('form')}}">
                            <i class="far fa-check-square"></i>Forms</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Category</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            @if($categories)
                                @foreach($categories as $category)

                                    <li>
                                        <a href="{{route('category.show',$category->id)}}">{!!$category["name_".App::getLocale()]!!}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>

                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Edit Category</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            @if($categories)
                                @foreach($categories as $category)

                                    <li>
                                        <a href="{{route('category.edit',$category->id)}}">{!!$category["name_".App::getLocale()]!!}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>

                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-desktop"></i>UI Elements</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="{{url('cart')}}">Cards</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="#">
                <img src="{{asset('admin/images/icon/logo.png')}}" alt="Cool Admin"/>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="active has-sub">
                        <a class="js-arrow" href="{{route('news.index')}}">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Categories</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            @if($categories)
                                @foreach($categories as $category)

                                    <li>
                                        <a href="{{route('category.show',$category->id)}}">{!!$category["name_".App::getLocale()]!!}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>Edit Category</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            @if($categories)
                                @foreach($categories as $category)

                                    <li>
                                        <a href="{{route('category.edit',$category->id)}}">{!!$category["name_".App::getLocale()]!!}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="" href="{{route('category.create')}}">
                            <i class="fa fa-product-hunt"></i>Add Category</a>
                    </li>
                    <li class="has-sub">
                        <a class="" href="{{route('news.create')}}">
                            <i class="fa fa-product-hunt"></i>Add News</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-desktop"></i>UI Elements</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">

                            <li>
                            </li>
                        </ul>
                    </li>

                        <li class="has-sub">
                            <a class="" href="{{route('admin_info.index')}}">
                                <i class="fa fa-user"></i>User</a>
                        </li>
                    <li class="has-sub">
                        <a class="" href="{{route('user.create')}}">
                            <i class="fa fa-user"></i>Add User</a>
                    </li>

                    <li class="has-sub">
                        <a class="" href="{{route('admin.online')}}">
                            <i class="fa fa-user"></i>Online Chat</a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="get">
                        @csrf
                        <input class="au-input au-input--xl" type="text" name="q" id="q"
                               placeholder="Search for datas &amp; reports...">
                        <button class="au-btn--submit" id="search" type="button">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                    <div class="header-button">
                        <div class="noti-wrap">
                            <div class="noti__item js-item-menu">
                                <i class="zmdi zmdi-comment-more"></i>
                                <span class="quantity">1</span>
                                <div class="mess-dropdown js-dropdown">
                                    <div class="mess__title">
                                        <p>You have 2 news message</p>
                                    </div>
                                    <div class="mess__item">
                                        <div class="image img-cir img-40">
                                            <img src="{{asset('admin/images/icon/avatar-06.jpg')}}" alt="Michelle Moreno">
                                        </div>
                                        <div class="content">
                                            <h6>Michelle Moreno</h6>
                                            <p>Have sent a photo</p>
                                            <span class="time">3 min ago</span>
                                        </div>
                                    </div>
                                    <div class="mess__item">
                                        <div class="image img-cir img-40">
                                            <img src="{{asset('admin/images/icon/avatar-04.jpg')}}" alt="Diane Myers">
                                        </div>
                                        <div class="content">
                                            <h6>Diane Myers</h6>
                                            <p>You are now connected on message</p>
                                            <span class="time">Yesterday</span>
                                        </div>
                                    </div>
                                    <div class="mess__footer">
                                        <a href="#">View all messages</a>
                                    </div>
                                </div>
                            </div>
                            <div class="noti__item js-item-menu">
                                <i class="zmdi zmdi-email"></i>
                                <span class="quantity">1</span>
                                <div class="email-dropdown js-dropdown">
                                    <div class="email__title">
                                        <p>You have 3 New Emails</p>
                                    </div>
                                    <div class="email__item">
                                        <div class="image img-cir img-40">
                                            <img src="{{asset('admin/images/icon/avatar-06.jpg')}}" alt="Cynthia Harvey">
                                        </div>
                                        <div class="content">
                                            <p>Meeting about new dashboard...</p>
                                            <span>Cynthia Harvey, 3 min ago</span>
                                        </div>
                                    </div>
                                    <div class="email__item">
                                        <div class="image img-cir img-40">
                                            <img src="{{asset('admin/images/icon/avatar-05.jpg')}}" alt="Cynthia Harvey">
                                        </div>
                                        <div class="content">
                                            <p>Meeting about new dashboard...</p>
                                            <span>Cynthia Harvey, Yesterday</span>
                                        </div>
                                    </div>
                                    <div class="email__item">
                                        <div class="image img-cir img-40">
                                            <img src="{{asset('admin/images/icon/avatar-04.jpg')}}" alt="Cynthia Harvey">
                                        </div>
                                        <div class="content">
                                            <p>Meeting about new dashboard...</p>
                                            <span>Cynthia Harvey, April 12,,2018</span>
                                        </div>
                                    </div>
                                    <div class="email__footer">
                                        <a href="#">See all emails</a>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="noti__item js-item-menu">--}}
{{--                                <i class="zmdi zmdi-notifications"></i>--}}
{{--                                <span class="quantity">{{$user_a->count()}}</span>--}}
{{--                                <div class="notifi-dropdown js-dropdown">--}}
{{--                                    <div class="notifi__item">--}}
{{--                                        <div class="content">--}}
{{--                                            @foreach($user_a as $user_b)--}}
{{--                                                <p><a class="" href="{{route('admin.index')}}">--}}
{{--                                                   {{$user_b->name}}</a></p>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="notifi__footer">--}}
{{--                                        <a href="#">All notifications</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                {{--                                <div class="image">--}}
                                {{--                                </div>--}}
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{Auth::user()->name}}</a>
                                            </h5>
                                            <span class="email">{{Auth::user()->email}}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">


                                        <ul class="navbar-mobile__list list-unstyled">
                                            <li class="account-dropdown__item">
                                                <a class="js-arrow" href="#">
                                                    <i class="fas fa-copy"></i>Language</a>
                                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                                    <li>
                                                        <a href="{{ route('locale', 'ru') }}">Ru</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('locale', 'hy') }}">Hy</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('locale', 'en') }}">En</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>


                                        <div class="account-dropdown__item">
                                            <a href="{{route('user.index')}}">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                            <i class="zmdi zmdi-power"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@yield('content')



<!-- Jquery JS-->
    <script src="{{asset('admin/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('admin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('admin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('admin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <script src="{{asset('admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin/vendor/counter-up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('admin/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('admin/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->
