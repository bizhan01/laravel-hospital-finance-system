<?php $__env->startSection('content'); ?>
<?php echo $__env->make('reception.aside', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row row-md mb-1">
      <div class="col-lg-4 col-md-4 col-sm-4"> </div>
      <div class="col-md-4">
        <div class="box bg-white user-1">
          <div class="u-img img-cover" style="background-image: url(img/photos-1/4.jpg);"></div>
          <div class="u-content">
            <div class="avatar box-64">
                <img class="b-a-radius-circle shadow-white" src="/UploadedImages/<?php echo e(Auth::user()->profileImage); ?>" height="70px" alt="">
              <i class="status bg-success bottom right"></i>
            </div>
            <h5><a class="text-black" href="#"><?php echo e(Auth::user()->name); ?></a></h5>
            <p class="text-muted pb-0-5">پذیرش</p>
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
    </div>

    <!-- today's revenue start -->
    <div class="row row-md">
      <center><h3>عواید و مصارف امروز</h3></center>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-success mb-2">
          <div class="t-icon right"><i class="ti-bar-chart"></i></div>
          <div class="t-content">
            <h1 class="mb-1"><?php echo e($revenues = $todayPatients + $todayOperations); ?></h1>
            <h6 class="text-uppercase">جمله عواید</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-info mb-2">
          <div class="t-icon right"><i class="fa fa-money"></i></div>
          <div class="t-content">
            <h1 class="mb-1"><?php echo e($todayExpenses); ?></h1>
            <h6 class="text-uppercase">جمله مصارف</h6>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-primary mb-2">
          <div class="t-icon right"><i class="fa fa-percent"></i></div>
          <div class="t-content">
            <h1 class="mb-1"><?php echo e($todayPercentages); ?></h1>
            <h6 class="text-uppercase">جمله فیصدی ها</h6>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-danger mb-2">
          <div class="t-icon right"><i class="fa  fa-balance-scale"></i></div>
          <div class="t-content">
            <h1 class="mb-1" dir="ltr" style="text-align: right"><?php echo e($revenues - $todayExpenses - $todayPercentages); ?></h1>
            <h6 class="text-uppercase">بیلانس</h6>
          </div>
        </div>
      </div>

    </div>
    <!-- today's revenue end -->
    <br></br>

    <!-- yesterday's revenue start -->
    <div class="row row-md">
      <h3>عواید و مصارف دیروز (24 ساعت گذشته)</h3>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-success mb-2">
          <div class="t-icon right"><i class="ti-bar-chart"></i></div>
          <div class="t-content">
            <h1 class="mb-1"><?php echo e($revenues = $yesterdayPatients +  $yesterdayOperations); ?></h1>
            <h6 class="text-uppercase">جمله عواید</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-info mb-2">
          <div class="t-icon right"><i class="fa fa-money"></i></div>
          <div class="t-content">
            <h1 class="mb-1"><?php echo e($yesterdayExpenses); ?></h1>
            <h6 class="text-uppercase">جمله مصارف</h6>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-primary mb-2">
          <div class="t-icon right"><i class="fa fa-percent"></i></div>
          <div class="t-content">
            <h1 class="mb-1"><?php echo e($yesterdayPercentages); ?></h1>
            <h6 class="text-uppercase">جمله فیصدی ها</h6>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-danger mb-2">
          <div class="t-icon right"><i class="fa  fa-balance-scale"></i></div>
          <div class="t-content">
            <h1 class="mb-1" dir="ltr" style="text-align: right"><?php echo e($revenues - $yesterdayExpenses - $yesterdayPercentages); ?></h1>
            <h6 class="text-uppercase">بیلانس</h6>
          </div>
        </div>
      </div>
    </div>
    <!-- yesterday's revenue end -->

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>