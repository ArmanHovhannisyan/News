@extends('admin.layouts.app')

@section('title', 'News')

@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" style=" margin: 50px">
                                @foreach($news_list as $news)

                                <img class="card-img-top" src="{{asset('images/avatar/'.$news->avatar)}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{!!$news["title_".App::getLocale()]!!}</h5>
                                    <p class="card-text">{!!$news["short_description_".App::getLocale()]!!}</p>
                                    <p class="card-text">{!!$news["long_description_".App::getLocale()]!!}</p>
                                    <form id="form-delete" method="POST" action="{{route('news.destroy',$news->id)}}">
                                        <button class="btn btn-danger">Delete</button>
                                        @csrf
                                        {{ method_field('delete') }}

                                    </form>
                                    <a href="{{route('news.edit',$news->id)}}" class="btn btn-primary">Edit</a>

                                </div>
                                    @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

