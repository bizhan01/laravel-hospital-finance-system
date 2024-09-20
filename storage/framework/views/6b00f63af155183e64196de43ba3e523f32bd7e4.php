<?php $__env->startSection('content'); ?>
<?php echo $__env->make('pharmacy.aside', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="content-area py-1">
    <div class="container-fluid">
        <?php if($errors->any()): ?>
        <ul class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php endif; ?>

        <!-- error area -->
        <?php if($success = session('success')): ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div><?php echo e($success); ?></div>
        </div>
        <?php endif; ?>
        <!-- error area -->
        <?php if($failed = session('failed')): ?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div><?php echo e($failed); ?></div>
        </div>
        <?php endif; ?>

        <div class="box box-block bg-white">
            <h5>اجرای معامله جدید</h5>
            <!-- <p class="font-90 text-muted mb-1">مشخصات شرکت جدید را وارد کنید</p> -->
            <br>
            <form method="POST" action="<?php echo e(route('saveDeals')); ?>">
                <?php echo csrf_field(); ?>
               <input type="hidden" name="type" value="0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>نام شرکت</label>
                            <select name="company_name" id="select2-demo-1" class="form-control" data-plugin="select2" style="padding: 0px" required oninvalid="this.setCustomValidity('نام شرکت را انتخاب کنید')">
                                <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($comp->name); ?>"><?php echo e($comp->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="font-90 text-muted">&nbsp;</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>تاریخ</label>
                            <input type="date" name="transaction_date" class="form-control" >
                            <span class="font-90 text-muted">&nbsp;</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">مبلغ خرید</span>
                            <input type="number" name="buy_tot" class="form-control">
                            <span class="input-group-addon">نمبر بل</span>
                            <input type="number" name="buy_invice_no" min="0" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">مبلغ پرداخت</span>
                            <input type="number" name="pay_tot" class="form-control">
                            <span class="input-group-addon">نمبر بل</span>
                            <input type="number" name="pay_invice_no" min="0" class="form-control">
                        </div>
                    </div>
                </div>

                <br>
                <div class="row form-group">
                  <div class="col-md-12" >
                    <label for="">توضیحات معامله (خرید)</label>
                    <textarea name="description" class="form-control" id="exampleTextarea" rows="3" placeholder="در اینجا میتوانید در حداکثر چند کلمه در مورد توضیحات اضافی معامله (خرید محصول) بنوسید." ></textarea>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-edit"></i>
                                <span>ذخیره</span>
                            </button>
                            <button type="reset" class="btn btn-warning">
                                <i class="fa fa-undo"></i>
                                <span>لغو</span>
                            </button>
                        </div>
                    </div>
                </div>


            </form>
        </div>

    </div>
</div>

<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            <h5 class="mb-1">لست شرکت های ثبت شده</h5>
            <table class="table table-striped table-bordered dataTable" id="table-2">
                <thead>
                    <tr>
                        <th>شماره</th>
                        <th>نام شرکت</th>
                        <th>مبلغ خرید</th>
                        <th>بل خرید</th>
                        <th>مبلغ پرداخت</th>
                        <th>بل پرداخت</th>
                        <th>تاریخ</th>
                        <th>توضیحات</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($row + 1); ?></td>
                            <td><?php echo e($transaction->company_name); ?></td>
                            <td><?php echo e($transaction->buy_tot); ?></td>
                            <td style="direction: ltr; text-align: center"><?php echo e($transaction->buy_invice_no); ?></td>
                            <td><?php echo e($transaction->pay_tot); ?></td>
                            <td style="direction: ltr; text-align: center"><?php echo e($transaction->pay_invice_no); ?></td>
                            <td style="direction: ltr; text-align: center">
                                <?php $date = strtotime($transaction->transaction_date)?>
                                <?php echo e(date('Y-M-d', $date)); ?>

                            </td>
                            <td><?php echo e($transaction->description); ?></td>
                            <td>
                                <a href="" class="delete" data-url="deleteDeal/<?php echo e($transaction->id); ?>" data-msg="حدف شود ؟" data-toggle="tooltip" data-placement="top" title="حدف">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                                <a href="<?php echo e(url('editDeal').'/'.$transaction->id); ?>" data-toggle="tooltip" data-placement="top" title="ویرایش">
                                    <i class="fa fa-edit text-primary"></i>
                                </a>
                                <!-- <a href="#" data-toggle="tooltip" data-placement="top" title="بیشتر">
                                    <i class="fa fa-info text-info"></i>
                                </a> -->
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>