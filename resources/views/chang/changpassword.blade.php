@extends('layouts.app')
@section('content')

    @section('page_title')
      Chang Password
    @endsection

    <section class="content-header">
 
        </section>


        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Chang Password</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">

              <div class="card-body">
                @include('partials.validation_errors')
                @include('flash::message')
              </div>
                   {!! Form::open([

                      'action' => ['UsersController@changpasswordsave'],
                      'method' => 'post'
                    ]) !!}

                    <div class="form-group">
                      <label for="old-password">Old Password</label>
                        <input type="password" name="old-password" class="form-control" >
                      <label for="password">New Password</label>
                        <input type="password" name="password" class="form-control" >
                      <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" >
                    <br>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>

                    </div>
                {!! Form::close() !!} 
            <!-- /.card-body -->
            <!--<div class="card-footer">
              Footer
            </div> -->
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

        </section>

@endsection
