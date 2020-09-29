@extends('front.master')
@section('content')

    <section class="contactus">
        <div class="container ">
            <div class="row">
                @isset($client_info)
                    @foreach($client_info as $client)
                        <form action="{{url(route('client-info-change',auth('client-web')->user()->id))}}" class="col-sm-6 offset-3 text-center" method="post" enctype="multipart/form-data">

                            @csrf <!-- {{ csrf_field() }} -->
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            @endif

                            @include('flash::message')

                            <div class="div my_account ">
                            <span class="myaccounticon "> <i class="fas fa-user-circle"></i></span>
                                <br>
                                <input name="name" value="{{$client->name}}" type="text">
                                <br>
                                <input name="email" value="{{$client->email}}" type="email">
                                <br>
                                <input name="phone" value="{{$client->phone}}" type="text">
                                <br>
                                <div class="marketimg text-left ">
                                تعديل صوره المستخدم
                                    <img class="ml-3" src="{{asset('front/img/default-image.jpg')}}" id="upfile1" style="cursor:pointer;
                                        width: 20%; margin-bottom: 20px;border:#dddddd 1px solid; box-shadow: #dddddd 1px 1px;" />
                                    <input type="file" id="file1" name="photo" style="display:none" class="addofferinput" />
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success py-2 w-50">احفظ التعديلات</button>
                            </div>
                        </form>
                    @endforeach    
                @endisset
                @isset($restaurant_info)
                    @foreach($restaurant_info as $restaurant)
                        <form action="{{url(route('restaurant-info-change',auth('restaurant-web')->user()->id))}}" class="col-sm-6 offset-3 text-center" method="post" enctype="multipart/form-data">

                            @csrf <!-- {{ csrf_field() }} -->
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            @endif

                            @include('flash::message')

                            <div class="div my_account ">
                            <span class="myaccounticon "> <i class="fas fa-user-circle"></i></span>
                                <br>
                                <input name="name" value="{{$restaurant->name}}" type="text">
                                <br>
                                <input name="email" value="{{$restaurant->email}}" type="email">
                                <br>
                                <input name="phone" value="{{$restaurant->phone}}" type="text">
                                <br>
                                <input name="minimum_order" value="{{$restaurant->minimum_order}}" type="text">
                                <br>
                                <input name="delivery_cost" value="{{$restaurant->delivery_cost}}" type="text">
                                <br>
                                <input name="whats_app" value="{{$restaurant->whats_app}}" type="text">
                                <br>
                                <input name="delivery_number" value="{{$restaurant->delivery_number}}" type="text">
                                <br>
                                <div class="marketimg text-left ">
                                تعديل صوره المستخدم
                                    <img class="ml-3" src="{{asset('front/img/default-image.jpg')}}" id="upfile1" style="cursor:pointer;
                                        width: 20%; margin-bottom: 20px;border:#dddddd 1px solid; box-shadow: #dddddd 1px 1px;" />
                                    <input type="file" id="file1" name="photo" style="display:none" class="addofferinput" />
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success py-2 w-50">احفظ التعديلات</button>
                            </div>
                        </form>
                    @endforeach    
                @endisset
            </div>
        </div>
    </section>

@endsection