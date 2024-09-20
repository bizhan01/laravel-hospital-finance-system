<!-- Header -->
<div class="site-header">
  <nav class="navbar navbar-light">
    <div class="navbar-left">
      <a class="navbar-brand" href="/home">
        <div class="logo"></div>
      </a>
      <div class="toggle-button dark sidebar-toggle-first float-xs-left hidden-md-up">
        <span class="hamburger"></span>
      </div>
      <div class="toggle-button-second dark float-xs-right hidden-md-up">
        <i class="ti-arrow-right"></i>
      </div>
      <div class="toggle-button dark float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1">
        <span class="more"></span>
      </div>
    </div>
    <div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">
      <div class="toggle-button light sidebar-toggle-second float-xs-left hidden-sm-down">
        <span class="hamburger"></span>
      </div>
      <div class="toggle-button-second light float-xs-right hidden-sm-down">
      <a href="/home"><li class="fa fa-home" style="color: black; font-size: 20px"></li></a>
      </div>
      <ul class="nav navbar-nav float-md-right">


        <li class="nav-item dropdown hidden-sm-down">
          <a href="#" data-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
            <span class="avatar box-32">
              <img src="/UploadedImages/{{Auth::user()->profileImage}}" height="40px" alt="">
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right animated fadeInUp">


            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="ti-power-off mr-0-5"> خروج</i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

          </div>
        </li>
      </ul>
    </div>
  </nav>
</div>
