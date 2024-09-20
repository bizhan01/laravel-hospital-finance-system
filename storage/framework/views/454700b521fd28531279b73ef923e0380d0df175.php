<!DOCTYPE html>
<html lang="en" dir="rtl">

<!-- Mirrored from big-bang-studio.com/neptune/neptune-rtl/apps-contacts.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 11:12:31 GMT -->
<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title>SMC</title>
		<!-- Vendor CSS -->
		<link rel="shortcat icon" type="image/x-icon" href="/img/logo-small.png">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/bootstrap4-rtl/css/bootstrap.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/themify-icons/themify-icons.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/font-awesome/css/font-awesome.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/animate.css/animate.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/jscrollpane/jquery.jscrollpane.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/waves/waves.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/switchery/dist/switchery.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/DataTables/css/dataTables.bootstrap4.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/DataTables/Responsive/css/responsive.bootstrap4.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/DataTables/Buttons/css/buttons.dataTables.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/DataTables/Buttons/css/buttons.bootstrap4.min.css')); ?>">
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/bootstrap4-rtl/css/bootstrap.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/themify-icons/themify-icons.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/font-awesome/css/font-awesome.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/animate.css/animate.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/jscrollpane/jquery.jscrollpane.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/waves/waves.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/switchery/dist/switchery.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/dropify/dist/css/dropify.min.css')); ?>">
		<!-- Neptune CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('../css/core.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../css/menuStyle.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/RWD-Table-Patterns/dist/css/rwd-table.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('../vendors/chartist/chartist.min.css')); ?>">

</head>


	<body class="fixed-sidebar fixed-header skin-default">
		<div class="wrapper">

			<!-- Preloader -->
			<div class="preloader"></div>
         <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
         <?php echo $__env->make('layouts.aside', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			<div class="site-content">
          <?php echo $__env->yieldContent('content'); ?>
          <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    	</div>

		</div>





		<!-- Vendor JS -->
		<script type="text/javascript" src="<?php echo e(asset('../vendors/jquery/jquery-1.12.3.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/tether/js/tether.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/bootstrap4-rtl/js/bootstrap.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/detectmobilebrowser/detectmobilebrowser.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/jscrollpane/jquery.mousewheel.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/jscrollpane/mwheelIntent.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/jscrollpane/jquery.jscrollpane.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/jquery-fullscreen-plugin/jquery.fullscreen-min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/waves/waves.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/switchery/dist/switchery.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/DataTables/js/jquery.dataTables.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/DataTables/js/dataTables.bootstrap4.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/DataTables/Responsive/js/dataTables.responsive.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/DataTables/Responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/DataTables/Buttons/js/dataTables.buttons.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/DataTables/Buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/DataTables/JSZip/jszip.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/DataTables/pdfmake/build/pdfmake.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/DataTables/pdfmake/build/vfs_fonts.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/DataTables/Buttons/js/buttons.html5.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/DataTables/Buttons/js/buttons.print.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/DataTables/Buttons/js/buttons.colVis.min.js')); ?>"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="<?php echo e(asset('js/app.js')); ?>"></script>
				<script type="text/javascript" src="<?php echo e(asset('js/custom.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('js/demo.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('js/tables-datatable.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/dropify/dist/js/dropify.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('js/demo.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('js/forms-upload.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/editable-table/mindmup-editabletable.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/editable-table/numeric-input-example.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/switchery/dist/switchery.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('../vendors/RWD-Table-Patterns/dist/js/rwd-table.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('js/tables-responsive.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('js/tables-editable.js')); ?>"></script>
		<script type="text/javascript" src="js/forms-masks.js"></script>
	  <script type="text/javascript" src="../vendors/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  	<script type="text/javascript" src="../vendors/autoNumeric/autoNumeric-min.js"></script>
		<script type="text/javascript" src="../vendors/chartist/chartist.min.js"></script>
		<script type="text/javascript" src="js/index2.js"></script>

	</body>
</html>
