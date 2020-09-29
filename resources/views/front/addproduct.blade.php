@extends('front.master')
@section('content')

    <section class="addoffer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center ">
                    <p>
                        اضافه منتج جديد

                    </p>
                </div>
            </div>
        </div>
    </section>

    <!---------------------------------------- add new product page-------------------------------------------------------->
    <section class="">
        <div class="container">
            <div class="row ">
                <div class="col-sm-8 offset-2 addproductpage text-center">
                    <form action="{{url(route('add-product-save',auth('restaurant-web')->user()->id))}}" class="col-sm-6 offset-3 text-center" method="post" enctype="multipart/form-data">
                        
                        @csrf <!-- {{ csrf_field() }} -->
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div>{{$error}}</div>
                            @endforeach
                        @endif

                        @include('flash::message')

                        <input name="title" type="text" placeholder="اسم المنتج" class="addofferinput">
                        <br>
                        <textarea name="content" cols="44" rows="5" placeholder="وصف مختصر" class="addofferinput"></textarea>
                        <br>
                        <input name="price" type="text" placeholder="السعر" class="addofferinput">
                        <br>
                        <input name="processing_time" type="text" placeholder="مده التجهيز" class="addofferinput">
                        <br>
                        <input name="price_offer" type="text" placeholder="سعر العرض" class="addofferinput">
                        <br>
                        <div style="font-size:25px;:15px;" class="marketimg text-left">
                            صوره المنتج
                            <img class="ml-3" src="{{asset('front/img/default-image.jpg')}}" id="upfile1" style="cursor:pointer;
                                width: 20%; margin-bottom: 20px;border:#dddddd 1px solid; box-shadow: #dddddd 1px 1px;" />
                            <input type="file" id="file1" name="photo" style="display:none" class="addofferinput" />
                        </div>
                        <button type="submit" class="btn btn-success py-2 w-50">اضافه</button>
                        <br>

                    </form> 
                </div>   
            </div>
        </div>
    </section>

@endsection