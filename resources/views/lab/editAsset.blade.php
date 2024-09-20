@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
        <h1>ویرایش رکورد</h1>
        <hr>
         <form action="{{url('asset', [$asset->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <input type="hidden" name="type" value="{{$asset->type}}">
         <div class="row form-group">
             <div class="col-md-3">
               <label for="profession" style="color: black">اسم جنس</label>
               <input type="text" name="item" value="{{$asset->item}}"  class="form-control" placeholder="اسم جنس"  required>
             </div>
             <div class="col-md-3">
               <label for="fullName" style="color: black">مدل</label>
               <input type="text" name="model" value="{{$asset->model}}" class="form-control" placeholder="مدل" >
             </div>
             <div class="col-md-3">
               <label for="profession" style="color: black">تعداد</label>
               <input type="text" name="quantity" value="{{$asset->quantity}}"  class="form-control" placeholder="تعداد" required>
             </div>
             <div class="col-md-3">
               <label for="profession" style="color: black">ملاحظات</label>
               <input type="text" name="description" value="{{$asset->description}}"  class="form-control" placeholder="ملاحظات" >
             </div>
           </div>
          @include('layouts.errors')
         <button type="submit" class="btn btn-success">ویرایش رکورد</button>
          <a href="/asset"><button type="reset" class="btn btn-primary">لغو</button> </a>
        </form>
        <!--Form End -->
      </div>
  </div>
</div>
@endsection
