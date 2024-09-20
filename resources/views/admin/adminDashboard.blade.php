@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row row-md mb-1">
      <div class="col-md-4">
        <div class="box bg-white user-1">
          <div class="u-img img-cover" style="background-image: url(img/photos-1/4.jpg);"></div>
          <div class="u-content">
            <div class="avatar box-64">
              <img class="b-a-radius-circle shadow-white" src="/UploadedImages/{{Auth::user()->profileImage}}" height="70px" alt="">
              <i class="status bg-success bottom right"></i>
            </div>
            <h5><a class="text-black" href="#">{{ Auth::user()->name }}</a></h5>
            <p class="text-muted pb-0-5">مدیر سیستم</p>
            <div class="text-xs-center pb-0-5">
              @foreach($users as $user)
              <a href="editUser/{{ $user->id }}"><button type="submit" class="btn btn-primary btn-rounded mr-0-5">ویرایش پروفایل </button></a>
              @endforeach
              <a  href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <button type="submit" class="btn btn-danger btn-rounded">خروج از سیستم</button>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </div>
          <div class="u-counters">
            <div class="row no-gutter">
              <div class="col-xs-12 uc-item">
                <a class="text-black" href="#">
                  <strong>تاریخ</strong> <br>
                  <strong ><?php echo date('Y-m-d') ?></strong>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="box box-block bg-white">
          <div class="clearfix mb-1">
            <h5 class="float-xs-left">آمار مالی شبعه معلومات</h5>
            <div class="float-xs-right">
              <a href="/home"><button class="btn btn-rounded btn-info">بروز رسانی <li class="fa fa-refresh"></li></button></a>
            </div>
          </div>
            <table class="table mb-md-0">
              <thead>
                <tr>
                  <th>تاریخ</th>
                  <th>عواید</th>
                  <th>مصارف</th>
                  <th>فیصدی ها</th>
                  <th>بیلانس</th>
                </tr>
              </thead>
              <tbody>
                <tr class="table-info">
                  <td>امروز</td>
                  <td>{{$revenues = $todayPatients + $todayOperations}}</td>
                  <td>{{$todayExpenses}}</td>
                  <td>{{$todayPercentages}}</td>
                  <td dir="ltr" style="float: right">{{$revenues - $todayExpenses - $todayPercentages}}</td>
                </tr>
                <tr class="table-success">
                  <td>دیروز</td>
                  <td>{{$revenues = $yesterdayPatients +  $yesterdayOperations}}</td>
                  <td>{{$yesterdayExpenses}}</td>
                  <td>{{$yesterdayPercentages}}</td>
                  <td dir="ltr" style="float: right">{{$revenues - $yesterdayExpenses - $yesterdayPercentages}}</td>
                </tr>
              </tbody>
            </table><br>
           <h6>آمار فروشات دوای</h6>
            <table class="table mb-md-0">
              <thead>
                <tr>
                  <th>فروشات</th>
                  <th>معلومات</th>
                  <th>دواخانه</th>
                  <th>تفاوت</th>
                </tr>
              </thead>
              <tbody>
                <tr class="table-info">
                  <td>نخسه</td>
                  <td>{{$todayReceptionPerscription}}</td>
                  <td>{{$today_prescript}}</td>
                  <td dir="ltr" style="text-align: right; color: red">{{$prescription = $todayReceptionPerscription - $today_prescript}}</td>
                </tr>
                <tr class="table-success">
                  <td>پرچون</td>
                  <td>{{$todayReceptionRetail}}</td>
                  <td>{{$today_retail}}</td>
                  <td dir="ltr" style="text-align: right; color: red">{{$retail = $todayReceptionRetail - $today_retail}}</td>
                </tr>
                <tr class="table-warning">
                  <td>جمله</td>
                  <td><b>{{$todayReceptionPerscription + $todayReceptionRetail}}</b></td>
                  <td><b>{{$today_prescript + $today_retail}}</b></td>
                  <td dir="ltr" style="text-align: right; color: red">{{$prescription + $retail}}</td>
                </tr>
              </tbody>
            </table><br><br>
        </div>
      </div>
    </div>


    <div class="row row-md">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-success mb-2">
          <div class="t-icon right"><i class="ti-bar-chart"></i></div>
          <div class="t-content">
            <h1 class="mb-1" dir="ltr" style="text-align: right">{{$revenues = $currentMonthPatients + $currentMonthOperations + $currentMonthRevenues}}</h1>
            <h6 class="text-uppercase">عواید ماه جاری</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-danger mb-2">
          <div class="t-icon right"><i class="fa fa-money"></i></div>
          <div class="t-content">
            <h1 class="mb-1" dir="ltr" style="text-align: right">{{$expenses = $currentMonthExpense + $currentMonthPercentages + $currentMonthAdvancePaid}}</h1>
            <h6 class="text-uppercase">مصارف ماه جاری</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-primary mb-2">
          <div class="t-icon right"><i class="fa  fa-balance-scale"></i></div>
          <div class="t-content">
            <h1 class="mb-1" dir="ltr" style="text-align: right">{{$revenues - $expenses}}</h1>
            <h6 class="text-uppercase">بیلانس ماه جاری</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-warning mb-2">
          <div class="t-icon right"><i class="fa fa-user"></i></div>
          <div class="t-content">
            <h1 class="mb-1">{{$empCount}}</h1>
            <h6 class="text-uppercase">کارمندان</h6>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
@endsection
