@extends('admin.layouts.app')

@section('title', 'Create')
@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    @if($categoryies->count())
                    <div class="row">
                        <div class="col-lg-12" style="display: flex; justify-content: space-around; flex-wrap: wrap;"
                             id="hello">


                                @foreach($categoryies as $news)
                                    <div class="card" style="width: 18rem">
                                        <img class="card-img-top" src="{{asset('images/avatar/'.$news->avatar)}}"
                                             alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{!!$news["title_".App::getLocale()]!!}</h5>
                                            <p class="card-text">{!!$news["short_description_".App::getLocale()]!!}</p>
                                            <p class="card-text">{{Str::limit($news["long_description_".App::getLocale()], 25, $end = '...') }}</p>
                                            <a href="{{route('show_news',$news->id)}}" class="btn btn-primary">Show</a>
                                        </div>
                                    </div>
                                @endforeach


                        </div>
                        {{ $categoryies->links() }}
                    </div>
                    @else
                        <div class="card" style="padding: 8px">
                            <h3>
                                There is no news in this section</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
