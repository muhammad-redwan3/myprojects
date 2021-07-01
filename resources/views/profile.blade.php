@extends('layouts.app')

@section('title','الملف الشخصي')

 @section('content')
        <div class="row">
            <div class="col-6-md mx-auto">
                <div class="card p-5">
                    <div class="text-center">
                        {{--  يمكننا جلب الصور من قاعدة البيانات --}}
                        @if(auth()->user()->image!=null)
                        <img class="rounded" src="{{asset('/uploads/'. auth()->user()->image)}}" width="82px" height="50px" alt="">
                    @else
                     {{('قم بإضافة صورة  الشخصي')}}
                    @endif
                        <h3 class="p-4">{{ auth()->user()->name }}</h3>
                    </div>

                    <div class="card-body text-right" dir="rtl" >
                        <form action="/profile" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <div class="form-group">
                                <label for="name">الإسم</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}">

                                @error('name')
                                <div class="alert alert-danger" role="alert">
                                      {{$message}} 
                                </div>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">الإيميل </label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}">
                                @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}} 
                              </div>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">كلمة المرور </label>
                                <input type="password" name="password" id="password" class="form-control">

                                @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}} 
                              </div>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirmation">تأكيد كلمة المرور </label>
                                <input type="password" name="password-confirmation" id="password-confirmation" class="form-control">
                                @error('password-confirmation')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}} 
                              </div>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">تغيير الصورة الشخصية</label>
                                <div class="custom-file">
                                    <input type="file" name="image" id="image" class="custom-file-input">
                                    <label for ="image" id="image-label" class="custom-file-label"  data-browse="استعرض"> </label>
                                </div>

                                @error('image')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}} 
                              </div>
                            @enderror
                            </div>

                            <div class="from-group d-flex mt-5 flex-row-reverse">
                                <button type="submit" class="btn btn-primary mr-2">حفظ التعديلات</button>
                                <button type="submit" class="btn btn-light" form="logout">تسجيل الخروج </button>
                            </div>
                        </form>
                        <form action="/logout" id="logout" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
   
@endsection