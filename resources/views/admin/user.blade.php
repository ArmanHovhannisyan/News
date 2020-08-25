@extends('admin.layouts.app')

@section('title', 'admin')

@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                    <tr>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>date</th>
                                        <th>status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr class="tr-shadow">
                                            <td>{{$user->name}}</td>
                                            <td>
                                                <span class="block-email">{{$user->email}}</span>
                                            </td>
                                            <td>2018-09-27 02:12</td>
                                            <td>
                                                <span class="status--process">{{$user->status->name}}</span>
                                            </td>
                                            <td>
                                                @if(Auth::user()->type_admin_id == 2)
                                                    <div class="table-data-feature">
                                                        <a href="{{route('admin_info.show',$user->id)}}" class="item"
                                                           data-toggle="tooltip" data-placement="top" title=""
                                                           data-original-title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>

                                                        <form action="{{route('admin_info.destroy',$user->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="item" type="submit" data-toggle="tooltip"
                                                                    data-placement="top"

                                                                    data-original-title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$users->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
