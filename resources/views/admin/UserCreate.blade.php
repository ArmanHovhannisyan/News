@extends('admin.layouts.app')

@section('title', 'Admin')

@section('content')
    <div class="page-container" id="app">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{route('user.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                           placeholder="User Name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp" name="email" placeholder="Enter email">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                           placeholder="Password" name="password">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1" name="type_admin_id">
                                        @foreach($type_admin as $type)
                                            <option value="{{$type->id}}">{!!$type["name_".App::getLocale()]!!}</option>

                                        @endforeach
                                    </select>
                                    <input type="hidden" value="2" name="status_id">
                                </div>
                                {{--        <div class="form-group">--}}
                                {{--            <select class="form-control" id="exampleFormControlSelect1" name="status">--}}
                                {{--                @foreach($statuses as $id => $status)--}}
                                {{--                    <option--}}
                                {{--                        {{ $status->id  == $users->status_id ? 'selected' : '' }} value="{{ $status->id }}">{{$status->name}}</option>--}}
                                {{--                @endforeach--}}
                                {{--            </select>--}}
                                {{--        </div>--}}

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
