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
      <center> <h3>ثبت محصل جدید</h3> </center>
       <form method="POST" action="/student" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="row form-group">
              <div class="col-md-6">
                <label for="profession" style="color: black">اسم محصل</label>
                <input type="text" name="stdName" value=""  class="form-control"  placeholder="اسم محصل" required>
              </div>
              <div class="col-md-6">
                <label for="fullName" style="color: black">نهاد تحصیلی</label>
                <input type="text" name="schoolName" value="" class="form-control" placeholder="نهاد تحصیلی" required>
              </div>
          </div>
          <div class="row form-group">
              <div class="col-md-4">
                <label for="profession" style="color: black">رشته</label>
                <input type="text" name="department" value=""  class="form-control" placeholder="رشته" required>
              </div>
              <div class="col-md-4">
                <label for="profession" style="color: black">زمان</label>
                <select class="form-control" name="shift">
                  <option value="">انتخاب کیند</option>
                  <option>قبل از ظهر</option>
                  <option>بعد از ظهر</option>
                  <option>شبانه</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="profession" style="color: black">فیس</label>
                <input type="number" name="fee" value=""  class="form-control" placeholder="فیس" required>
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
      <center><h3>لیست محصلین</h3></center>
      <!-- Archive Start -->
       <div class="dropdown pull-right">
           <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
               انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
           </a>
           <div class="dropdown-menu dropdown-menu-right">
               <!-- item-->
               <?php $__currentLoopData = $archives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li>
                 <a href="/student/?month=<?php echo e($stats['month']); ?>&year=<?php echo e($stats['year']); ?>" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                   <?php echo e($stats['month']. ' ' .$stats['year']); ?>

                 </a>
                </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <a href="/student" class="dropdown-item form-control">همه</a>
           </div>
       </div><br>
       <!-- Archive End -->
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>اسم محصل</th>
            <th>نهاد تحصلی</th>
            <th>رشته</th>
            <th>زمان</th>
            <th>فیس</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($student->id); ?></td>
            <td><?php echo e($student->stdName); ?></td>
            <td><?php echo e($student->schoolName); ?></td>
            <td><?php echo e($student->department); ?></td>
            <td><?php echo e($student->shift); ?></td>
            <td><?php echo e($student->fee); ?></td>
            <td>
              <a href="<?php echo e(URL::to('student/' . $student->id . '/edit')); ?>"> <input type="button"  value="ویرایش" class="btn btn-info"> </a>
            </td>
            <td>
              <form action="<?php echo e(url('student', [$student->id])); ?>" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                  <button type="submit"  onclick='return confirm("حذف شود؟")' class="btn btn-danger">حذف</button>
              </form>
            </td>
          </tr>
          <?php $sum += $student->fee; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <tfoot>
            <tr>
              <th colspan="4">جمله عواید</th>
              <th colspan="3"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>