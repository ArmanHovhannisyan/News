@extends('admin.layouts.app')

@section('title', 'Admin')

@section('content')
    <div class="page-container" id="app">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($message = session('message'))
                                <div class="alert alert-success">{{ $message }}</div>
                            @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <form action="{{route('user.update',Auth::id())}}" method="POST">
                                @csrf
                                @method('put')
                            <div class="card">
                                <div class="card-header">Example Form</div>
                                <div class="card-body card-block">
                                    <form action="" method="post" class="">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input value="{{Auth::user()->name}}" type="text" id="username2" name="name" placeholder="Username" class="form-control">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input value="{{Auth::user()->email}}" type="email" id="email2" name="email" placeholder="Email" class="form-control">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input value="" type="password" id="password" name="password" placeholder="Password" class="form-control">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-asterisk"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
