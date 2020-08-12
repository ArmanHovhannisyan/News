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
                    <form action="{{route('delete_img_news')}}" method="get">
                        @csrf
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

    <script>
        @if(!$hashtag->isEmpty())
            @foreach($hashtag as $id => $hash)
                var count = {{ $id+1 }};
                var value = "{{ $hash->name }}"
                var id = {{ $hash->id }}
                dynamic_field(count,value,id);
            @endforeach
        @else
            var count = 0;
            var value = ""
            var id = "";
            dynamic_field(count,value,id);
        @endif

        function dynamic_field(number,value,id)
        {

            html = '<tr>';

            if(number == 1 ){
                html += '<td><input type="text" name="hashtags[]" class="form-control" value="" /></td>';
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                $('tbody').html(html);
                html = '<tr>';
                html += '<td><input type="text" name="hashtags[]" class="form-control" value="' + value + ' " /></td>';

            }
            else {
                html += '<td><input type="text" name="hashtags[]" class="form-control" value="' + value + ' " /></td>';
            }



            if(number > 0)
            {
                html += '<td><button type="button" name="remove" id="'+id+'" class="btn btn-danger remove" >Remove</button></td></tr>';
                $('tbody').append(html);
            }
            else
            {
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                $('tbody').html(html);
            }
        }

        $(document).on('click', '#add', function(){
            count++;
            value = ""
            id = ""
            dynamic_field(count,value,id);
        });

        $(document).on('click', '.remove', function(){
            count--;
            id =  $(this).attr("id");
            if(id) {
                $.ajax({
                    url: "{{ route('news_delete_hashtag')}}",
                    type: "get",
                    data: {id: id},
                    success: function (data) {

                    }

                })


            }
            $(this).closest("tr").remove();
        });
    </script>

@endsection

