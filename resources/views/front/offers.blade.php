@extends('front.master')
@section('content')

    <section class="searchresturant">
        <h1>قائمه العروض</h1>
        <div class="container">
            @include('flash::message');
            <div class="row">
                @isset($resOffers)
                    @foreach($resOffers as $offer)
                        <div class="col-sm-6">
                            <div  class="searchresturantitem">
                                <div  style="max-height:200px;">
                                    <div class="row ">
                                        <div class="col-sm-3">
                                            <img  style="max-height:200px;" src="{{optional($offer)->photo}}" alt="">
                                        </div>
                                        <div id="{{optional($offer)->id}}" class="col-sm-9 resturantdetail"> 
                                            <h3 style="line-height:1.1;"> {{optional($offer)->title}} </h3>
                                            <p style="line-height:1.1;">مكونات الوجبه : {{optional($offer)->content}}</p>
                                            <p style="line-height:1.1;">اسم المطعم : {{optional($offer)->restaurant()->first()->name}}</p>
                                            <p style="font-size:18px;line-height:1.1;" >مده العرض : {{optional($offer)->from}} -- {{optional($offer)->to}}</p>
                                            @if( auth()->guard('restaurant-web')->check())
                                                <a style="text-decoration:none;" href="{{url(route('offer-edit',$offer->id))}}" class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                                                <a style="text-decoration:none;" href="{{url(route('offer-delete',$offer->id))}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach    
                @endisset
                @isset($offersall)
                    @foreach($offersall as $offer)
                        <div class="col-sm-6">
                            <div  class="searchresturantitem">
                                <div  style="max-height:200px;">
                                    <div class="row ">
                                        <div class="col-sm-3">
                                            <img  style="max-height:140px;" src="{{optional($offer)->photo}}" alt="">
                                        </div>
                                        <div id="{{optional($offer)->id}}" class="col-sm-9 resturantdetail">
                                            <h3 style="line-height:1.1;"> {{optional($offer)->title}} </h3>
                                            <p style="line-height:1.1;">مكونات الوجبه : {{optional($offer)->content}}</p>
                                            <p style="line-height:1.1;">اسم المطعم : {{optional($offer)->content}}</p>
                                            <p style="font-size:18px;line-height:1.1;" >مده العرض : {{optional($offer)->from}} -- {{optional($offer)->to}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach    
                @endisset
            </div>
        </div>
        </div>
    </section>
    

@endsection