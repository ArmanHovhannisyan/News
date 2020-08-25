@extends('admin.layouts.app')

@section('title', 'Create')
@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" style="padding: 0 20px">
                                <div class="card-header">Add Category</div>
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
                                <div class="card-body card-block">
                                    <form action="{{route('category.store')}}" method="post" class="">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group">
                                            <div class="card-header">{{__('English')}}</div>
                                            <div class="input-group">
                                                <input type="text" name="name_en" placeholder="Category Name"
                                                       class="form-control" value="{{old('name_en')}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="card-header">{{__('Armenia')}}</div>
                                            <div class="input-group">
                                                <input type="text" value="{{old('name_hy')}}" name="name_hy" placeholder="Category Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="card-header">{{__('Russian')}}</div>
                                            <div class="input-group">
                                                <input type="text" value="{{old('name_ru')}}" name="name_ru" placeholder="Category Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-secondary btn-sm">Save</button>
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
