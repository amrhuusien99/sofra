@extends('front.master')
@section('content')

    <section class="contactus">
        <div class="container ">
            <div class="row">
                <form class="col-sm-6 offset-3 text-center" action="{{url(route('contact-save'))}}" method="post" enctype="multipart/form-data">

                    @csrf <!-- {{ csrf_field() }} -->
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    @endif
                    
                    @include('flash::message')
                    
                    <div class="div ">
                        <p>تواصل معنا</p>
                        <input name="name" type="text" placeholder="الاسم">
                        <br>
                        <input name="email" type="email" placeholder="البريد الالكترونى">
                        <br>
                        <input name="phone" type="text" placeholder=" الجوال">
                        <br>
                        <textarea name="message" rows="5" placeholder="ماهى رسالتك"></textarea>
                        <br>
                        <div class="input-group ml-5">
                            <label style="color:fff;" for="type_of_message">اختر تصنيف الرساله :</label>
                            <select class="ml-2" style="width:300px;" name="type_of_message">
                                <option>اختر</option>
                                <option value="complaint">Complaint</option>
                                <option value="suggestion">Suggestion</option>
                                <option value="enquiry">Enquiry</option>
                            </select>
                        </div>
                        <br>
                        <button>احفظ التعديلات</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


@endsection