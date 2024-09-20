<?php if(auth()->user()->isAdmin == 1): ?>
  <?php echo $__env->make('admin.adminDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif(auth()->user()->isAdmin == 3): ?>
  <?php echo $__env->make('pharmacy.pharmacistDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif(auth()->user()->isAdmin == 4): ?>
  <?php echo $__env->make('lab.labDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif(auth()->user()->isAdmin == 5): ?>
  <?php echo $__env->make('dental.dentalDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
  <?php echo $__env->make('reception.receptionistDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
