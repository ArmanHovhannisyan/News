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

                                <form action="{{route('admin.update',$users->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf


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
                                    <label>Status edit</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="status">
                                        @foreach($statuses as $id => $status)
                                            <option
                                                {{ $status->id  == $users->status_id ? 'selected' : '' }} value="{{ $status->id }}">{{$status->name}}</option>
                                        @endforeach
                                    </select>
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
