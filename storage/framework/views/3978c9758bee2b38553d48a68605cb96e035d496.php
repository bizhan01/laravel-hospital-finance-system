<?php $__env->startSection('content'); ?>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box bg-white box-block ">
       <center><h3>لیست وسایل خریداری شده (سرمایه های ثابت)</h3></center>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               <?php $__currentLoopData = $archives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li>
                 <a href="/assets/?month=<?php echo e($stats['month']); ?>&year=<?php echo e($stats['year']); ?>" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   <?php echo e($stats['month']. ' ' .$stats['year']); ?>

                 </a>
                </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <a href="/assets" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class="table table-info table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>سریال نمبر</th>
            <th>اسم محصول</th>
            <th>تاریخ خرید</th>
            <th>موقیعت</th>
            <th>نمبر بل</th>
            <th>قیمت</th>
            <th>تعداد</th>
            <th>واحد</th>
            <th>جمله</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($product->id); ?></td>
            <td><?php echo e($product->item); ?></td>
            <td><?php echo e($product->created_at); ?></td>
            <td><?php echo e($product->consumer); ?></td>
            <td><?php echo e($product->billNumber); ?></td>
            <td><?php echo e($product->price); ?></td>
            <td><?php echo e($product->quantity); ?></td>
            <td><?php echo e($product->unit); ?></td>
            <td><?php echo e($product->total); ?></td>
          </tr>
            <?php $sum += $product->total; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <tfoot>
            <tr>
              <th colspan="6">جمله</th>
              <th colspan="2" style="text-align: center"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>