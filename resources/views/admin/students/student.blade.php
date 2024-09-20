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
      <center> <h3>ثبت محصل جدید</h3> </center>
       <form method="POST" action="/student" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row form-group">
              <div class="col-md-6">
                <label for="profession" style="color: black">اسم محصل</label>
                <input type="text" name="stdName" value=""  class="form-control"  placeholder="اسم محصل" required>
              </div>
              <div class="col-md-6">
                <label for="fullName" style="color: black">نهاد تحصیلی</label>
                <input type="text" name="schoolName" value="" class="form-control" placeholder="نهاد تحصیلی" required>
              </div>
          </div>
          <div class="row form-group">
              <div class="col-md-4">
                <label for="profession" style="color: black">رشته</label>
                <input type="text" name="department" value=""  class="form-control" placeholder="رشته" required>
              </div>
              <div class="col-md-4">
                <label for="profession" style="color: black">زمان</label>
                <select class="form-control" name="shift">
                  <option value="">انتخاب کیند</option>
                  <option>قبل از ظهر</option>
                  <option>بعد از ظهر</option>
                  <option>شبانه</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="profession" style="color: black">فیس</label>
                <input type="number" name="fee" value=""  class="form-control" placeholder="فیس" required>
              </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6">
                    <input type="submit" name="submit" value="ذخیره" class="btn btn-success ">
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
      <center><h3>لیست محصلین</h3></center>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               @foreach($archives as $stats)
               <li>
                 <a href="/student/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   {{$stats['month']. ' ' .$stats['year']}}
                 </a>
                </li>
               @endforeach
              <a href="/student" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>اسم محصل</th>
            <th>نهاد تحصلی</th>
            <th>رشته</th>
            <th>زمان</th>
            <th>فیس</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($students as $student)
          <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->stdName}}</td>
            <td>{{$student->schoolName}}</td>
            <td>{{$student->department}}</td>
            <td>{{$student->shift}}</td>
            <td>{{$student->fee}}</td>
            <td>
              <a href="{{ URL::to('student/' . $student->id . '/edit') }}"> <input type="button"  value="ویرایش" class="btn btn-info"> </a>
            </td>
            <td>
              <form action="{{url('student', [$student->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("حذف شود؟")' class="btn btn-danger">حذف</button>
              </form>
            </td>
          </tr>
          <?php $sum += $student->fee; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="4">جمله عواید</th>
              <th colspan="3"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
