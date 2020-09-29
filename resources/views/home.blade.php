
@extends('layouts.app')

@section('content')

    @section('page_title')

        Sofra

    @endsection

    <section class="content-header">
                <div class="row">

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Clients</span>
                                <span class="info-box-number"></span>
                            </div>
                           <!-- /.info-box-content -->
                        </div>
                    <!-- /.info-box -->
                    </div> 

                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                          <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">Restaurants</span>
                            <span class="info-box-number"></span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>    
        </section>


        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Title</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
                You are logged in !
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              Footer
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

        </section>
@endsection
