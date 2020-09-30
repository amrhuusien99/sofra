@extends('layouts.app')

@section('page_title')
  Orders
@endsection

@section('content')


<!-- Main content -->

<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Orders details</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      @include('flash::message')
        <div class="table-responsive">
          <table class="table table-bordered">

            <tr>
              <th class="text-center" width="40%">Id</th>
              <td class="text-center">{{$model->id}}</td>
            </tr>

            <tr>
                <th class="text-center">Client</th>
                <td class="text-center">{{optional($model->client)->name}}</td>
            </tr>
            
            <tr>
                <th class="text-center">Restaurant</th>
                <td class="text-center">{{optional($model->restaurant)->name}}</td>
            </tr>

            <tr>
                <th class="text-center">The Meal</th>
                <td class="text-center">{{optional($model->products)->name}}</td>
            </tr>

            <tr>
              <th class="text-center" width="40%">Note</th>
              <td class="text-center">{{$model->note}}</td>
            </tr>

            <tr>
              <th class="text-center" >Address</th>
              <td class="text-center">{{$model->address}}</td>
            </tr>

            <tr>
              <p style="line-height:1.1;"> 
                  @if( !$model->price == null)
                    <th class="text-center" >Product Price</th>
                    <td class="text-center">{{$model->price}}</td>
                  @else
                      
                  @endif
              </p>

              

            </tr>

            <tr>
              <th class="text-center">Quantity</th>
              <td class="text-center">{{$model->quantity}}</td>
            </tr>
            
            <tr>
              <th class="text-center">State</th>
              <td class="text-center">{{$model->state}}</td>
            </tr>

            <tr>
                <th class="text-center">Cost</th>
                <td class="text-center">{{$model->cost}}</td>
            </tr>

            <tr>
                <th class="text-center">Delivery Cost</th>
                <td class="text-center">{{$model->delivery_cost}}</td>
            </tr>

            <tr>
              <th class="text-center">Total Cost</th>
              <td class="text-center">{{$model->total_cost}}</td>
            </tr>
            
            <tr>
                <th class="text-center">Commission</th>
                <td class="text-center">{{$model->commission}}</td>
            </tr>

            <tr>
                <th class="text-center">Net</th>
                <td class="text-center">{{$model->net}}</td>
            </tr>

            <tr>
                <th class="text-center">Payment Method</th>
                <td class="text-center">{{optional($model->payment_method)->first()->name}}</td>
            </tr>

          </table>

        </div>


    </div>
    <!-- /.card-body -->

  </div>
  <!-- /.card -->

</section>
<!-- /.content -->


@endsection
