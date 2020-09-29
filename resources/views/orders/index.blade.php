
@extends('layouts.app')
@section('content')

    @section('page_title')

        Orders

    @endsection

    <section class="content-header">
 
        </section>


        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Of Orders</h3>

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
                        <th>Client</th>
                        <th>Address</th>
                        <th>Total Cost</th>
                        <th>Order State</th>
                        <th>Show</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($records as $record)
                        <tr>
                          <td>{{$record->id}}</td>
                          <td>{{optional($record->client)->name}}</td>
                          <td>{{$record->address}}</td>
                          <td>{{$record->total_cost}}</td>
                          <td>{{$record->state}}</td>
                          <td class="text-center">
                            <a href="{{url(route('orders.show',$record->id))}}" class="btn btn-success btn-xs"><i class="fa fa-info"> Info </i></a>
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
