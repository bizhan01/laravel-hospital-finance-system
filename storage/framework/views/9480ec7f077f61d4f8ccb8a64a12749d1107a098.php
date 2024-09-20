<?php $__env->startSection('content'); ?>
<?php echo $__env->make('pharmacy.aside', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row row-md mb-1">

    <div class="col-md-4">
        <div class="box bg-white user-1">
          <div class="u-img img-cover" style="background-image: url(img/photos-1/4.jpg);"></div>
          <div class="u-content">
            <div class="avatar box-64">
                <img class="b-a-radius-circle shadow-white" src="/UploadedImages/<?php echo e(Auth::user()->profileImage); ?>" height="70px" alt="">
              <i class="status bg-success bottom right"></i>
            </div>
            <h5><a class="text-black" href="#"><?php echo e(Auth::user()->name); ?></a></h5>
            <p class="text-muted pb-0-5">فارمسست</p>
            <div class="text-xs-center pb-0-5">
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a href="editUser/<?php echo e($user->id); ?>"><button type="submit" class="btn btn-primary btn-rounded mr-0-5">ویرایش پروفایل </button></a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <a  href="<?php echo e(route('logout')); ?>"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <button type="submit" class="btn btn-danger btn-rounded">خروج از سیستم</button>
              </a>
              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                  <?php echo csrf_field(); ?>
              </form>
            </div>
          </div>
          <div class="u-counters">
            <div class="row no-gutter">
              <div class="col-xs-12 uc-item">
                <a class="text-black" href="#">
                  <strong>تاریخ</strong> <br>
                  <strong><?php echo date('Y-M-D') ?></strong>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="box box-block bg-white">
          <div class="clearfix mb-1">
            <h5 class="float-xs-left">فروشات امروز</h5>
          </div>
          <div class="row row-md">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-primary mb-2">
									<div class="t-icon right"><i class="ti-receipt"></i></div>
									<div class="t-content">
										<h1 class="mb-1"><?php echo e($today_prescript); ?></h1>
										<h6 class="text-uppercase">نسخه</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-success mb-2">
									<div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
									<div class="t-content">
										<h1 class="mb-1"><?php echo e($today_retail); ?></h1>
										<h6 class="text-uppercase">پرچون</h6>
									</div>
								</div>
							</div>
          </div>
        </div>
      </div>

      <div class="col-md-8">
        <div class="box box-block bg-white">
          <div class="clearfix mb-1">
            <h5 class="float-xs-left">فروشات دیروز</h5>
          </div>
          <div class="row row-md">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-primary mb-2">
									<div class="t-icon right"><i class="ti-receipt"></i></div>
									<div class="t-content">
										<h1 class="mb-1"><?php echo e($yesterday_prescript); ?></h1>
										<h6 class="text-uppercase">نسخه</h6>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="box box-block tile tile-2 bg-success mb-2">
									<div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
									<div class="t-content">
										<h1 class="mb-1"><?php echo e($yesterday_retail); ?></h1>
										<h6 class="text-uppercase">پرچون</h6>
									</div>
								</div>
							</div>
          </div>
        </div>
      </div>
    </div>

    <div class="row row-md">
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box box-block bg-white tile tile-1 mb-2">
          <div class="t-icon right"><span class="bg-success"></span><i class="ti-bar-chart"></i></div>
          <div class="t-content">
            <h6 class="text-uppercase mb-1">جمله فروشات ماه جاری</h6>
            <h1 class="mb-1"><?php echo e($this_month_sales); ?></h1>
            <!-- <span class="tag tag-danger mr-0-5">+17%</span> -->
            <span class="text-muted font-90"><?php echo e(date('Y-M-d')); ?></span>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box box-block bg-white tile tile-1 mb-2">
          <div class="t-icon right"><span class="bg-warning"></span><i class="ti-shopping-cart-full"></i></div>
          <div class="t-content">
            <h6 class="text-uppercase mb-1">جمله خریداری ماه جاری</h6>
            <h1 class="mb-1"><?php echo e($this_month_buy_tot); ?></h1>
            <i class="text-success mr-0-5"></i><span><?php echo e(date('Y-M-d')); ?></span>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box box-block bg-white tile tile-1 mb-2">
          <div class="t-icon right"><span class="bg-primary"></span><i class="fa fa-money"></i></div>
          <div class="t-content">
            <h6 class="text-uppercase mb-1">جمله پرداخت ماه جاری</h6>
            <h1 class="mb-1"><?php echo e($this_month_pay_tot); ?></h1>
            <!-- <span class="tag tag-primary mr-0-5">+125</span> -->
            <span class="text-muted font-90"><?php echo e(date('Y-M-d')); ?></span>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-xs-12">
        <div class="box box-block bg-white tile tile-1 mb-2">
          <div class="t-icon right"><span class="bg-info"></span><i class="ti-package"></i></div>
          <div class="t-content">
            <h6 class="text-uppercase mb-1">دوای موجود</h6>
            <h1 class="mb-1" dir="ltr" style="text-align: right">
              <?php
                  $percent = ($this_month_sales * 0.8);
                  echo $this_month_buy_tot - $percent;
              ?>
            </h1>
            <div id="sparkline1"><canvas width="60" height="20" style="display: inline-block; width: 60px; height: 20px; vertical-align: top;"></canvas></div>
          </div>
        </div>
      </div>
    </div>





  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>