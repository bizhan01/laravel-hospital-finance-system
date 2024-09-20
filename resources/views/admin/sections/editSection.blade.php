@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
        <h1>ویرایش بخش ها</h1>
        <hr>
         <form action="{{url('section', [$section->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="input-group">
           <input type="text" name="name" value="{{$section->name}}" class="form-control b-a" placeholder="اضافه نمودن بخش های موجود در شفاخانه" required>
           <span class="input-group-btn">
             <button type="submit" class="btn btn-success b-a">
               <i class="fa fa-save">  ذخیره کردن </i>
             </button>
             <button type="reset" class="btn btn-primary b-a">
               <i class="fa fa-refresh">لغو</i>
             </button>
           </span>
         </div>
          @include('layouts.errors')
        </form>
        <!--Form End -->
      </div>
  </div>
</div>
@endsection
