
@extends('layouts.app')
@section('content')

    @section('page_title')

        Categories

    @endsection

    <section class="content-header">
 
        </section>


        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Of Categories</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <a href="{{url(route('categories.create'))}}" class="btn btn-primary mb-3"> <i class="fa fa-plus"> </i> Add Categories</a>

              @include('flash::message')

              @if(count($records))
                <div calss="table-rseponsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th class="text-center">Edit</th>
                        <th class="text-center">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($records as $record)
                        <tr>
                          <td>{{$record->id}}</td>
                          <td>{{$record->name}}</td>
                          <td class="text-center">
                            <a href="{{url(route('categories.edit',$record->id))}}" class="btn btn-success btn-xs" class="fa fa-edit"> Edit </a>
                          </td>
                          <td class="text-center">
                              <!-- <button class="btn btn-danger btn-xs" onclick="deleteConfirmation({{$record->id}})">
                                <i class="fa fa-trash-alt"></i>
                              </button> -->
                              <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $record->id }}" data-action="{{url(route('delete-category',$record->id))}}"> Delete</button>
                          </td>
                        </tr>  
                      @endforeach  
                    </tbody>
                  </table>
                </div> 
                @else
                  <div class="alert alert-danger" role="alert">
                    No Data
                  </div>
              @endif
              <!-- <div id="confirmModel" class="model fade" role="dialog"> 
                <div class="model-dialog">
                  <div class="model-content" >
                    <div class="model-header" >
                      <button type="button" class="close" data-dismiss="model">
                          &times;
                      </button>
                      <h2 class="model-title">Confirmation</h2>
                    </div>
                    <div class="model-body">
                        <h4 aline="centre" style="margin:0;">
                            Are You Sure You Want To Remove This Data ?
                        </h4>
                    </div>
                    <div class="model-footer" >
                        <button type="button" class="btn btn-danger" name="ok_button" id="ok_button">Ok</button>
                        <button type="button" class="btn btn-default" data-dismiss="model">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- /.card-body -->
            <!--<div class="card-footer">
              Footer
            </div> -->
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

        </section>
@endsection

@push('scripts')
                                
<script type="text/javascript">

  $("body").on("click",".remove-user",function(){
      var current_object = $(this);
      swal({
          title: "Are you sure?",
          text: "You will not be able to recover this imaginary file!",
          type: "error",
          showCancelButton: true,
          dangerMode: true,
          cancelButtonClass: '#DD6B55',
          confirmButtonColor: '#dc3545',
          confirmButtonText: 'Delete!',
      },function (result) {
          if (result) {
              var action = current_object.attr('data-action');
              var token = jQuery('meta[name="csrf-token"]').attr('content');
              var id = current_object.attr('data-id');

              $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
              $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
              $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
              $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
              $('body').find('.remove-form').submit();
          }
      });
  });

</script>

@endpush
