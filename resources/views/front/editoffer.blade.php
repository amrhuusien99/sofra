@extends('front.master')
@section('content')

    <!----------------------------------------header-------------------------------------------------------->
    <section class="addoffer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center ">
                    <p>
                        تعديل عرض جديد

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
                    @isset($resOffers)
                        @foreach($resOffers as $offer)

                            <form action="{{url(route('offer-edit-save',$offer->id))}}" class="col-sm-6 offset-3 text-center" method="post" enctype="multipart/form-data">

                                @csrf <!-- {{ csrf_field() }} -->
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div>{{$error}}</div>
                                    @endforeach
                                @endif

                                @include('flash::message')

                                <input name="title" value="{{optional($offer)->title}}" type="text" class="addofferinput">
                                <br>
                                <input name="content" value="{{optional($offer)->content}}" type="text" class="addofferinput">
                                <br>
                                <input name="from" value="{{optional($offer)->from}}" type="text" class="addofferinput">
                                <br>
                                <input name="to" value="{{optional($offer)->to}}" type="text" class="addofferinput">
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
                        @endforeach   
                    @else                                
                    <p style="background:#a30f02;color:fff;font-size:25px;" class="text-center"> Sorry Not Found Data </p>
                    @endisset
                </div>
            </div>
        </div>
    </section>

@endsection