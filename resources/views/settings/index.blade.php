
@extends('layouts.app')
@section('content')

    @section('page_title')

        Settings

    @endsection

    <section class="content-header">
 
        </section>


        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Of Setting</h3>

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
                        <th>Email</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Insta</th>
                        <th>Bank Account</th>
                        <th>Commission</th>
                        <th class="text-center">Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($records as $record)
                        <tr>
                          <td>{{$record->id}}</td>
                          <td>{{$record->email}}</td>
                          <td>{{$record->facebook}}</td>
                          <td>{{$record->twitter}}</td>
                          <td>{{$record->insta}}</td>
                          <td>{{$record->bank_account}}</td>
                          <td>{{$record->commission}}</td>
                          <td class="text-center">
                            <a href="{{url(route('settings.edit',$record->id))}}" class="btn btn-success btn-xs" class="fa fa-edit"> Edit </a>
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
