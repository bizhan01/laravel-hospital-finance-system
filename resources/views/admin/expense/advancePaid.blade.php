@extends('layouts.master')
@section('content')
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
      <center> <h3>ثبت معاشات پیش پرداخت شده</h3> </center>
       <form method="POST" action="/advancePaid" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="row form-group">
              <div class="col-md-4">
                <label for="fullName" style="color: black">اسم کامل کارمند</label>
                <input type="text" name="fullName" value=""  class="form-control"  placeholder="اسم کامل کارمند" required>
              </div>
              <div class="col-md-4">
                <label for="profession" style="color: black">تاریخ</label>
                <input type="date" name="date" value=""  class="form-control"  placeholder="تاریخ" required>
              </div>
              <div class="col-md-4">
                <label for="profession" style="color: black">مبلغ</label>
                <input type="number" name="amount" value=""  class="form-control"  placeholder="مبلغ" required>
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


<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center><h3>لیست معاشات پیش پرداخت شده</h3></center>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               @foreach($archives as $stats)
               <li>
                 <a href="/revenue/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   {{$stats['month']. ' ' .$stats['year']}}
                 </a>
                </li>
               @endforeach
              <a href="/revenue" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>تاریخ</th>
            <th>منبع</th>
            <th>مبلغ</th>
            <th>توضیحات</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($advancePaid as $advancePaid)
          <tr>
            <td>{{$advancePaid->fullName}}</td>
            <td>{{$advancePaid->date}}</td>
            <td>{{$advancePaid->amount}}</td>
            <td>{{$advancePaid->description}}</td>
            <td>
              <a href="{{ URL::to('advancePaid/' . $advancePaid->id . '/edit') }}"> <input type="button"  value="ویرایش" class="btn btn-info"> </a>
            </td>
            <td>
              <form action="{{url('advancePaid', [$advancePaid->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("خذف شود؟")' class="btn btn-danger">حذف</button>
              </form>
            </td>
          </tr>
          <?php $sum += $advancePaid->amount; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="3">جمله عواید</th>
              <th colspan="3"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection