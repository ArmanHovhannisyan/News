@extends('admin.layouts.app')

@section('title', 'Create')

@section('content')

    @include('admin.includes.edit_form')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Survey</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the image?
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="{{route('delete_img_news')}}" method="POST">
                        @csrf
                        {{ method_field('delete') }}
                        <button type="submit"  class="btn btn-danger ">Delete</button>
                        <input class="remove" type="hidden" name="img_path"  value="" >
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.del', function(){
            id =  $(this).attr("id");
            $('.remove').attr('value',id) ;

        })
    </script>



@endsection

