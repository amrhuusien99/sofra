@extends('front.master')
@section('content')

    <section class="previous-orders">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 selectorder selectmyorder">
                    <button> <a style="text-decoration:none;color:fff;" href="{{url(route('client-orders-current',auth('client-web')->user()->id))}}" > طلبات حاليه </a> </button>
                </div>
                <div class="col-sm-6 selectorder selectmyorder">
                    <button> <a style="text-decoration:none;color:fff;" href="{{url(route('client-orders-previous-requests',auth('client-web')->user()->id))}}" > طلبات سابقه </a> </button>
                </div>
            </div>
        </div>
    </section>

    <!---------------------------------------- previous-orders page-------------------------------------------------------->
    <section class="searchresturant">
        <div class="container">
            <div class="row ">
                @isset($current)
                    @foreach($current as $order) 
                        @include('flash::message')
                        <div class="col-sm-12 mt-4">
                            <div class="previousorderitem">
                                <div class="row ">
                                    <div class="col-sm-4 currentorderimg">
                                        <img src="{{optional($order)->products()->first()->photo}}" alt="">
                                    </div>
                                    <div class="col-sm-8 myprevorderitem">
                                        <h3>اسم المطعم : {{optional($order)->restaurant()->first()->name}} </h3>
                                        <p> الرقم : {{optional($order)->restaurant()->first()->phone}} </p>
                                        <p> اسم الوجبه  : {{optional($order)->products()->first()->title}} </p>
                                        <p> رقم الطلب : {{optional($order)->id}} </p>
                                        <p>
                                            @if( !$order->note == null) 
                                                <p> ملاحظات : {{optional($order)->note}}</p>
                                            @else

                                            @endif
                                        </p>
                                        <p>عدد الوجبات : {{optional($order)->quantity}}</p>
                                        <p>المجموع : {{optional($order)->total_cost}}</p>
                                        <p>العنوان : {{optional($order)->address}}</p>
                                        <p> الدفع : {{optional($order)->payment_method()->first()->name}} </p>
                                        <p>حاله الطلب : <i style="font-size:20;" class="btn btn-info" > {{optional($order)->state}} </i> </p>

                                    </div>
                                    <div class="col-sm-12   mypreviousorderbutt " style="margin-top:20px;margin-right:200px;">
                                        <div class="row neworder">
                                            @if( $order->state == 'delivered') 
                                                <div class="col-sm-4 col-6 text-center neworderconfirm">
                                                    <button> <a style="text-decoration:none;color:fff;" href="{{url(route('client-confirm-order',$order->id))}}"> استلام </a> </button>
                                                </div>
                                                <div class="col-sm-4 col-6 text-left neworderreject">
                                                    <button style="background: #240041;"> <a style="text-decoration:none;color:fff;" href="{{url(route('client-declined-order',$order->id))}}" > رفض </a> </button>
                                                </div>
                                                @else
                                                <div style="margin-right:300;" class="col-sm-4 col-6 text-left neworderreject">
                                                    <button style="background: #240041;"> <a style="text-decoration:none;color:fff;" href="{{url(route('client-declined-order',$order->id))}}" > رفض </a> </button>
                                                </div>
                                            @endif    

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