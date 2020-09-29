
@extends('layouts.app')
@section('content')

    @section('page_title')

        Roles

    @endsection

    <section class="content-header">
 
        </section>


        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Of Roles</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <a href="{{url(route('role.create'))}}" class="btn btn-primary mb-3"> <i class="fa fa-plus"> </i> Add Role</a>

              @include('flash::message')

              @if(count($records))
                <div calss="table-rseponsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Dispaly Name</th>
                        <th class="text-center">Edit</th>
                        <th class="text-center">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($records as $record)
                        <tr>
                          <td>{{$record->id}}</td>
                          <td>{{$record->name}}</td>
                          <td>{{$record->display_name}}</td>
                          <td class="text-center">
                            <a href="{{url(route('role.edit',$record->id))}}" class="btn btn-success btn-xs" class="fa fa-edit"> Edit </a>
                          </td>
                          <td class="text-center">
                            {!! Form::open([
                                'action' => ['RoleController@destroy',$record->id],
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
