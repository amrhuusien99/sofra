
@extends('layouts.app')
@section('content')

    @section('page_title')

        Users

    @endsection

    <section class="content-header">
 
        </section>


        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Of Users</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <a href="{{url(route('users.create'))}}" class="btn btn-primary mb-3"> <i class="fa fa-plus"> </i> Add User</a>

              @include('flash::message')

              @if(count($records))
                <div calss="table-rseponsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Photo</th>
                        <th>Rank The Users</th>
                        <th class="text-center">Edit</th>
                        <th class="text-center">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($records as $record)
                        <tr>
                          <td>{{$record->id}}</td>
                          <td>{{$record->name}}</td>
                          <td>{{$record->email}}</td>
                          <td>{{$record->phone}}</td>
                          <td>
                            <img src="{{asset($record->photo)}}" style="width: 80px; height: 60px;">
                          </td>
                          <td>
                            @foreach($record->roles as $role)
                                   {{$role->display_name}}
                            @endforeach
                          </td>
                          <td class="text-center">
                            <a href="{{url(route('users.edit',$record->id))}}" class="btn btn-success btn-xs" class="fa fa-edit"> Edit </a>
                          </td>
                          <td class="text-center">
                            {!! Form::open([
                                'action' => ['UsersController@destroy',$record->id],
                                'method' => 'delete'
                              ]) !!}

                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-alt"></i>

                                </button>

                            {!! Form::close() !!}  
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
              <div id="confirmModel" class="model fade" role="dialog"> 
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
            </div>
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
                                
    var category_id;

    $(document).on('click', '.delete', function(){
        category_id = $(this).attr('id');
        $('#confirmModel').model('show');
    });
    $('#ok_button').click(function()P{
        $.ajax({
            url:"category.destroy"+category_id,
            beForeSend:function(){
                $('#ok_button').text('Deleteing...');
            },
            success:function(data){

                setTimeout(function(){
                    $('#confirmModel').model('show');
                    $('#user_table').DataTable().ajax.reload();
                },1000);
            }
        })
    });

@endpush
