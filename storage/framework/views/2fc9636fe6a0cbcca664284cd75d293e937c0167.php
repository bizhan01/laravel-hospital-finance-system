<?php $__env->startSection('content'); ?>
<?php echo $__env->make('reception.aside', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="js/jquery.min.js"> </script>
<script src="js/sum.js"> </script>
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
      <center> <h3>ثبت مریض جدید</h3> </center>
       <form method="POST" action="/patient" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

            <div class="row form-group">
              <div class="col-md-3">
                <label for="profession" style="color: black">اسم مریض</label>
                <input type="text" name="patientName" value=""  class="form-control"  placeholder="اسم مریض">
              </div>

              <div class="col-md-3">
                <label for="profession" style="color: black">OPD</label>
                  <select class="form-control" name="OPD" >
                    <option value="">انتخاب کنید</option>
                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option><?php echo e($section->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              </div>

              <div class="col-md-3">
                <label for="fullName" style="color: black">اسم دکتر</label>
                <select class="form-control" name="docName">
                  <option value="">انتخاب کیند</option>
                  <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option><?php echo e($doctor->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

              <div class="col-md-3">
                <label for="profession" style="color: black">فیس معاینات سراپا</label>
                <input type="text" name="fee"  min="0" value=""  class="form-control txt"  placeholder="فیس معاینات سراپا">
              </div>

            </div>

            <div class="row form-group">
              <div class="col-md-3">
                <label for="profession" style="color: black">دواخانه</label>
                <input type="text" name="perscription" value=""  class="form-control txt"  placeholder="دواخانه">
              </div>
              <div class="col-md-3">
                <label for="fullName" style="color: black">پرچون</label>
                <input type="text" name="retail" value="" class="form-control txt" placeholder="پرچون" >
              </div>
              <div class="col-md-3">
                <label for="fullName" style="color: black">عاجل</label>
                <input type="text" name="emergency" value="" class="form-control txt" placeholder="عاجل" >
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">لابراتوار</label>
                <input type="text" name="lab" value=""  class="form-control txt" placeholder="لابراتوار">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-3">
                <label for="profession" style="color: black">اکسری</label>
                <input type="text" name="xray" value=""  class="form-control txt"  placeholder="اکسری">
              </div>
              <div class="col-md-3">
                <label for="fullName" style="color: black">التراسوند</label>
                <input type="text" name="US" value="" class="form-control txt" placeholder="التراسوند" >
              </div>
              <div class="col-md-3">
                <label for="fullName" style="color: black">دندان</label>
                <input type="text" name="dental" value="" class="form-control txt" placeholder="دندان" >
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">فزیوتراپی</label>
                <input type="text" name="physicalTherapy" value=""  class="form-control txt" placeholder="فزیوتراپی">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-3">
                <label for="profession" style="color: black">ایکو</label>
                <input type="text" name="echo" value=""  class="form-control txt"  placeholder="ایکو">
              </div>
              <div class="col-md-3">
                <label for="fullName" style="color: black">داپلر</label>
                <input type="text" name="doblar" value="" class="form-control txt" placeholder="داپلر" >
              </div>
              <div class="col-md-3">
                <label for="fullName" style="color: black">PFT</label>
                <input type="text" name="pft" value="" class="form-control txt" placeholder="PFT" >
              </div>
              <div class="col-md-3">
                <label for="profession" style="color: black">اندوسکوپی</label>
                <input type="text" name="endoscopy" value=""  class="form-control txt" placeholder="اندوسکوپی">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-md-3">
                <label for="profession" style="color: black">امبولانس</label>
                <input type="text" name="ambulance" value=""  class="form-control txt"  placeholder="امبولانس">
              </div>
              <div class="col-md-3">
                <label for="fullName" style="color: black">بستر</label>
                <input type="text" name="bed" value="" class="form-control txt" placeholder="بستر" >
              </div>

              <div class="col-md-3">
                <label for="profession" style="color: black">سایر</label>
                <input type="text" name="other" value=""  class="form-control txt" placeholder="سایر">
              </div>

              <div class="col-md-3">
                <label for="profession" style="color: black">جمله</label>
                <input type="text" name="total" readonly value=""  class="form-control" id="total" placeholder="مبلغ قابل پرداخت (جمله کل)">
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


<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 box box-block bg-white">
      <h5 class="mb-1">نمایش لیست کامل مراجعین</h5>
      <table class="table table-responsive table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th data-priority="1">شماره</th>
            <th data-priority="1">تاریخ</th>
            <th data-priority="1">اسم مریض</th>
            <th data-priority="3">OPD</th>
            <th data-priority="1">دکتر</th>
            <th data-priority="1">فیس</th>
            <th data-priority="3">دواخانه </th>
            <th data-priority="3">پرچون</th>
            <th data-priority="6">عاجل</th>
            <th data-priority="6">لابراتوار</th>
            <th data-priority="6">اکسری</th>
            <th data-priority="6">التراسوند</th>
            <th data-priority="6">دندان</th>
            <th data-priority="6">فزیوتراپی</th>
            <th data-priority="6">ایکو</th>
            <th data-priority="6">داپلر</th>
            <th data-priority="6">PFT</th>
            <th data-priority="6">اندوسکوپی</th>
            <th data-priority="6">امبولانس</th>
            <th data-priority="6">بستر</th>
            <th data-priority="6">سایر</th>
            <th data-priority="6">جمله</th>
            <th data-priority="6">ویرایش</th>
            <th data-priority="6">حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum1=0; $sum2=0; $sum3=0; $sum4=0; $sum5=0; $sum6=0; $sum7=0; $sum8=0; $sum9=0; $sum10=0; $sum11=0; $sum12=0; $sum13=0; $sum14=0; $sum15=0; $sum16=0; $sum17=0;   ?>
          <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
             <td><a href="<?php echo e(URL::to('patient/' . $patient->id . '/edit')); ?>"><?php echo e($patient->id); ?></a></td>
             <td><a href="<?php echo e(URL::to('patient/' . $patient->id . '/edit')); ?>"><?php echo e($patient->created_at); ?></a></td>
             <td><a href="<?php echo e(URL::to('patient/' . $patient->id . '/edit')); ?>"><?php echo e($patient->patientName); ?></a></td>
             <td><?php echo e($patient->OPD); ?></td>
             <td><?php echo e($patient->docName); ?></td>
             <td><?php echo e($patient->fee); ?></td>
             <td><?php echo e($patient->perscription); ?></td>
             <td><?php echo e($patient->retail); ?></td>
             <td><?php echo e($patient->emergency); ?></td>
             <td><?php echo e($patient->lab); ?></td>
             <td><?php echo e($patient->xray); ?></td>
             <td><?php echo e($patient->US); ?></td>
             <td><?php echo e($patient->dental); ?></td>
             <td><?php echo e($patient->physicalTherapy); ?></td>
             <td><?php echo e($patient->echo); ?></td>
             <td><?php echo e($patient->doblar); ?></td>
             <td><?php echo e($patient->pft); ?></td>
             <td><?php echo e($patient->endoscopy); ?></td>
             <td><?php echo e($patient->ambulance); ?></td>
             <td><?php echo e($patient->bed); ?></td>
             <td><?php echo e($patient->other); ?></td>
             <td><b><?php echo e($patient->total); ?></b></td>
             <td>
               <a href="<?php echo e(URL::to('patient/' . $patient->id . '/edit')); ?>"> <input type="button"  value="ویرایش" class="btn btn-info"> </a>
              </td>
              <td>
                <form action="<?php echo e(url('patient', [$patient->id])); ?>" method="POST">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <button type="submit"  onclick='return confirm("خذف شود؟")' class="btn btn-danger">حذف</button>
                </form>
               </td>
           </tr>
           <?php $sum1 += $patient->fee; $sum2 += $patient->perscription; $sum3 += $patient->retail; $sum4 += $patient->emergency; $sum5 += $patient->lab; $sum6 += $patient->xray; $sum7 += $patient->US; $sum8 += $patient->dental; $sum9 += $patient->physicalTherapy;  ?>
           <?php $sum10 += $patient->echo; $sum11 += $patient->doblar;  $sum12 += $patient->pft; $sum13 += $patient->endoscopy; $sum14 += $patient->ambulance; $sum15 += $patient->bed; $sum16 += $patient->other; $sum17 += $patient->total; ?>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <tfoot>
             <tr>
               <th colspan="5" style="text-align: center">جمله عواید</th>
               <th colspan="1"><?php echo $sum1; ?></th>
               <th colspan="1"><?php echo $sum2; ?></th>
               <th colspan="1"><?php echo $sum3; ?></th>
               <th colspan="1"><?php echo $sum4; ?></th>
               <th colspan="1"><?php echo $sum5; ?></th>
               <th colspan="1"><?php echo $sum6; ?></th>
               <th colspan="1"><?php echo $sum7; ?></th>
               <th colspan="1"><?php echo $sum8; ?></th>
               <th colspan="1"><?php echo $sum9; ?></th>
               <th colspan="1"><?php echo $sum10; ?></th>
               <th colspan="1"><?php echo $sum11; ?></th>
               <th colspan="1"><?php echo $sum12; ?></th>
               <th colspan="1"><?php echo $sum13; ?></th>
               <th colspan="1"><?php echo $sum14; ?></th>
               <th colspan="1"><?php echo $sum15; ?></th>
               <th colspan="1"><?php echo $sum16; ?></th>
               <th colspan="3"><?php echo $sum17; ?></th>
             </tr>
           </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>