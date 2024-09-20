<?php $__env->startSection('content'); ?>
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ّform start -->
        <center> <h3>ثبت کاربر جدید در سیستم</h3> </center>
          <div class="col-md-2 mb-3 mb-md-0"></div>
          <form method="POST" action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
              <?php echo e(csrf_field()); ?>

              <div class="row form-group" >
                 <div class="col-md-4">
                   <label  for="Field of Study" style="color:black">اسم کامل </label>
                   <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus required placeholder="اسم کامل کاربر">

                   <?php if($errors->has('name')): ?>
                       <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($errors->first('name')); ?></strong>
                       </span>
                   <?php endif; ?>
                   </div>

                   <div class="col-lg-4">
                   <label  for="University Name" style="color:black">ایمیل آدرس</label>
                   <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required required placeholder="someone@domain.com">
                   <?php if($errors->has('email')): ?>
                       <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($errors->first('email')); ?></strong>
                       </span>
                   <?php endif; ?>
                   </div>
                 </div>
               <div class="col-lg-2"></div>
                 <div class="row form-group" >
                   <div class="col-lg-4 ">
                   <label  for="University Name" style="color:black">گذرواژه</label>
                   <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required placeholder="**********">
                   <?php if($errors->has('password')): ?>
                       <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($errors->first('password')); ?></strong>
                       </span>
                   <?php endif; ?>
                   </div>
                   <div class="col-lg-4">
                     <label  for="Field of Study" style="color:black">تکرار گذرواژه </label>
                     <input id="password-confirm" type="password" class="form-control"  name="password_confirmation"  required required placeholder="**********">
                  </div>
              </div>

              <div class="col-lg-2"></div>
                <div class="row form-group" >
                  <div class="col-lg-4 ">
                  <label  for="University Name" style="color:black">وظیفه</label>
                    <select class="form-control" name="isAdmin">
                        <option value="2">معلومات</option>
                        <option value="3">فارمسست</option>
                        <option value="4">لابراتوار</option>
                        <option value="5">کلینیک دندان</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <br>
                    <button type="submit" name="submit" class="btn btn-success btn-lg"> <i class="fa fa-save"></i> اضافه نمودن کارمند </button>
                  </div>
             </div>


              <div class="col-lg-2"></div>
               <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              </form>

                <!-- Content -->
                <div class="content-area py-1">
                  <div class="container-fluid">
                    <div class="box box-block bg-white">
                          <center><h3>مدیر سیستم</h3> </center>
                      <h5 class="mb-1">نمایش اطلاعات</h5>
                      <table class="table table-striped table-bordered dataTable" id="table-2">
                        <thead>
                          <tr>
                            <th>شماره</th>
                            <th>عکس</th>
                            <th>اسم کامل</th>
                            <th>ایمیل</th>
                            <th>ویرایش</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($user->id); ?></td>
                            <td><a href="/UploadedImages/<?php echo e($user->profileImage); ?>"><img style="height: 30px" src="UploadedImages/<?php echo e($user->profileImage); ?>" alt="" /> </a></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><a href = 'editUser/<?php echo e($user->id); ?>'><i class="fa fa-edit" style="color: blue"></i></a></td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              <!-- Content -->
              <div class="content-area py-1">
                <div class="container-fluid">
                  <div class="box box-block bg-white">
                        <center><h3>پذیرش</h3> </center>
                    <h5 class="mb-1">نمایش اطلاعات</h5>
                    <table class="table table-striped table-bordered dataTable" id="table-2">
                      <thead>
                        <tr>
                          <th>شماره</th>
                          <th>عکس</th>
                          <th>اسم کامل</th>
                          <th>ایمیل</th>
                          <th>حذف</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $receptionist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($user->id); ?></td>
                          <td><a href="/UploadedImages/<?php echo e($user->profileImage); ?>"><img style="height: 30px" src="UploadedImages/<?php echo e($user->profileImage); ?>" alt="" /> </a></td>
                          <td><?php echo e($user->name); ?></td>
                          <td><?php echo e($user->email); ?></td>
                          <td><a href = 'deleteUser/<?php echo e($user->id); ?>' onclick='return confirm("حذف شود؟")'> <i class="fa fa-close" style="color: red"></i></a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- Content -->
              <div class="content-area py-1">
                <div class="container-fluid">
                  <div class="box box-block bg-white">
                        <center><h3>فارمسست ها</h3> </center>
                    <h5 class="mb-1">نمایش اطلاعات</h5>
                    <table class="table table-striped table-bordered dataTable" id="table-2">
                      <thead>
                        <tr>
                          <th>شماره</th>
                          <th>عکس</th>
                          <th>اسم کامل</th>
                          <th>ایمیل</th>
                          <th>حذف</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $pharmacist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($user->id); ?></td>
                          <td><a href="/UploadedImages/<?php echo e($user->profileImage); ?>"><img style="height: 30px" src="UploadedImages/<?php echo e($user->profileImage); ?>" alt="" /> </a></td>
                          <td><?php echo e($user->name); ?></td>
                          <td><?php echo e($user->email); ?></td>
                          <td><a href = 'deleteUser/<?php echo e($user->id); ?>' onclick='return confirm("حذف شود؟")'> <i class="fa fa-close" style="color: red"></i></a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
      <!--Form End -->
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>