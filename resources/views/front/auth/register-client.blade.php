@extends('front/master')
@section('content')

    <section class="reg-seller">
        <div class="container ">
            <div class="row">
                <form action="{{url(route('register-client-save'))}}" class="col-sm-8 offset-2 text-center" method="post" enctype="multipart/form-data">

                    @csrf <!-- {{ csrf_field() }} -->
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    @endif

                    <div class="sellerusericon">
                        <a href="">
                            <i class="far fa-user-circle"></i>
                        </a>
                    </div>
                    <div class="formdetail">
                        <input name="name" type="text" placeholder="الاسم">
                        <br>
                        <input name="email" type="email" placeholder="البريد الالكترونى">
                        <br>
                        <input name="phone" type="text" placeholder="الجوال">
                        <br>

                        <div style="width:600px;" class="input-group ml-5">
                            @inject('city','App\Models\City')

                            {!! Form::select('city_id',$city->pluck('name','id')->
                            toArray(),null,[

                                'class'=>'form-control',
                                'id' => 'cities',
                                'placeholder' => 'المدينه'

                            ]) !!}
                            
                            <!-- <i style="size:20px;" class="fas fa-chevron-down"></i> -->
                        </div>
                          <br/>

                        <div style="width:600px;" class="input-group ml-5">
                            @inject('region','App\Models\Region')

                            {!! Form::select('region_id',$region->pluck('name','id')->
                            toArray(),null,[

                                'class' => 'form-control',
                                'id' => 'regions',
                                'placeholder' => 'المنطقه'

                            ]) !!}

                            <!-- <i class="fas fa-chevron-down"></i> -->
                        </div>
                        <br>
                        
                        <input name="password" type="password" placeholder="كلمه المرور">
                        <br>
                        <input name="password_confirmation" type="password" placeholder="اعاده كلمه المرور">
                        <br>
                        <div class="marketimg text-left ">
                            صوره للمستخدم .. اختياري
                            <img src="{{asset('front/img/default-image.jpg')}}" id="upfile1" style="cursor:pointer;
                                     width: 20%; margin-bottom: 20px;border:#dddddd 1px solid;
                                    box-shadow: #dddddd 1px 1px;" />
                            <input type="file" id="file1" name="photo" style="display:none" class="addofferinput" />
                            <p>بانشاء حسابك ان توافق على
                                <a href="#">شروط الاستخدام</a>
                                الخاصه بسفره
                            </p>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success py-2 w-50">ارسال</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')

        <script>
            
            $("#cities").change(function(e){
                e.preventDefault();
                var city_id = $("#cities").val();
                // console.log(city_id);
                if(city_id){
                    $.ajax({
                        url : '{{url('api/v1/regions?city_id=')}}'+city_id,
                        type : 'get',
                        success : function(data){
                            if(data.status == 1){
                                // alert(city_id);
                                $("#regions").empty();
                                $("#regions").append('<option value=""> اختر المدينه </option>')
                                $.each(data.data, function(index, city){
                                    $("#regions").append('<option value="'+city.id+'">'+city.name+'</option>');
                                });
                            }
                        },

                        error : function( jqxhr, textStatus, errorMessage ) {

                            alert( errorMessage );
                        }
                    });

                }else{
                    $('#regions').empty();
                }

            });

        </script>

@endpush

@endsection