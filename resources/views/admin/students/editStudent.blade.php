@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
        <h1>ویرایش رکورد</h1>
        <hr>
         <form action="{{url('student', [$student->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
             <div class="col-md-6">
               <label for="profession" style="color: black">اسم محصل</label>
               <input type="text" name="stdName" value="{{$student->stdName}}"  class="form-control" placeholder="اسم محصل" required>
             </div>
             <div class="col-md-6">
               <label for="fullName" style="color: black">نهاد تحصیلی</label>
               <input type="text" name="schoolName" value="{{$student->schoolName}}" class="form-control" placeholder="نهاد تحصیلی" required>
             </div>
           </div>
           <div class="row form-group">
             <div class="col-md-4">
               <label for="profession" style="color: black">رشته</label>
               <input type="text" name="department" value="{{$student->department}}"  class="form-control" placeholder="رشته" required>
             </div>
             <div class="col-md-4">
               <label for="profession" style="color: black">زمان</label>
               <input type="text" name="shift" value="{{$student->shift}}"  class="form-control" placeholder="رشته" required>
             </div>
             <div class="col-md-4">
               <label for="profession" style="color: black">فیس</label>
               <input type="number" name="fee" value="{{$student->fee}}"  class="form-control" placeholder="فیس" required>
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
