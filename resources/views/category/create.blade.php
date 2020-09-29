@extends('layouts.app')
@inject('model','App\Models\Category')
@section('content')

    @section('page_title')

        Create Categories

    @endsection

    <section class="content-header">
 
        </section>


        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Create Categories</h3>

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
              </div>

                  {!! Form::model($model,[

                      'action' => 'CategoriesController@store'

                    ]) !!}

                  @include('category.form')

              {!! Form::close() !!} 
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
