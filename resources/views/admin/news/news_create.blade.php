@extends('admin.layouts.app')

@section('title', 'Create')
@section('content')

    @include('admin.includes.create_form')

    <script>
        var count = 1;
        dynamic_field(count);

        function dynamic_field(number) {
            html = '<tr>';

            html += '<td><input type="text" name="hashtags[]" class="form-control"/></td>';

            if (number > 1) {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                $('tbody').append(html);
            } else {
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                $('tbody').html(html);
            }
        }

        $(document).on('click', '#add', function () {
            count++;
            value = ""
            dynamic_field(count, value);
        });

        $(document).on('click', '.remove', function () {
            count--;
            $(this).closest("tr").remove();
        });
    </script>
@endsection
