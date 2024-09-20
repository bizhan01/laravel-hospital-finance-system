@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <div class="box box-block bg-white">
         <center><h3>لیست پرسونل موجود</h3></center>
         <div class="table-responsive">
             <table class="table table-bordered table-striped" >
                <thead>
                   <tr>
                      <th data-priority="1">عکس</th>
                      <th data-priority="3">اسم کامل</th>
                      <th data-priority="1">وظیفه</th>
                      <th data-priority="1">معاش</th>
                      <th data-priority="3">تاریخ تولد</th>
                      <th data-priority="3">تلفن</th>
                      <th data-priority="6">ایمیل آدرس</th>
                      <th data-priority="6">سکونت اصلی</th>
                      <th data-priority="6">سکونت فعلی</th>
                      <th data-priority="6">تذکره</th>
                      <th data-priority="6">ضمانت خط</th>
                      <th data-priority="6">ویرایش</th>
                      <th data-priority="6">حذف</th>
                   </tr>
                </thead>
                <tbody>
                  @foreach($employees as $employee)
                   <tr>
                     <td><a href="/UploadedImages/{{$employee->profileImage}}"><img style="height: 30px" src="UploadedImages/{{$employee->profileImage}}" alt="" /> </a></td>
                     <td>{{$employee->fullName}}</td>
                     <td>{{$employee->position}}</td>
                     <td>{{$employee->salary}}</td>
                     <td>{{$employee->dob}}</td>
                     <td style="direction: ltr">{{$employee->phone}}</td>
                     <td>{{$employee->email}}</td>
                     <td>{{$employee->province1}}-{{$employee->district1}}-{{$employee->region1}}</td>
                     <td>{{$employee->province2}}-{{$employee->district2}}-{{$employee->region2}}</td>
                     <td><a href="/UploadedImages/{{$employee->profileImage}}"><img style="height: 30px" src="UploadedImages/{{$employee->tazkira}}" alt="" /></a></td>
                     <td><a href="/UploadedImages/{{$employee->profileImage}}"><img style="height: 30px" src="UploadedImages/{{$employee->warranty}}" alt="" /></a></td>
                     <td>
                       <a href="{{ URL::to('employees/' . $employee->id . '/edit') }}"> <input type="button"  value="ویرایش" class="btn btn-info"> </a>
                      </td>
                      <td>
                        <form action="{{url('employees', [$employee->id])}}" method="POST">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit"  onclick='return confirm("خذف شود؟")' class="btn btn-danger">حذف</button>
                        </form>
                       </td>
                   </tr>
                   @endforeach
                </tbody>
             </table>
           </div>
        </div>
    </div>
  </div>
</div>
@endsection
