<!-- Sidebar -->
<div class="site-overlay"></div>
<div class="site-sidebar" style="background-color: #373944">
  <div class="custom-scroll custom-scroll-light">
    <ul class="sidebar-menu">
      <li class="with-sub">
        <a href="/" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-anchor"></i></span>
          <span class="s-text">خانه</span>
        </a>
      </li>
      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-pencil-alt"></i></span>
          <span class="s-text">دواخانه</span>
        </a>
        <ul>
          <li><a href="{{ route('dailySales') }}">فروشات روزانه</a></li>
          <li><a href="{{ route('addCompany') }}">ثبت شرکت جدید</a></li>
          <li><a href="{{ route('doDeals') }}">اجرای معاملات </a></li>
          <li><a href="{{ route('companyBlance') }}">بیلانس شرکت ها (قروض)</a></li>
          <li><a href="{{ route('availableDrug') }}">دوای موجود (ارزش دواخانه)</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>

<!-- Aside End -->
