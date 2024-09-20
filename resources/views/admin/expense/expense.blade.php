@extends('layouts.master')
@section('content')
<script src="js/jquery.min.js"> </script>
<script src="js/math.js"> </script>
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
                <select class="form-control" name="category">
                  <option value="">انتخاب کنید</optio>
                  <option>مواد غذایی </optio>
                  <option>مخروقات</option>
                  <option>پرداخت شرکت دوای</option>
                  <option>دوای پرچون</option>
                  <option>قرطاسیه</optio>
                  <option value="اجناس">خرید اجناس</optio>
                  <option>تبلیغات</optio>
                  <option>ترمیمات</optio>
                  <option>معاش</optio>
                  <option>برق</optio>
                  <option>مالیه</optio>
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
              <div class="col-md-3">
                <label for="profession" style="color: black">قیمت (فی دانه)</label>
                <input type="number" name="price" value=""  id="fn"  class="form-control" placeholder="قیمت (فی دانه) "  required>
              </div>
              <div class="col-md-3">
                <label for="fullName" style="color: black">تعداد</label>
                <!-- <input type="number" min="1" name="quantity" value="" id="sn" class="form-control"  placeholder="تعداد"  required> -->
                <div class="input-daterange input-group" id="date-range">
                  <input type="number" name="quantity" min="1" id="sn" class="form-control" required>
                  <span class="input-group-addon bg-primary b-0 text-white">واحد مربوطه</span>
                  <input type="text"  name="unit" class="form-control" required >
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
      <center><h3>لیست مصارف</h3></center>
     <!-- Archive Start -->
      <div class="dropdown pull-right">
          <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
              انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
              <!-- item-->
              @foreach($archives as $stats)
              <li>
                <a href="/expense/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                  {{$stats['month']. ' ' .$stats['year']}}
                </a>
               </li>
              @endforeach
             <a href="/expense" class="dropdown-item form-control">همه</a>
          </div>
      </div><br>
      <!-- Archive End -->
      <table class=" table   table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>جنس</th>
            <th>کتگوری</th>
            <th>مصرف کننده</th>
            <th>نمبر بل</th>
            <th>قیمت</th>
            <th>تعداد</th>
            <th>واحد</th>
            <th>قیمت کلی</th>
            <th>توضیحات</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($expenses as $expenses)
          <tr>
            <td>{{$expenses->id}}</td>
            <td>{{$expenses->item}}</td>
            <td>{{$expenses->category}}</td>
            <td>{{$expenses->consumer}}</td>
            <td>{{$expenses->billNumber}}</td>
            <td>{{$expenses->price}}</td>
            <td>{{$expenses->quantity}}</td>
            <td>{{$expenses->unit}}</td>
            <td>{{$expenses->total}}</td>
            <td>{{$expenses->description}}</td>
            <td>
              <a href="{{ URL::to('expense/' . $expenses->id . '/edit') }}"> <input type="button"  value="ویرایش" class="btn btn-info"> </a>
            </td>
            <td>
              <form action="{{url('expense', [$expenses->id])}}" method="POST" >
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("خذف شود؟")' class="btn btn-danger">حذف</button>
              </form>
            </td>
          </tr>
          <?php $sum += $expenses->total; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="8">جمله مصارف</th>
              <th colspan="3"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box col-lg-12 box-block bg-white">
      <center> <h3>آمار مصارف ماه جاری</h3></center>
      <table class=" table   table-striped table-bordered dataTable" >
        <thead>
          <tr>
            <th>مواد غذایی </th>
            <th>مخروقات</th>
            <th>پرداخت شرکت دوای</th>
            <th>دوای پرچون</th>
            <th>قرطاسیه</th>
            <th>خرید وسایل</th>
            <th>تبلیغات</th>
            <th>ترمیمات</th>
            <th>معاش</th>
            <th>برق</th>
            <th>مالیه</th>
            <th>سایر </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>{{$CMfoods}} </th>
            <th>{{$CMoil}}</th>
            <th>{{$CMdrugs}}</th>
            <th>{{$CMsubDurgs}}</th>
            <th>{{$CMnotebooks}}</th>
            <th>{{$CMassets}}</th>
            <th>{{$CMadvertisements}}</th>
            <th>{{$CMmaintains}}</th>
            <th>{{$CMsalary}}</th>
            <th>{{$CMpower}}</th>
            <th>{{$CMtax}}</th>
            <th>{{$CMother}}</th>
          </tr>
          <tfoot>
            <tr>
              <th colspan="8">جمله مصارف</th>
              <th colspan="4">{{$CMtotal}}</th>
            </tr>
          </tfoot>
        </tbody>
      </table>
      <br></br>

      <center> <h6>آمار مصارف ماه قبلی</h6></center>
      <table class=" table   table-striped table-bordered dataTable" >
        <thead>
          <tr>
            <th>مواد غذایی </th>
            <th>مخروقات</th>
            <th>پرداخت شرکت دوای</th>
            <th>دوای پرچون</th>
            <th>قرطاسیه</th>
            <th>خرید وسایل</th>
            <th>تبلیغات</th>
            <th>ترمیمات</th>
            <th>معاش</th>
            <th>برق</th>
            <th>مالیه</th>
            <th>سایر </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>{{$LMfoods}} </th>
            <th>{{$LMoil}}</th>
            <th>{{$LMdrugs}}</th>
            <th>{{$LMsubDurgs}}</th>
            <th>{{$LMnotebooks}}</th>
            <th>{{$LMassets}}</th>
            <th>{{$LMadvertisements}}</th>
            <th>{{$LMmaintains}}</th>
            <th>{{$LMsalary}}</th>
            <th>{{$LMpower}}</th>
            <th>{{$LMtax}}</th>
            <th>{{$LMother}}</th>
          </tr>
          <tfoot>
            <tr>
              <th colspan="8">جمله مصارف</th>
              <th colspan="4">{{$LMtotal}}</th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
