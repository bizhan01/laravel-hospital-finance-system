@extends('layouts.master')
@section('content')
@include('lab.aside')
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
      <center> <h3>ثبت وسایل موجود در شعبه لابراتوار</h3> </center>
       <form method="POST" action="/asset" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="type" value="0">
          <div class="row form-group">
              <div class="col-md-3">
                <label for="profession" style="color: black">اسم جنس</label>
                <input type="text" name="item" value=""  class="form-control" placeholder="اسم جنس"  required>
              </div>
              <div class="col-md-3">
                <label for="fullName" style="color: black">مدل</label>
                <input type="text" name="model" value="" class="form-control" placeholder="مدل" >
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">تعداد</label>
                <input type="text" name="quantity" value=""  class="form-control" placeholder="تعداد" required>
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">ملاحظات</label>
                <input type="text" name="description" value=""  class="form-control" placeholder="ملاحظات" >
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
      <center><h3>لیست وسایل شعبه لابراتوار</h3></center>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>اسم جنس</th>
            <th>مدل</th>
            <th>تعداد</th>
            <th>توضیحات</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($assets as $asset)
          <tr>
            <td>{{$asset->item}}</td>
            <td>{{$asset->model}}</td>
            <td>{{$asset->quantity}}</td>
            <td>{{$asset->description}}</td>
            <td>
              <a href="{{ URL::to('asset/' . $asset->id . '/edit') }}"> <input type="button"  value="ویرایش" class="btn btn-info"> </a>
            </td>
            <td>
              <form action="{{url('asset', [$asset->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("حذف شود؟")' class="btn btn-danger">حذف</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
