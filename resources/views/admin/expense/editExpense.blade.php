@extends('layouts.master')
@section('content')
<script src="{{url('js/jquery.min.js')}}"> </script>
<script src="{{url('js/math.js')}}"> </script>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
        <h1>ویرایش رکورد</h1>
        <hr>
         <form action="{{url('expense', [$expense->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
           <div class="col-md-4">
             <label for="fullName" style="color: black">اسم جنس</label>
             <input type="text" name="item" value="{{$expense->item}}" class="form-control" placeholder="اسم جنس" required>
           </div>

           <div class="col-md-4">
             <label for="fullName"  style="color: black">کتگوری</label>
             <input type="text" name="category" value="{{$expense->category}}"  class="form-control" placeholder="کتگوری" required>
           </div>
           <div class="col-md-4">
             <label for="profession" style="color: black">مصرف کننده</label>
             <input type="text" name="consumer" value="{{$expense->consumer}}"  class="form-control" placeholder="مصرف کننده" required>
           </div>

         </div>
       <div class="row form-group">
           <div class="col-md-3 ">
             <label for="fullName" style="color: black">نمبر بل</label>
             <input type="number" name="billNumber" value="{{$expense->billNumber}}" class="form-control" placeholder="نمبر بل"   required>
           </div>
           <div class="col-md-3">
             <label for="profession" style="color: black">قیمت (فی دانه)</label>
             <input type="number" name="price" value="{{$expense->price}}"  id="fn"  class="form-control" placeholder="قیمت (فی دانه) "  required>
           </div>
           <div class="col-md-3">
             <label for="fullName" style="color: black">تعداد</label>
             <!-- <input type="number" min="1" name="quantity" value="" id="sn" class="form-control"  placeholder="تعداد"  required> -->
             <div class="input-daterange input-group" id="date-range">
               <input type="number" name="quantity" value="{{$expense->quantity}}" min="1" id="sn" class="form-control" required>
               <span class="input-group-addon bg-primary b-0 text-white">واحد مربوطه</span>
               <input type="text"  name="unit" value="{{$expense->unit}}" class="form-control" required >
             </div>
           </div>
           <div class="col-md-3">
             <label for="profession" style="color: black">قیمت کلی </label>
             <input type="number" name="total" value="{{$expense->total}}" readonly id="mul"  class="form-control" placeholder="قیمت کلی " required>
           </div>
         </div>

         <div class="row form-group">
           <div class="col-md-12" >
             <label for="">توضیحات</label>
             <textarea name="description" class="form-control" id="exampleTextarea" rows="3" >{{$expense->description}}</textarea>
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
