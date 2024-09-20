@extends('layouts.master')
@section('content')
@include('reception.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
        <h1>ویرایش عملیات</h1>
        <hr>
         <form action="{{url('operation', [$operation->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
           <div class="col-md-3">
             <label for="profession" style="color: black">اسم مریض</label>
             <input type="text" name="patientName" value="{{$operation->patientName}}"  class="form-control"  placeholder="اسم مریض" required>
           </div>
           <div class="col-md-3">
             <label for="profession" style="color: black">اسم دکتر جراح</label>
             <input type="text" name="docName" value="{{$operation->docName}}"  class="form-control"  placeholder="اسم دکتر جراح" required>
           </div>
           <div class="col-md-3">
             <label for="profession" style="color: black">نوع علمیات</label>
             <input type="text" name="operationType" value="{{$operation->operationType}}"  class="form-control"  placeholder="نوع عملیات" required>
           </div>
           <div class="col-md-3">
             <label for="profession" style="color: black">فیس</label>
             <input type="text" id="add1" name="fee" value="{{$operation->fee}}"  class="form-control" onkeyup="AutoCalc(this)"   placeholder="فیس" required>
           </div>
         </div>
         <label for="">ثبت فیصدی های اخذ شده</label>

         <div class="row form-group">
           <div class="col-md-3">
             <label for="profession" style="color: black">فیصدی جراح</label>
             <input type="text" id="sub1" name="docPercentage" value="{{$operation->docPercentage}}"  class="form-control" onkeyup="AutoCalc(this)"  placeholder="جراحی" required>
           </div>
           <div class="col-md-3">
             <label for="profession" style="color: black">فیصدی اسیستانت جراحی</label>
             <input type="text" id="sub2" name="assistantPercentage" value="{{$operation->assistantPercentage}}"  class="form-control" onkeyup="AutoCalc(this)"  placeholder="اسیستانت جراحی" >
           </div>
           <div class="col-md-2">
             <label for="profession" style="color: black">فیصدی انستیزی لوگ</label>
             <input type="text" id="sub3" name="anesthesiaPercentage" value="{{$operation->anesthesiaPercentage}}"  class="form-control" onkeyup="AutoCalc(this)"   placeholder="انستیزی لوگ" >
           </div>
           <div class="col-md-2">
             <label for="profession" style="color: black">فیصدی قابله</label>
             <input type="text" id="sub4" name="midwifePercentage" value="{{$operation->midwifePercentage}}"  class="form-control" onkeyup="AutoCalc(this)"   placeholder="قابله" >
           </div>

           <div class="col-md-2">
             <label for="profession" style="color: black">فیصدی شفاخانه</label>
             <input type="text" id="total" name="total" value="{{$operation->total}}"  class="form-control"  placeholder="فیصدی شفاخانه" required>
           </div>
         </div>

         @include('layouts.errors')
         <button type="submit" class="btn btn-rounded btn-success">ویرایش رکورد</button>
         <button type="reset" class="btn btn-rounded btn-primary">لغو</button> </a>
        </form>
        <!--Form End -->
      </div>
  </div>
</div>

<script type="text/javascript">
  function AutoCalc(obj) {
       var total = 0;
       if (isNaN(obj.value)) {
           alert("لطفا یک عدد وارد کنید ");
           obj.value = '';
           return false;
       }
       else {

           var textBox = new Array();
           textBox = document.getElementsByTagName('input')

           for (i = 0; i < textBox.length; i++) {
               if (textBox[i].type == 'text') {
                   var inputVal = textBox[i].value;
                   if (inputVal == '')
                       inputVal = 0;
                   if ((textBox[i].id == 'add1') || (textBox[i].id == 'add2')) {
                       total = total + parseInt(inputVal);
                   }
                   if ((textBox[i].id == 'sub1') || (textBox[i].id == 'sub2')) {
                       total = total - parseInt(inputVal);
                   }
                   if ((textBox[i].id == 'sub3') || (textBox[i].id == 'sub4')) {
                       total = total - parseInt(inputVal);
                   }
               }
           }
           document.getElementById('total').value = total;
       }
   }
</script>

@endsection
