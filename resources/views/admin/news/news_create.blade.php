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
                                <div class="card-header">Add News</div>
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
                                    <label>Category</label>
                                    <form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                            @foreach($categories as $id => $category)
                                                <option
                                                    {{ $category->id  == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">{!!$category["name_".App::getLocale()]!!}</option>
                                            @endforeach
                                        </select>

                                        <div class="form-group">
                                            <label>News Name</label>
                                            <div class="card-header">{{__('English')}}</div>
                                            <div class="input-group">
                                                <input type="text" name="title_en" placeholder="News Name"
                                                       class="form-control" value="{{old('title_en')}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="card-header">{{__('Armenia')}}</div>
                                            <div class="input-group">
                                                <input type="text" value="{{old('title_hy')}}"
                                                       name="title_hy"
                                                       placeholder="News Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="card-header">{{__('Russian')}}</div>
                                            <div class="input-group">
                                                <input type="text" value="{{old('title_ru')}}"
                                                       name="title_ru"
                                                       placeholder="News Name" class="form-control">
                                            </div>
                                        </div>

                                        <label>Short Description</label>
                                        <div class="form-group">

                                            <label>En</label>
                                            <div class="input-group">
                                            <textarea class="ckeditor form-control"
                                                      name="short_description_en">{{old('short_description_en')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Ru</label>
                                            <div class="input-group">

                                            <textarea class="ckeditor form-control"
                                                      name="short_description_ru">{{old('short_description_en')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Hy</label>
                                            <div class="input-group">

                                            <textarea class="ckeditor form-control"
                                                      name="short_description_hy">{{old('short_description_en')}}</textarea>
                                            </div>
                                        </div>

                                        <div class="name" >
                                            <div class="form-group">
                                                <div class="card-header">{{__('English')}}</div>
                                                <div class="input-group">
                                                    <textarea name="long_description_en" class="ckeditor form-control"
                                                              value="" cols="30"
                                                              rows="10">{{old('long_description_en')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="card-header">{{__('Armenia')}}</div>
                                                <div class="input-group">
                                                    <textarea name="long_description_ru" class="ckeditor form-control"
                                                              value="" cols="30"
                                                              rows="10">{{old('long_description_ru')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="card-header">{{__('Russian')}}</div>
                                                <div class="input-group">
                                                    <textarea name="long_description_hy" class="ckeditor form-control"
                                                              value="" cols="30"
                                                              rows="10">{{old('long_description_hy')}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Add Image</label>
                                            <input type="file" name="avatar" class="form-control-file"
                                                   id="exampleFormControlFile1">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">News pictures</label>
                                            <input type="file" name="image_path[]" class="form-control-file"
                                                   id="exampleFormControlFile1" multiple>
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

@endsection
