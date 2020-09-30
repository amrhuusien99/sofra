@extends('front.master')
@section('content')

    <section class="cart">
        <div class="container ">
            @if( auth()->guard('client-web')->check())

                @isset($productinfo)  
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <h3>{{$error}}</h3>
                        @endforeach
                    @endif

                    @include('flash::message')
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-sm-8 offset-2">
                            <form action="{{url(route('client-new-order',$productinfo->id))}}" method="post" enctype="multipart/form-data">

                                @csrf <!-- {{ csrf_field() }} -->

                                <div id="" class="row  cartitem">
                                    <div class="col-sm-4 ">
                                        <img src="{{ optional($productinfo)->photo }}" alt="">
                                    </div>
                                    <div class="col-sm-8 ">
                                        <input name="product[{{$productinfo->id}}][product_id]" type="hidden"  value="{{$productinfo->id}}"></input>
                                        <input name="restaurant_id" type="hidden"  value="{{optional($productinfo)->restaurant()->first()->id}}"></input>
                                        <h2> {{ optional($productinfo)->title }}</h2>
                                        <p style="line-height:1.1;"> 
                                            @if( !$productinfo->price_offer == null) 
                                                <p> تكلفه الوجبه : {{optional($productinfo)->price_offer}}--<del>{{optional($productinfo)->price}}</del></p>
                                                
                                            @else
                                                <p> تكلفه الوجبه : {{optional($productinfo)->price}}</p>
                                            @endif
                                        </p>
                                        <p> اسم المطعم : {{ optional($productinfo)->restaurant()->first()->name }}</p>
                                        <p> رقم المطعم : {{ optional($productinfo)->restaurant()->first()->phone }}</p>
                                        <input name="product[{{$productinfo->id}}][note]" style="width:400px;" type="text" placeholder="ملاحظات" class="form-control"></input>
                                        <br>
                                        <input name="address" style="width:400px;" type="text" placeholder="العنوان" class="form-control"></input>
                                        <br>
                                        <input name="product[{{$productinfo->id}}][quantity]" style="width:400px;" type="number" placeholder="الكميه" class="form-control"></input>
                                        <br>
                                        <div style="width:407px;" class="input-group">
                                            @inject('payment','App\Models\PaymentMethod')

                                            {!! Form::select('payment_id',$payment->pluck('name','id')->
                                            toArray(),null,[

                                                'class' => 'form-control',
                                                'placeholder' => 'اختر طريقه الدفع'

                                            ]) !!}

                                            <!-- <i class="fas fa-chevron-down"></i> -->
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-sm-12  text-center ">
                                        <button type="submit" class="col-sm-6 btn-success">
                                            <a style="text-decoration:none;color:fff;"><i class="far fa-times-circle"></i> تاكيد  </a>
                                        </button>
                                        <button class="col-sm-6">
                                            <a href="{{url(route('index'))}}" style="text-decoration:none;color:fff;"><i class="far fa-times-circle"></i> تجاهل </a>
                                        </button>
                                    </div>
                                </div>
                            </form>    
                        </div>
                    </div>
                @endisset
                @isset($productcart)  
                          
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <h3>{{$error}}</h3>
                        @endforeach
                    @endif

                    @include('flash::message')  

                    <div class="row">
                        <div class="col-sm-8 offset-2">
                            <form action="{{url(route('client-new-order-cart'))}}" method="post" enctype="multipart/form-data">

                                @csrf <!-- {{ csrf_field() }} -->
                                
                                @foreach($productcart as $productshow) 

                                    <div id="" class="row  cartitem">
                                        <div class="col-sm-4 ">
                                            <img src="{{ optional($productshow)->product()->first()->photo }}" alt="">
                                        </div>
                                        <div class="col-sm-8 ">
                                            <input name="product[{{$productshow->product()->first()->id}}][product_id]" type="hidden"  value="{{$productshow->product()->first()->id}}"></input>
                                            <input name="restaurant_id[]" type="hidden"  value="{{optional($productshow)->product()->first()->restaurant()->first()->id}}"></input>
                                            <h2> {{ optional($productshow)->product()->first()->title }}</h2>
                                            <p> اسم المطعم : {{ optional($productshow)->product()->first()->restaurant()->first()->name }}</p>
                                            <p> رقم المطعم : {{ optional($productshow)->product()->first()->restaurant()->first()->phone }}</p>
                                            <p style="line-height:1.1;"> 
                                                @if( !$productshow->price_offer == null) 
                                                    <p> تكلفه الوجبه : {{optional($productshow)->product()->first()->price_offer}}--<del>{{optional($productshow)->product()->first()->price}}</del></p>
                                                @else
                                                    <p> تكلفه الوجبه : {{optional($productshow)->product()->first()->price}}</p>
                                                @endif
                                            </p>
                                            <br>
                                            <input name="product[{{$productshow->product()->first()->id}}][note]" style="width:400px;" type="text" placeholder="ملاحظات" class="form-control"></input>
                                            <br>
                                            <input name="product[{{$productshow->product()->first()->id}}][quantity]" style="width:400px;" type="number" placeholder="الكميه" class="form-control"></input>
                                            <br>
                                        </div>
                                        <div class="col-sm-12  text-center">
                                            <button class="col-sm-4">
                                                <a href="{{url(route('product-cart-delete',$productshow->id))}}" style="text-decoration:none;color:fff;"><i class="far fa-times-circle"></i> مسح الطلب </a>
                                            </button>
                                        </div>
                                    </div>

                                @endforeach 
                                <div class="row">
                                    <div class="col-sm-12 ">     
                                        <div id="" class="row  cartitem">
                                            <div class="col-sm-8 text-center">
                                                <input style="width:400px;margin-right:180px;" name="address" style="width:400px;" type="text" placeholder="العنوان" class="form-control"></input>
                                                <br>
                                                <div style="width:407px;margin-right:180px;" class="input-group">
                                                    @inject('payment','App\Models\PaymentMethod')
                                                    {!! Form::select('payment_id',$payment->pluck('name','id')->
                                                    toArray(),null,[
                                                        'class' => 'form-control',
                                                        'placeholder' => 'اختر طريقه الدفع',
                                                        'id' => 'payment'
                                                    ]) !!}
                                                    <!-- <i class="fas fa-chevron-down"></i> -->
                                                </div>
                                                <br>     
                                                <div class="col-sm-12  text-center">
                                                    <button style="height:55px;width:450px;margin-right:245px;" type="submit" class="col-sm-6 btn-success">
                                                        <a style="text-decoration:none;color:fff;font-size:25px;"><i class="far fa-times-circle"></i> تاكيد الطلب </a>
                                                    </button>  
                                                </div>  
                                            </div>    
                                        </div>    
                                    </div>
                                </div>   
                            </form>    
                        </div>
                    </div>           
                @endisset
            @else                                
                <p style="background:#a30f02;color:fff;font-size:25px;" class="text-center"> Sorry You Are Not Login </p>
            @endif
        </div>
    </section>

    <!-- @push('scripts')
        <script>
            $(document).ready(function(){
                $('#address').on('keyup', function(){
                    $('#address').val($(this).val());
                });
                $('#payment').on('keyup', function(){
                    $('#payment').val($(this).val());
                });
            });
        </script>
    @endpush -->



    if( $request->restaurant_id[0] == $request->restaurant_id[1]){

@endsection