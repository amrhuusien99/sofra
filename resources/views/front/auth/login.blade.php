@extends('front/master')
@section('content')

    <section class="reg-seller">
        <div class="container ">
            <div class="row">
                <form action="{{url(route('login-check-front'))}}" class="col-sm-8 offset-2 text-center" method="post">

                    @csrf <!-- {{ csrf_field() }} -->
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    @endif


                    <div class="sellerusericon">
                        <a href="#">
                            <i class="far fa-user-circle"></i>
                        </a>
                    </div>
                    
                    <div class="formdetail regform">
                    
                        @include('flash::message')

                        <input name="email" type="email" placeholder="البريد الالكترونى">
                        <br>
                        <input name="password" type="password" placeholder="كلمه السر">
                        <br>
                        <button type="submit" class="btn btn-success py-2 w-50">ارسال</button>
                        <br>
                        <div class="row forgetpass">
                            <div class="col-sm-6 text-left">
                                <a href="{{url(route('register-restaurant'))}}"> بائع جديد ؟</a><br>
                                <a href="{{url(route('register-client'))}}"> مستخدم جديد ؟</a>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{url(route('front-reset-password'))}}">نسيت كلمه المرور ؟</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection