<?php $__env->startSection('content'); ?>
<?php echo $__env->make('reception.aside', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="col-md-12">
  <div class="box bg-white user-2">
    <br>
    <center><h3>ویرایش اطلاعات پروفایل</h3></center>
    <form action = "/editUser/<?php echo $users[0]->id; ?>" method = "post" enctype="multipart/form-data" >
       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <?php echo e(csrf_field()); ?>

          <div class="col-lg-2 col-md-2 col-sm-2"></div>
          <div class="row form-group">
             <div class="col-md-8 ">
               <label  for="Field of Study" style="color:black">اسم کامل </label>
               <input type="text"    name="name" value="<?php echo e(Auth::user()->name); ?>" class="form-control" placeholder="اسم کامل" >
               <input type="hidden"  name="email" value="<?php echo e(Auth::user()->email); ?>">
               <input type="hidden"  name="password" value="<?php echo e(Auth::user()->password); ?>">
               <input type="hidden"  name="isAdmin" value="<?php echo e(Auth::user()->isAdmin); ?>">
               <input type="hidden"  name="status" value="<?php echo e(Auth::user()->status); ?>">
            </div>
          </div>
         <div class="col-lg-2 col-md-2 col-sm-2"></div>
           <div class="row form-group">
              <div class="col-md-8 ">
                <label  for="University Name" style="color:black">تصویر پروفایل</label>
                <input type="hidden"  name="image" value="<?php echo e(Auth::user()->profileImage); ?>">
                <input type="file" name="image" id="input-file-now" class="dropify" data-default-file="/UploadedImages/<?php echo e(Auth::user()->profileImage); ?>" />
              </div>
           </div>
          <div class="col-lg-2 col-md-2 col-sm-2"></div>
          <div class="row form-group">
             <div class="col-md-4">
               <button type="submit" name="submit" class="btn btn-success btn-lg"> <i class="fa fa-save"></i> ذخیره سازی</button>
             </div>
          </div>
          <?php echo $__env->make('layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>