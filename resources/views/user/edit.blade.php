@inject('role','App\Models\Role')
<?php
  $roles = $role->pluck('display_name','id')->toArray();
?>
@extends('layouts.app')
@section('content')

    @section('page_title')

        Edit User

    @endsection

    <section class="content-header">
 
        </section>


        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit User</h3>

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
                  {!! Form::model($model,[

                      'action' => ['UsersController@update',$model->id],
                      'method' => 'put' 

                    ]) !!}
                      <div class="form-group">
                        <label for="name">Name</label>
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                      </div>   
                      <div class="form-group">
                        <label for="email">Email</label>
                            {!! Form::email('email',null,['class'=>'form-control']) !!}
                      </div> 
                      <div class="form-group">
                        <label for="phone">Phone</label>
                            {!! Form::text('phone',null,['class'=>'form-control']) !!}
                      </div> 
                      <div class="form-group">
                        <label for="photo">Photo</label><br>
                            {!! Form::file('photo',null,['class'=>'form-control']) !!}
                      </div> 
                      <div class="form-group">
                        <label for="roles_list">Rank The Users</label>
                          {!! Form::select('roles_list[]',$roles,null,[
                          'class'=>'form-control',
                          'multiple'=>'multiple'
                          ]) !!}
                      </div>
                      <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
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
