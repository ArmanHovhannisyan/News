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
                            @if ($error = session('error'))
                                <div class="alert alert-danger">{{ $error }}</div>
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
                                <form action="{{route('news.update',$news->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <select value="{{old('category_id',$news->category_id)}}" class="form-control"
                                            id="exampleFormControlSelect1" name="category_id">
                                        @foreach($categories as $id => $category)
                                            <option
                                                {{ $category->id  == $news->category_id ? 'selected' : '' }} value="{{ $category->id }}">{!!$category["name_".App::getLocale()]!!}</option>
                                        @endforeach
                                    </select>

                                    <div class="form-group">
                                        <label>News Name</label>
                                        <div class="card-header">{{__('English')}}</div>
                                        <div class="input-group">
                                            <input type="text" name="title_en" placeholder="News Name"
                                                   class="form-control" value="{{old('title_en',$news->title_en)}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="card-header">{{__('Armenia')}}</div>
                                        <div class="input-group">
                                            <input type="text" value="{{old('title_hy',$news->title_hy)}}"
                                                   name="title_hy"
                                                   placeholder="News Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="card-header">{{__('Russian')}}</div>
                                        <div class="input-group">
                                            <input type="text" value="{{old('title_ru',$news->title_ru)}}"
                                                   name="title_ru"
                                                   placeholder="News Name" class="form-control">
                                        </div>
                                    </div>

                                    <label>Short Description</label>
                                    <div class="form-group">

                                        <label>En</label>
                                        <div class="input-group">


                                            <textarea class="ckeditor form-control"
                                                      name="short_description_en">{{old('short_description_en',$news->short_description_en)}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Ru</label>
                                        <div class="input-group">

                                            <textarea class="ckeditor form-control"
                                                      name="short_description_ru">{{old('short_description_en',$news->short_description_ru)}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Hy</label>
                                        <div class="input-group">

                                            <textarea class="ckeditor form-control"
                                                      name="short_description_hy">{{old('short_description_en',$news->short_description_hy)}}</textarea>
                                        </div>
                                    </div>

                                    <div class="name" >
                                        <div class="form-group">
                                            <div class="card-header">{{__('English')}}</div>
                                            <div class="input-group">
                                                    <textarea name="long_description_en" class="ckeditor form-control"
                                                              value="" cols="30"
                                                              rows="10">{{old('long_description_en',$news->long_description_en)}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="card-header">{{__('Armenia')}}</div>
                                            <div class="input-group">
                                                    <textarea name="long_description_ru" class="ckeditor form-control"
                                                              value="" cols="30"
                                                              rows="10">{{old('long_description_ru',$news->long_description_ru)}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="card-header">{{__('Russian')}}</div>
                                            <div class="input-group">
                                                    <textarea name="long_description_hy" class="ckeditor form-control"
                                                              value="" cols="30"
                                                              rows="10">{{old('long_description_hy',$news->long_description_hy)}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Add Image</label>
                                        <input type="file" name="avatar" class="form-control-file"
                                               id="exampleFormControlFile1" value="{{$news->avatar}}">
                                        <br>
                                        <img src="{{asset('images/avatar/'.$news->avatar)}}" width="100px">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">News pictures</label>
                                        <input type="file" name="image_path[]" class="form-control-file"
                                               id="exampleFormControlFile1" multiple>
                                    </div>
                                    <div class="form-group">
                                        <label>Pictures</label>
                                        <div class="row">
                                            @foreach ($news->image as $id => $imgs)
                                                <div class="col-4">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body text-center">
                                                            <img src="{{ asset('images/'.$imgs->image_path) }}"
                                                                 width="128"
                                                                 height="128"
                                                                 alt="">
                                                        </div>
                                                        <div class="panel-footer text-center">
                                                            <button type="button" class="btn btn-danger del"
                                                                    id="{{$imgs->id}}" data-toggle="modal"
                                                                    data-target="#exampleModal">Delete Image
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
