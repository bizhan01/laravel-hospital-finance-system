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
      <center> <h1>ثبت کارمند جدید</h1> </center>
        <form method="POST" action="/employees" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row form-group">
              <h4 style="margin-right: 15px">معلومات شخصی</h4>
             <div class="col-md-4 ">
               <label  for="Field of Study" style="color:black">اسم کامل </label>
               <input type="text"  name="fullName" class="form-control" placeholder="اسم کامل" required>
             </div>
             <div class="col-md-4">
               <label  for="University Name" style="color:black">وظیفه</label>
               <input type="text"  name="position" class="form-control" placeholder="وظیفه" required>
             </div>
             <div class="col-md-4">
               <label  for="University Name" style="color:black">معاش</label>
               <input type="number"  name="salary" class="form-control"  required>
             </div>
          </div>

          <div class="row form-group">

             <div class="col-md-4" >
               <label  for="Field of Study" style="color:black">تاریخ تولد</label>
               <input type="date" name="dob"   class="form-control" style="direction: ltr" required>
             </div>
             <div class="col-md-4">
               <label  for="University Name" style="color:black">تلفن</label>
              <input type="text" name="phone" placeholder="(999) 999-9999" data-mask="(999) 999-9999" class="form-control" style="direction: ltr" >
             </div>
             <div class="col-md-4">
               <label  for="University Name" style="color:black">ایمیل آدرس</label>
               <input type="email"  name="email" class="form-control" placeholder="someone@domain.com" required>
             </div>
          </div>

          <div class="row form-group">
              <h4 style="margin-right: 15px">سکونت اصلی</h4>
             <div class="col-md-4">
               <label  for="Field of Study" style="color:black">ولایت </label>
               <input type="text"  name="province1" class="form-control" placeholder="ولایت" required>
             </div>
             <div class="col-md-4">
               <label  for="University Name" style="color:black">ولسوالی</label>
               <input type="text"  name="district1" class="form-control" placeholder="ولسوالی" required>
             </div>
             <div class="col-md-4">
               <label  for="University Name" style="color:black">ناحیه / قریه</label>
               <input type="text"  name="region1" class="form-control" placeholder="ناحیه / قریه" required>
             </div>
          </div>

          <div class="row form-group">
              <h4 style="margin-right: 15px">سکونت فعلی</h4>
             <div class="col-md-4 ">
               <label  for="Field of Study" style="color:black">ولایت </label>
               <input type="text"  name="province2" class="form-control" placeholder="ولایت" required>
             </div>
             <div class="col-md-4">
               <label  for="University Name" style="color:black">ولسوالی</label>
               <input type="text"  name="district2" class="form-control" placeholder="ولسوالی" required>
             </div>
             <div class="col-md-4">
               <label  for="University Name" style="color:black">ناحیه / قریه</label>
               <input type="text"  name="region2" class="form-control" placeholder="ناحیه / قریه" required>
             </div>
          </div>

          <div class="row form-group">
              <h4 style="margin-right: 15px">اسناد مورد نیاز</h4>
             <div class="col-md-4 ">
               <label  for="Field of Study" style="color:black">عکس </label>
               <input type="file" accept="image/*" name="profileImage" id="input-file-now" class="dropify" />
             </div>
             <div class="col-md-4">
               <label  for="University Name" style="color:black">تذکره</label>
               <input type="file" accept="image/*" name="tazkira" id="input-file-now" class="dropify" />
             </div>
             <div class="col-md-4">
               <label  for="University Name" style="color:black">ضمانت خط</label>
               <input type="file" accept="image/*" name="warranty" id="input-file-now" class="dropify" />
             </div>
          </div>

          <div class="row form-group">
             <div class="col-md-4">
               <input type="submit" name="submit" value="ذخیره" class="btn btn-success btn-lg" />
             </div>
          </div>
          @include('layouts.errors')
        </form>
      <!--Form End -->
    </div>
  </div>
</div>
@endsection
