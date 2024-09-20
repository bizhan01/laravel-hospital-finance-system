@extends('layouts.master')
@section('content')
@include('reception.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
      <!-- ُSuccess Flash Message -->
					@if($success = session('success'))
					<div class="alert alert-success alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
							<div>{{$success}}</div>
					</div>
					@endif
      <center> <h3>ثبت عملیات ها</h3> </center>
       <form method="POST" action="/operation" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="row form-group">
              <div class="col-md-3">
                <label for="profession" style="color: black">اسم مریض</label>
                <input type="text" name="patientName" value=""  class="form-control"  placeholder="اسم مریض" required>
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">اسم دکتر جراح</label>
                <input type="text" name="docName" value=""  class="form-control"  placeholder="اسم دکتر جراح" required>
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">نوع علمیات</label>
                <input type="text" name="operationType" value=""  class="form-control"  placeholder="نوع عملیات" required>
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">فیس</label>
                <input type="text"  id="add1" name="fee" value=""   class="form-control" onkeyup="AutoCalc(this)"  placeholder="فیس" required>
              </div>
            </div>
            <label for="">ثبت فیصدی های اخذ شده</label>

            <div class="row form-group">
              <div class="col-md-3">
                <label for="profession" style="color: black">فیصدی جراح</label>
                <input type="text" id="sub1" name="docPercentage" value=""   class="form-control" onkeyup="AutoCalc(this)"  placeholder="جراحی" required>
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">فیصدی اسیستانت جراحی</label>
                <input type="text" id="sub2" name="assistantPercentage" value=""   class="form-control" onkeyup="AutoCalc(this)" placeholder="اسیستانت جراحی" >
              </div>
              <div class="col-md-2">
                <label for="profession" style="color: black">فیصدی انستیزی لوگ</label>
                <input type="text" id="sub3" name="anesthesiaPercentage" value=""    class="form-control" onkeyup="AutoCalc(this)" placeholder="انستیزی لوگ" >
              </div>
              <div class="col-md-2">
                <label for="profession" style="color: black">فیصدی قابله</label>
                <input type="text" id="sub4" name="midwifePercentage" value=""    class="form-control" onkeyup="AutoCalc(this)" placeholder="قابله" >
              </div>
              <div class="col-md-2">
                <label for="profession" style="color: black">فیصدی شفاخانه</label>
                <input type="text" readonly name="total" value="" id="total" class="form-control"  placeholder="فیصدی شفاخانه" >
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-6">
                <button type="submit" class="btn btn-success btn-rounded"><li class="fa fa-save"></li> ذخیره نمودن</button>&nbsp &nbsp
                <button type="reset" class="btn btn-primary btn-rounded"><li class="fa fa-refresh"></li> لغو عملیات</button>
              </div>
            </div>
          @include('layouts.errors')
        </form>
        <!--Form End -->
    </div>
  </div>
</div>
<br></br>

<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <h5 class="mb-1">نمایش لیست کامل عملیات ها</h5>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>اسم مریض</th>
            <th>اسم دکتر</th>
            <th>نوع علمیات</th>
            <th>فیس</th>
            <th>فیصدی جراح</th>
            <th>فیصدی اسیستانت</th>
            <th>فیصدی انستیزی لوگ</th>
            <th>فیصدی قابله</th>
            <th>فیصدی شفاخانه</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
            <?php $sum1=0; $sum2=0; $sum3=0; $sum4=0; $sum5=0; $sum6=0; ?>
          @foreach($operations as $operation)
          <tr>
            <td>{{$operation->id}}</td>
            <td>{{$operation->patientName}}</td>
            <td>{{$operation->docName}}</td>
            <td>{{$operation->operationType}}</td>
            <td>{{$operation->fee}}</td>
            <td>{{$operation->docPercentage}}</td>
            <td>{{$operation->assistantPercentage}}</td>
            <td>{{$operation->anesthesiaPercentage}}</td>
            <td>{{$operation->midwifePercentage}}</td>
            <td><b>{{$operation->total}}</b></td>
            <td>
              <a href="{{ URL::to('operation/' . $operation->id . '/edit') }}"> <input type="button"  value="ویرایش" class="btn btn-info"> </a>
            </td>
            <td>
              <form action="{{url('operation', [$operation->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("خذف شود؟")' class="btn btn-danger">حذف</button>
              </form>
            </td>
          </tr>
          <?php $sum1 += $operation->fee; $sum2 += $operation->docPercentage; $sum3 += $operation->assistantPercentage; $sum4 += $operation->anesthesiaPercentage; $sum5 += $operation->midwifePercentage; $sum6 += $operation->total; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="4">جمله عواید</th>
              <th><?php echo $sum1; ?></th>
              <th ><?php echo $sum2; ?></th>
              <th><?php echo $sum3; ?></th>
              <th><?php echo $sum4; ?></th>
              <th><?php echo $sum5; ?></th>
              <th colspan="3"><?php echo $sum6; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>


<script type="text/javascript">
  function AutoCalc(obj) {
       var total = 0;
       if (isNaN(obj.value)) {
           alert("لطفا یک عدد وارد کنید");
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
