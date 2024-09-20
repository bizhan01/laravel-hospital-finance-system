<?php $__env->startSection('content'); ?>
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
      <center> <h3>ثبت دکتران برای نمایش در شعبه اطلاعات</h3> </center>
       <form method="POST" action="/doctor" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="row form-group">
              <div class="col-md-6">
                <label for="profession" style="color: black">اسم دکتر</label>
                <input type="text" name="name" value=""  class="form-control" placeholder="اسم دکتر"  required>
              </div>
              <div class="col-md-6">
                <label for="fullName" style="color: black">وظیفه</label>
                <input type="text" name="position" value="" class="form-control" placeholder="وظیفه" required>
              </div>
            </div>

            <div class="row form-group">
                <div class="col-md-6">
                    <input type="submit" name="submit" value="ذخیره" class="btn btn-success ">
                </div>
              </div>
          <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </form>
      <!--Form End -->
    </div>
  </div>
</div>

<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <center><h3>لیست دکتران</h3></center>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>اسم دکتر</th>
            <th>وظیفه</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($doctor->id); ?></td>
            <td><?php echo e($doctor->name); ?></td>
            <td><?php echo e($doctor->position); ?></td>
            <td>
              <a href="<?php echo e(URL::to('doctor/' . $doctor->id . '/edit')); ?>"> <input type="button"  value="ویرایش" class="btn btn-info"> </a>
            </td>
            <td>
              <form action="<?php echo e(url('doctor', [$doctor->id])); ?>" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                  <button type="submit"  onclick='return confirm("حذف شود؟")' class="btn btn-danger">حذف</button>
              </form>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>