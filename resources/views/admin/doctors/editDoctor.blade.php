@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
        <h1>ویرایش رکورد</h1>
        <hr>
         <form action="{{url('doctor', [$doctor->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
             <div class="col-md-6">
               <label for="profession" style="color: black">اسم دکتر</label>
               <input type="text" name="name" value="{{$doctor->name}}"  class="form-control"  placeholder="اسم دکتر" required>
             </div>
             <div class="col-md-6">
               <label for="profession" style="color: black">وظیفه</label>
               <input type="text" name="position" value="{{$doctor->position}}"  class="form-control"  placeholder="وظیفه" required>
             </div>
           </div>
          @include('layouts.errors')
         <button type="submit" class="btn btn-success">ویرایش رکورد</button>
         <button type="reset" class="btn btn-primary">لغو</button> 
        </form>
        <!--Form End -->
      </div>
  </div>
</div>
@endsection
