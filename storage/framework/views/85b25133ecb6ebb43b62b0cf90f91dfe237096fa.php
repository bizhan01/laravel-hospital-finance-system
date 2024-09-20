<?php $__env->startSection('content'); ?>
<?php echo $__env->make('pharmacy.aside', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <h5 class="mb-1">دوای موجود (ارزش دواخانه)</h5>
            <table class="table table-striped table-bordered dataTable">
                <thead>
                    <tr>
                        <!-- <th>شماره</th> -->
                        <!-- <th>نام شرکت</th> -->
                        <th style="direction: ltr; text-align: center">جمله خرید</th>
                        <th style="direction: ltr; text-align: center">جمله پرداخت</th>
                        <th style="direction: ltr; text-align: center">قرضداری</th>
                        <th style="direction: ltr; text-align: center">جمله فروش</th>
                        <th style="direction: ltr; text-align: center">دوای موجود</th>
                        <!-- <th>عملیات</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <!-- <td>شماره</td> -->
                            <!-- <td>نام شرکت</td> -->
                            <td style="direction: ltr; text-align: center"><?php echo e($transaction->buy_tot); ?></td>
                            <td style="direction: ltr; text-align: center"><?php echo e($transaction->pay_tot); ?></td>
                            <td style="direction: ltr; text-align: center">
                                <?php 
                                    $buy_tot = $transaction->buy_tot;
                                    $pay_tot = $transaction->pay_tot;
                                    $sub = $buy_tot - $pay_tot;
                                    echo $sub;
                                ?>
                            </td>
                            <td style="direction: ltr; text-align: center"><?php echo e($sales); ?></td>
                            <td style="direction: ltr; text-align: center">
                                <?php
                                    $percent = ($sales * 0.8);
                                    echo $transaction->buy_tot - $percent;
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <!-- <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="حدف">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="ویرایش">
                                <i class="fa fa-edit text-primary"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="بیشتر">
                                <i class="fa fa-info text-info"></i>
                            </a>
                        </th>
                    </tr> -->
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>