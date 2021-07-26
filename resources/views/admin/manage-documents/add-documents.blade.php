@extends('layouts.master-admin')
@section('title')
    Driver Details
@endsection
@section('css')
@endsection
@section('main-content')

<div class="col-md-1"></div>
    <div class="col-md-8">
        <div class="card-header text-center pt-3 mt-2">
            <h4>Add Required Documents</h4>
        </div>
        <form method="post" action="{{route('admin.documents.save')}}" validate="true">
        <div class="row pt-3">
                    <input type="hidden" name="document_img" value="Document Image">
                    <input type="hidden" name="edit_id" value="{{null}}">
                    @csrf
                    <div class="col-md-4">
                        <div class="form-group validate">
                            <label for="datepicker"> Document Title : </label>
                            <input id="datepicker" type="text" required maxlength="50" name="document_title" placeholder="Document Title" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group validate">
                            <label for="sel1">Applied On : </label>
                            <select class="form-control-lg" id="sel1" style="font-size: 0.9rem;" name="applied_on" required>
                                <option value=""> Select Applied </option>
                                <option value="driver"> Driver </option>
                                <option value="partner"> Partner </option>
                                <option value="vehicle"> Vehicle </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 p-0">
                        <div class="form-group">
                            <div class="button">
                                <div class="pull-right m-3">
                                    <button type="button" class="btn btn-danger btn-sm cancel-edit"><i class="fa fa-times"></i></button>
                                    <button type="submit" class="btn btn-dark" id="create_btn">Add New documents</button>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        </form>


        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
            <thead>
            <tr>
                <th> Sr #  </th>
                <th> Document Title </th>
                <th> Applied On </th>
                <th> Actions </th>
            </tr>
            </thead>
            <tbody>
            @php($counter = 1)

            @if(count($documents) > 0)
                @foreach($documents as $document)
                    <tr>
                        <td class="py-1">
                           {{$counter++}}
                        </td>
                        <td class="py-1">
                            {{$document->document_title}}
                        </td>
                        <td> {{$document->applied_on}} </td>

                        <td>
                            <div class="btn-group p-0" style="font-size: 1.6rem;">
                                <a id="{{$document->id}}" title="Edit"  href="#" class="p-1 edit-document" style="cursor: pointer">
                                    <i class="fa fa-edit"></i></a>
{{--                                <a id="{{$document->id}}" title="" href="{{url('admin/document-edit/')}}/{{$document->id}}" class="p-1 text-danger" style="cursor: pointer"><i class="fa fa-ban"></i></a>--}}
                                <a id="{{$document->id}}"  title="Delete" href="{{url('admin/document-delete/')}}/{{$document->id}}" class="p-1 text-dark"  style="cursor: pointer"><i class="fa fa-trash"></i></a>

                            </div>
                        </td>

                    </tr>

                @endforeach
            @else
                <h2>No Record Found</h2>
            @endif
            </tbody>
        </table>

    </div>





@endsection
@section('js')

    <script>
        $('.cancel-edit').hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.edit-document').click(function () {
            let id = $(this).attr('id');
            editDocument(id);
            $('.cancel-edit').show();
        });

        function editDocument(id){
            $.ajax({
                type: 'get',
                url: '{{url('admin/edit-document')}}/'+id,
                success: function (response) {
                    let document = response;
                    console.log(document);
                    $('input[name="edit_id"]').val(id);
                    $('input[name="document_title"]').val(document.document_title);
                    $('select[name="applied_on"]').val(document.applied_on);
                    $('#create_btn').html('Update Document');

                }
            });
        }


        $('.cancel-edit').click(function () {
            onCancelClick();
            $(this).hide();
        });

        function onCancelClick() {
            $('input[name="edit_id"]').val(null);
            $('input[name="document_title"]').val(null);
            $('select[name="applied_on"]').val(null);
            $('#create_btn').html('Create Document');
        }

    </script>
    <script src="{{asset('js/jquery-simple-validator.min.js')}}"></script>
@endsection
