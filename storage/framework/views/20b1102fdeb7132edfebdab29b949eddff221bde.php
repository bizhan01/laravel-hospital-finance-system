<?php $__env->startSection('content'); ?>
<?php echo $__env->make('dental.aside', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
      <center> <h3>ثبت وسایل کینیک دندان</h3> </center>
       <form method="POST" action="/asset" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <input type="hidden" name="type" value="1">
          <div class="row form-group">
              <div class="col-md-3">
                <label for="profession" style="color: black">اسم جنس</label>
                <input type="text" name="item" value=""  class="form-control" placeholder="اسم جنس"  required>
              </div>
              <div class="col-md-3">
                <label for="fullName" style="color: black">مدل</label>
                <input type="text" name="model" value="" class="form-control" placeholder="مدل" required>
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">تعداد</label>
                <input type="text" name="quantity" value=""  class="form-control" placeholder="تعداد" required>
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">ملاحظات</label>
                <input type="text" name="description" value=""  class="form-control" placeholder="ملاحظات" required>
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
      <center><h3>لیست وسایل موجود در کلینیک</h3></center>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>اسم جنس</th>
            <th>مدل</th>
            <th>تعداد</th>
            <th>توضیحات</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($asset->item); ?></td>
            <td><?php echo e($asset->model); ?></td>
            <td><?php echo e($asset->quantity); ?></td>
            <td><?php echo e($asset->description); ?></td>
            <td>
              <a href="<?php echo e(URL::to('asset/' . $asset->id . '/edit')); ?>"> <input type="button"  value="ویرایش" class="btn btn-info"> </a>
            </td>
            <td>
              <form action="<?php echo e(url('asset', [$asset->id])); ?>" method="POST">
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