@extends('layouts.app')

@section('title','إنشاء مشروع جديد')

@section('content')
   <div class="row justify-content-center text-right">
        <div class="col-8">
            <div class="card p-4">
                <h3  class="text-center pb5 font-weight-bold">
                    مشروع جديد
                </h3>
                <form action="/projects" method="POST" dir="rtl">
                @include('projects.form',['project'=> new App\Models\project()])
                    <div class="form-group d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary">إنشاء</button>
                        <a href="/projects" class="btn btn-light"> إلغاء</a>
                    </div> 
                </form>
            </div>    
        </div>
    </div> 

@endsection