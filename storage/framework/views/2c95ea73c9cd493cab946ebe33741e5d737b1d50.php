<?php $__env->startSection('content'); ?>
<?php echo $__env->make('dental.aside', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="content-area py-1">
    <div class="container-fluid">
    <div class="box box-block bg-white">
        <h5 class="mb-1">جدول بیلانس شرکت ها (قروض)</h5>
        <table class="table table-striped table-bordered dataTable" id="table-2">
            <thead>
                <tr>
                    <th>شماره</th>
                    <th>نام شرکت</th>
                    <th>جمله خرید</th>
                    <th>جمله پرداخت</th>
                    <th>بیلانس</th>
                    <!-- <th>عملیات</th> -->
                </tr>
            </thead>
            <tbody>
                <?php $total = 0?>
                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key + 1); ?></td>
                        <td><?php echo e($transaction->company_name); ?></td>
                        <td style="direction: ltr; text-align: center"><?php echo e($transaction->buy_tot); ?></td>
                        <td style="direction: ltr; text-align: center"><?php echo e($transaction->pay_tot); ?></td>
                        <td style="direction: ltr; text-align: center">
                            <?php
                                $buy_tot = $transaction->buy_tot;
                                $pay_tot = $transaction->pay_tot;
                                $sum = $buy_tot - $pay_tot;
                                $total += $sum;
                                echo $sum;
                            ?>
                        </td>
                        <!-- <td>
                            <a href="" data-url="" data-msg="حذف شود ؟" data-toggle="tooltip" data-placement="top" title="حدف">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="ویرایش">
                                <i class="fa fa-edit text-primary"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="بیشتر">
                                <i class="fa fa-info text-info"></i>
                            </a>
                        </td> -->
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="direction: ltr; text-align: center"><?php echo e($total); ?></th>
                    <!-- <th></th> -->
                </tr>
            </tfoot>
        </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>