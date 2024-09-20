@extends('layouts.master')
@section('content')
@include('reception.aside')
<script src="{{ asset('../js/jquery.min.js') }}"> </script>
<script src="{{ asset('../js/math.js') }}"> </script>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
        <h1>ویرایش رکورد</h1>
        <hr>
         <form action="{{url('percentage', [$percentage->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
           <div class="col-md-3">
             <label for="fullName" style="color: black">اسم دکتر</label>
             <input type="text" name="docName" value="{{$percentage->docName}}"  class="form-control"  placeholder="اسم دکتر" required>
           </div>
           <div class="col-md-3">
             <label for="profession" style="color: black">پروسیجر</label>
             <input type="text" name="procedure" value="{{$percentage->procedure}}"  class="form-control"  placeholder="پروسیجر" required>
           </div>
           <div class="col-md-2">
             <label for="profession" style="color: black">عاید کلی</label>
             <input type="number" name="income" id="fn" value="{{$percentage->income}}"  class="form-control"  placeholder="عاید کلی" required>
           </div>
           <div class="col-md-2">
             <label for="profession" style="color: black">فیصدی دکتر</label>
             <input type="number" name="percentage" id="sn" value="{{$percentage->percentage}}"  class="form-control"  placeholder="فیصدی دکتر" required>
           </div>
           <div class="col-md-2">
             <label for="profession" style="color: black">فیصدی شفاخانه</label>
             <input type="number" readonly name="total" id="sub" value="{{$percentage->total}}"  class="form-control"  placeholder="فیصدی شفاخانه" required>
           </div>
         </div>

         @include('layouts.errors')
         <button type="submit" class="btn btn-rounded btn-success">ویرایش رکورد</button>
         <button type="reset" class="btn btn-rounded btn-primary">لغو</button> 
        </form>
        <!--Form End -->
      </div>
  </div>
</div>
@endsection
