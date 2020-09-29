
@extends('layouts.app')
@section('content')

    @section('page_title')

        Contacts

    @endsection

    <section class="content-header">
 
        </section>


        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Of Contacts</h3>

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
                        <th>Message</th>
                        <th>Message type</th>
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
                          <td>{{$record->message}}</td>
                          <td>{{$record->type_of_message}}</td>
                          <td class="text-center">
                            {!! Form::open([
                                'action' => ['ContactsController@destroy',$record->id],
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
