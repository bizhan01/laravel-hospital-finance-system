@extends('layouts.master')
@section('content')
@include('reception.aside')
<script src="/js/jquery.min.js"> </script>
<script src="/js/math.js"> </script>
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
        <center> <h1>ثبت تدارکات (مصارف)</h1> </center>
          <form method="POST" action="/expense" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row form-group">
              <div class="col-md-4">
                <label for="fullName" style="color: black">اسم جنس</label>
                <input type="text" name="item" value="" class="form-control" placeholder="اسم جنس" required>
              </div>

              <div class="col-md-4">
                <label for="fullName"  style="color: black">کتگوری</label>
                <select class="form-control" name="category" required="">
                  <option value="">انتخاب کنید</optio>
                  <option>مواد غذایی </optio>
                  <option>مخروقات</option>
                  <option>قرطاسیه</optio>
                  <option>سایر </optio>
                </select>
              </div>
              <div class="col-md-4">
                <label for="profession" style="color: black">تحویل گیرنده</label>
                <input type="text" name="consumer" value=""  class="form-control" placeholder="تحویل گیرنده" required>
              </div>

            </div>
          <div class="row form-group">
              <div class="col-md-3 ">
                <label for="fullName" style="color: black">نمبر بل</label>
                <input type="number" name="billNumber" value="" class="form-control" placeholder="نمبر بل"   required>
              </div>
              <div class="col-md-2">
                <label for="profession" style="color: black">قیمت (فی دانه)</label>
                <input type="number" name="price" value=""  id="fn"  class="form-control txt" placeholder="قیمت (فی دانه) "  required>
              </div>
              <div class="col-md-4">
                <label for="fullName" style="color: black">تعداد</label>
                <!-- <input type="number" min="1" name="quantity" value="" id="sn" class="form-control"  placeholder="تعداد"  required> -->
                <div class="input-daterange input-group" id="date-range">
                  <input type="number"  name="quantity" min="1" id="sn" class="form-control txt" required>
                  <span class="input-group-addon bg-primary b-0 text-white">واحد مربوطه</span>
                  <input type="text"  name="unit" class="form-control " required >
                </div>
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">قیمت کلی </label>
                <input type="number" name="total" value="" readonly id="mul"  class="form-control" placeholder="قیمت کلی " required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12" >
                <label for="">توضیحات</label>
                <textarea name="description" class="form-control" id="exampleTextarea" rows="3" ></textarea>
              </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6">
                    <input type="submit" name="submit" value="ذخیره ریکارت جدید" class="btn btn-success">
                </div>
              </div>
          @include('layouts.errors')
        </form>
      <!--Form End -->
    </div>
  </div>
</div>


<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box col-lg-12 box-block bg-white">
      <h5 class="mb-1">نمایش کامل لیست مصارف</h5>
      <table class=" table  table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>جنس</th>
            <th>تاریخ</th>
            <th>کتگوری</th>
            <th>مصرف کننده</th>
            <th>نمبر بل</th>
            <th>قیمت</th>
            <th>تعداد</th>
            <th>واحد</th>
            <th>قیمت کلی</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($expenses as $expense)
          <tr>
            <td>{{$expense->id}}</td>
            <td>{{$expense->item}}</td>
            <td>{{$expense->created_at}}</td>
            <td>{{$expense->category}}</td>
            <td>{{$expense->consumer}}</td>
            <td>{{$expense->billNumber}}</td>
            <td>{{$expense->price}}</td>
            <td>{{$expense->quantity}}</td>
            <td>{{$expense->unit}}</td>
            <td>{{$expense->total}}</td>
          </tr>
          <?php $sum += $expense->total; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="9">جمله مصارف</th>
              <th colspan="3"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection