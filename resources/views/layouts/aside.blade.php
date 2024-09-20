<!-- Sidebar -->
<div class="site-overlay"></div>
<div class="site-sidebar" style="background-color: #373944">
  <div class="custom-scroll custom-scroll-light">
    <ul class="sidebar-menu">
      <li class="menu-title">صفحه اصلی</li>
      <li class="with-sub">
        <a href="/" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa fa-heart"></i></span>
          <span class="s-text">داشبورد</span>
        </a>
      </li>

      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-line-chart"></i></span>
          <span class="s-text">عواید</span>
        </a>
        <ul>
          <li><a href="/patients">لیست مراجعین</a></li>
          <li><a href="/operations">عملیات ها</a></li>
          <!-- <li><a href="/pharmacy">دواخانه</a></li> -->
          <li><a href="/revenue">ثبت عواید </a></li>
        </ul>
      </li>

      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-money"></i></span>
          <span class="s-text">مصارف</span>
        </a>
        <ul>
          <li><a href="/expense">ثبت مصارف</a></li>
          <li><a href="/percentages">فیصدی ها</a></li>
          <li><a href="/advancePaid">معاشات پیش پرداخت شده</a></li>
        </ul>
      </li>


      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-user"></i></span>
          <span class="s-text">کارمندان</span>
        </a>
        <ul>
          <li><a href="/addEmployee">اضافه نمودن کارمند جدید</a></li>
          <li><a href="/employees">لیست پرسونل</a></li>
          <li><a href="/addUser">اضافه نمودن کاربر جدید</a></li>
        </ul>
      </li>

      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-pencil-alt"></i></span>
          <span class="s-text">دواخانه</span>
        </a>
        <ul>
          <li><a href="{{ route('dailySalesList') }}">فروشات روزانه</a></li>
          <li><a href="{{ route('addCompanyAdmin') }}">ثبت شرکت جدید</a></li>
          <li><a href="{{ route('doDealsAdmin') }}">اجرای معاملات </a></li>
          <li><a href="{{ route('companyBlanceAdmin') }}">بیلانس شرکت ها (قروض)</a></li>
          <li><a href="{{ route('availableDrugAdmin') }}">دوای موجود (ارزش دواخانه)</a></li>
        </ul>
      </li>

      <!-- <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-flask"></i></span>
          <span class="s-text">لابراتوار</span>
        </a>
        <ul>
          <li><a href="{{ route('addCompanyLab') }}">ثبت شرکت جدید</a></li>
          <li><a href="{{ route('doDealsLab') }}">اجرای معاملات </a></li>
          <li><a href="{{ route('companyBlanceLab') }}">بیلانس شرکت ها (قروض)</a></li>
          <li><a href="/asset">وسایل</a></li>
          <li><a href="{{ route('availableDrugLab') }}">بیلانس کلی</a></li>
        </ul>
      </li>

      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="fa fa-hospital-o"></i></span>
          <span class="s-text">کلینیک دندان</span>
        </a>
        <ul>
          <li><a href="{{ route('addCompanyDental') }}">ثبت شرکت جدید</a></li>
          <li><a href="{{ route('doDealsDental') }}">اجرای معاملات </a></li>
          <li><a href="{{ route('companyBlanceDental') }}">بیلانس شرکت ها (قروض)</a></li>
          <li><a href="/assets">وسایل</a></li>
          <li><a href="{{ route('availableDrugDental') }}">بیلانس کلی</a></li>
        </ul>
      </li> -->

      <li class="with-sub">
        <a href="/doctor" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa  fa-user-md"></i></span>
          <span class="s-text">داکتران</span>
        </a>
      </li>

      <li class="with-sub">
        <a href="/section" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa  fa-user-md"></i></span>
          <span class="s-text">بخش های OPD</span>
        </a>
      </li>

      <li class="with-sub">
        <a href="/student" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa fa-graduation-cap"></i></span>
          <span class="s-text">محصلین (کار آموزان)</span>
        </a>
      </li>

      <li class="with-sub">
        <a href="/generalAssets" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa fa-money"></i></span>
          <span class="s-text">اجناس</span>
        </a>
      </li>

      <li class="with-sub">
        <a href="/balance" class="waves-effect  waves-light">
          <span class="s-icon"><i class="fa  fa-balance-scale"></i></span>
          <span class="s-text">بیلانس</span>
        </a>
      </li>

    </ul>
  </div>
</div>

<!-- Aside End -->
