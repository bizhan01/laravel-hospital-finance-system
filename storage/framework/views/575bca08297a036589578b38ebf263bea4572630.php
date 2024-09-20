<?php $__env->startSection('content'); ?>
<?php echo $__env->make('reception.aside', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="/js/jquery.min.js"> </script>
<script src="/js/math.js"> </script>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
      <!-- ُSuccess Flash Message -->
					<?php if($success = session('success')): ?>
					<div class="alert alert-success alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
							<div><?php echo e($success); ?></div>
					</div>
					<?php endif; ?>
      <center> <h3>ثبت فیصدی های گرفته شده</h3> </center>
       <form method="POST" action="/percentage" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

            <div class="row form-group">
              <div class="col-md-3">
                <label for="fullName" style="color: black">اسم دکتر</label>
                <select class="form-control" name="docName" required>
                    <option value="">انتخاب کیند</option>
                    <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($doctor->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">پروسیجر</label>
                <select class="form-control" name="procedure" required>
                  <option value="">انتخاب کیند</option>
                  <option>OPD فیس</option>
                  <option>التراسوند</option>
                  <option>بستر</option>
                  <option>عملیات</option>
                  <option>ایکو</option>
                  <option>داپلر</option>
                  <option>PFT</option>
                  <option>اندوسکوپی</option>
                  <option>PRP</option>
                  <option>امبولانس</option>
                  <option>نوکریوالی</option>
                  <option>سایر</option>
                </select>
              </div>
              <div class="col-md-2">
                <label for="profession" style="color: black">عاید کلی</label>
                <input type="number" name="income" value="" id="fn" class="form-control"  placeholder="عاید کلی" required>
              </div>
              <div class="col-md-2">
                <label for="profession" style="color: black">فیصدی دکتر</label>
                <input type="number" name="percentage" value="" id="sn" class="form-control"  placeholder="فیصدی دکتر" required>
              </div>
              <div class="col-md-2">
                <label for="profession" style="color: black">فیصدی شفاخانه</label>
                <input type="number" readonly name="total" value="" id="sub" class="form-control"  placeholder="فیصدی شفاخانه" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6">
                <button type="submit" class="btn btn-success btn-rounded"><li class="fa fa-save"></li> ذخیره نمودن</button>&nbsp &nbsp
                <button type="reset" class="btn btn-primary btn-rounded"><li class="fa fa-refresh"></li> لغو عملیات</button>
              </div>
            </div>
          <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </form>
        <!--Form End -->
    </div>
  </div>
</div>
<br>

<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <h5 class="mb-1">نمایش کامل لیست فیصدی ها اخذ شده</h5>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>اسم دکتر</th>
            <th>پروسیجر</th>
            <th>فیس</th>
            <th>فیصدی دکتر</th>
            <th>فیصدی شفاخانه</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum1=0; $sum2=0; $sum3=0; ?>
          <?php $__currentLoopData = $percentages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $percentage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($percentage->id); ?></td>
            <td><?php echo e($percentage->docName); ?></td>
            <td><?php echo e($percentage->procedure); ?></td>
            <td><?php echo e($percentage->income); ?></td>
            <td><?php echo e($percentage->percentage); ?></td>
            <td><b><?php echo e($percentage->total); ?></b></td>
            <td>
              <a href="<?php echo e(URL::to('percentage/' . $percentage->id . '/edit')); ?>"> <input type="button"  value="ویرایش" class="btn btn-info"> </a>
            </td>
            <td>
              <form action="<?php echo e(url('percentage', [$percentage->id])); ?>" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                  <button type="submit"  onclick='return confirm("خذف شود؟")' class="btn btn-danger">حذف</button>
              </form>
            </td>
          </tr>
          <?php $sum1 += $percentage->income; $sum2 += $percentage->percentage; $sum3 += $percentage->total; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <tfoot>
            <tr>
              <th colspan="3">جمله</th>
              <th colspan="1"><?php echo $sum1; ?></th>
              <th colspan="1" style="color: red"><?php echo $sum2; ?></th>
              <th colspan="3"><?php echo $sum3; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>