@extends('front.master')
@section('content')

    <!----------------------------------------header-------------------------------------------------------->
    <section class="addoffer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center ">
                    <p>
                        اضافه عرض جديد

                    </p>
                </div>
            </div>
        </div>
    </section>

    <!---------------------------------------- previous-orders page-------------------------------------------------------->
    <section class="">
        <div class="container">
            <div class="row addofferpage">
                <div class="col-sm-12">
                    <form action="{{url(route('add-offer-save',auth('restaurant-web')->user()->id))}}" class="col-sm-6 offset-3 text-center" method="post" enctype="multipart/form-data">

                        @csrf <!-- {{ csrf_field() }} -->
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div>{{$error}}</div>
                            @endforeach
                        @endif

                        @include('flash::message')

                        <input name="title" placeholder="اسم المنتج" type="text" class="addofferinput">
                        <br>
                        <input name="content" placeholder=" وصف مختصر" type="text" class="addofferinput">
                        <br>
                        <input name="from" placeholder="تاريخ بدايه العرض" type="text" class="addofferinput">
                        <br>
                        <input name="to" placeholder=" تاريخ نهايه العرض" type="text" class="addofferinput">
                        <br>
                        <div class="marketimg text-left ">
                            تعديل صوره المستخدم
                            <img class="ml-3" src="{{asset('front/img/default-image.jpg')}}" id="upfile1" style="cursor:pointer;
                                width: 20%; margin-bottom: 20px;border:#dddddd 1px solid; box-shadow: #dddddd 1px 1px;" />
                            <input type="file" id="file1" name="photo" style="display:none" class="addofferinput" />
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success py-2 w-50"> اضافه</button>

                    </form>   
                </div>
            </div>
        </div>
    </section>

@endsection