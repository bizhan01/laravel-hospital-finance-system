<?php $__env->startSection('content'); ?>
<br>
<div class="container-fluid">
  <h3>صورت حساب مالی شعبه لابراتوار</h3>
  <h6><?php echo e(date('Y-M')); ?></h6>
  <div class="row row-md">
    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-4 col-md-6 col-xs-12">
      <div class="box box-block bg-white tile tile-1 mb-2">
        <div class="t-icon right"><span class="bg-warning"></span><i class="ti-shopping-cart-full"></i></div>
        <div class="t-content">
          <h6 class="text-uppercase mb-1">جمله خریداری ماه جاری</h6>
          <h1 class="mb-1"><?php echo e($transaction->buy_tot); ?></h1>
          <!-- <span class="tag tag-danger mr-0-5">+17%</span> -->
          <span class="text-muted font-90"><?php echo e(date('Y-M-d')); ?></span>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-xs-12">
      <div class="box box-block bg-white tile tile-1 mb-2">
        <div class="t-icon right"><span class="bg-primary"></span><i class="fa fa-dollar"></i></div>
        <div class="t-content">
          <h6 class="text-uppercase mb-1">جمله پرداخت ماه جاری</h6>
          <h1 class="mb-1"><?php echo e($transaction->pay_tot); ?></h1>
          <i class="text-success mr-0-5"></i><span><?php echo e(date('Y-M-d')); ?></span>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-xs-12">
      <div class="box box-block bg-white tile tile-1 mb-2">
        <div class="t-icon right"><span class="bg-danger"></span><i class="fa fa-money"></i></div>
        <div class="t-content">
          <h6 class="text-uppercase mb-1">قرضداری ها</h6>
          <h1 class="mb-1"><?php echo e($transaction->buy_tot - $transaction->pay_tot); ?></h1>
          <!-- <span class="tag tag-primary mr-0-5">+125</span> -->
          <span class="text-muted font-90"><?php echo e(date('Y-M-d')); ?></span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row row-md">
    <div class="col-lg-6 col-md-6 col-xs-12">
      <div class="box box-block bg-white tile tile-1 mb-2">
        <div class="t-icon right"><span class="bg-success"></span><i class="ti-bar-chart"></i></div>
        <div class="t-content">
          <h6 class="text-uppercase mb-1">جمله عواید ماه جاری</h6>
          <h1 class="mb-1"><?php echo e($revenues); ?></h1>
          <!-- <span class="tag tag-danger mr-0-5">+17%</span> -->
          <span class="text-muted font-90"><?php echo e(date('Y-M-d')); ?></span>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">
      <div class="box box-block bg-white tile tile-1 mb-2">
        <div class="t-icon right"><span class="bg-info"></span><i class="fa fa-balance-scale"></i></div>
        <div class="t-content">
          <h6 class="text-uppercase mb-1">بیلانس</h6>
          <h1 class="mb-1" dir="ltr" style="text-align: right"><?php echo e($revenues - $transaction->pay_tot); ?></h1>
          <div id="sparkline1"><canvas width="60" height="20" style="display: inline-block; width: 60px; height: 20px; vertical-align: top;"></canvas></div>
        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>