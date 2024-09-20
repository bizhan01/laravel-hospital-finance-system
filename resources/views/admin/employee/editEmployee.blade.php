@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
        <h1>ویرایش رکورد</h1>
        <hr>
         <form  action="{{url('employees', [$employee->id])}}" method="POST">
         <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
         <div class="row form-group">
             <h4 style="margin-right: 15px">معلومات شخصی</h4>
            <div class="col-md-4 ">
              <label  for="Field of Study" style="color:black">اسم کامل </label>
              <input type="text"  name="fullName" value="{{$employee->fullName}}" class="form-control" placeholder="اسم کامل" required>
            </div>
            <div class="col-md-4">
              <label  for="University Name" style="color:black">وظیفه</label>
              <input type="text"  name="position" value="{{$employee->position}}" class="form-control" placeholder="وظیفه" required>
            </div>
            <div class="col-md-4">
              <label  for="University Name" style="color:black">معاش</label>
              <input type="number"  name="salary" value="{{$employee->salary}}" class="form-control"  required>
            </div>
         </div>

         <div class="row form-group">

            <div class="col-md-4" >
              <label  for="Field of Study" style="color:black">تاریخ تولد</label>
              <input type="date" name="dob" value="{{$employee->dob}}" placeholder="(999) 999-9999" data-mask="(999) 999-9999" class="form-control" style="direction: ltr" required>
            </div>
            <div class="col-md-4">
              <label  for="University Name" style="color:black">تلفن</label>
             <input type="text" name="phone" value="{{$employee->phone}}" placeholder="(999) 999-9999" data-mask="(999) 999-9999" class="form-control" style="direction: ltr" >
            </div>
            <div class="col-md-4">
              <label  for="University Name" style="color:black">ایمیل آدرس</label>
              <input type="text"  name="email" value="{{$employee->email}}" class="form-control" placeholder="someone@domain.com" required>
            </div>
         </div>

         <div class="row form-group">
             <h4 style="margin-right: 15px">سکونت اصلی</h4>
            <div class="col-md-4">
              <label  for="Field of Study" style="color:black">ولایت </label>
              <input type="text"  name="province1" value="{{$employee->province1}}" class="form-control" placeholder="ولایت" required>
            </div>
            <div class="col-md-4">
              <label  for="University Name" style="color:black">ولسوالی</label>
              <input type="text"  name="district1" value="{{$employee->district1}}" class="form-control" placeholder="ولسوالی" required>
            </div>
            <div class="col-md-4">
              <label  for="University Name" style="color:black">ناحیه / قریه</label>
              <input type="text"  name="region1" value="{{$employee->region1}}" class="form-control" placeholder="ناحیه / قریه" required>
            </div>
         </div>

         <div class="row form-group">
             <h4 style="margin-right: 15px">سکونت فعلی</h4>
            <div class="col-md-4 ">
              <label  for="Field of Study" style="color:black">ولایت </label>
              <input type="text"  name="province2" value="{{$employee->province2}}" class="form-control" placeholder="ولایت" required>
            </div>
            <div class="col-md-4">
              <label  for="University Name" style="color:black">ولسوالی</label>
              <input type="text"  name="district2" value="{{$employee->district2}}" class="form-control" placeholder="ولسوالی" required>
            </div>
            <div class="col-md-4">
              <label  for="University Name" style="color:black">ناحیه / قریه</label>
              <input type="text"  name="region2" value="{{$employee->region2}}" class="form-control" placeholder="ناحیه / قریه" required>
            </div>
         </div>

         <div class="row form-group">
             <!-- <h4 style="margin-right: 15px">اسناد مورد نیاز</h4> -->
            <div class="col-md-4 ">
              <!-- <label  for="Field of Study" style="color:black">عکس </label> -->
              <input type="hidden" name="profileImage" value="{{$employee->profileImage}}">
               <!-- <input type="file" name="profileImage" value="{{$employee->profileImage}}" data-default-file="/UploadedImages/{{$employee->profileImage}}" id="input-file-now" class="dropify" /> -->

            </div>
            <div class="col-md-4">
              <!-- <label  for="University Name" style="color:black">تذکره</label> -->
              <input type="hidden" name="tazkira" value="{{$employee->tazkira}}">
              <!-- <input type="file" name="tazkira" value="{{$employee->tazkira}}" data-default-file="/UploadedImages/{{$employee->tazkira}}" id="input-file-now" class="dropify" /> -->
            </div>
            <div class="col-md-4">
              <!-- <label  for="University Name" style="color:black">ضمانت خط</label> -->
              <input type="hidden" name="warranty" value="{{$employee->warranty}}">
              <!-- <input type="file" name="warranty" value="{{$employee->warranty}}" data-default-file="/UploadedImages/{{$employee->warranty}}" id="input-file-now" class="dropify" /> -->
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
