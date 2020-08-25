@extends('admin.layouts.app')

@section('title', 'admin')

@section('content')

    <div class="page-container">
        <!-- HEADER DESKTOP-->


        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Room id</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($room as $id => $info)

                                @if(@$a != $info->user->id)
                                    {{$a = $info->user->id}}
                                    <tr>
                                        <th scope="row">{{$id + 1}}</th>
                                        <td>{{$info->user->name}}</td>
                                        <td>{{$info->user->id}}</td>
                                        <td><a href="{{route('online_chat',['user_id'=>$info->user->id])}}" class="btn btn-success">Join Chat</a></td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

@endsection
