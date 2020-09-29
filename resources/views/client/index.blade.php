
@extends('layouts.app')
@section('content')

    @section('page_title')

        Clients

    @endsection

    <section class="content-header">
 
        </section>


        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Of Clients</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">

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
                        <th>Region</th>
                        <th>Is Activate</th>
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
                          <td>{{optional($record->region)->name}}</td>
                          <td class="text-center">
                              @if($record->is_activate)
                                  <a href="{{url(route('clients.deactivate',$record->id))}}"
                                     class="btn btn-danger btn-xs">إلغاء التفعيل</a>
                              @else
                                  <a href="{{url(route('clients.activate',$record->id))}}"
                                     class="btn btn-success btn-xs">تفعيل</a>
                              @endif
                          </td>
                          <td class="text-center">
                            {!! Form::open([
                                'action' => ['ClientsController@destroy',$record->id],
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
            <!-- /.card-body -->
            <!--<div class="card-footer">
              Footer
            </div> -->
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

        </section>
@endsection
