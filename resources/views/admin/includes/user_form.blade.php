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

                                <form action="{{route('admin_info.update',$users->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{$users->id}}">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <div class="input-group">
                                            <input type="text" name="name" placeholder="User Name"
                                                   class="form-control" value="{{old('name',$users->name)}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>User email</label>
                                        <div class="input-group">
                                            <input type="text" value="{{old('email',$users->email)}}"
                                                   name="email"
                                                   placeholder="User Email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label>Status edit</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="status_id">
                                            @foreach($users->status->get() as $id => $status)
                                                <option
                                                    {{ $status->id  == $users->status_id ? 'selected' : '' }} value="{{ $status->id }}">{{$status->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="type_admin_id">
                                            @foreach($users->type_admin->get() as $id => $type_admin)
                                                <option
                                                    {{ $type_admin->id  == $users->type_admin_id ? 'selected' : '' }} value="{{ $type_admin->id }}">{!!$type_admin["name_".App::getLocale()]!!}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <br>
                                    <button class="btn btn-success">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
