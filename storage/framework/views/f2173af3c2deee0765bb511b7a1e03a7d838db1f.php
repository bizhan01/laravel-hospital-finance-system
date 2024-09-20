<!DOCTYPE html>
<html lang="en" dir="rtl">

<!-- Mirrored from big-bang-studio.com/neptune/neptune-rtl/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 11:12:31 GMT -->
<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title>Login</title>

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="../vendors/bootstrap4-rtl/css/bootstrap.min.css">
		<link rel="stylesheet" href="../vendors/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="css/core.css">

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="img-cover" style="background-image: url(img/photos-1/5.jpg);">

		<div class="container-fluid">
			<div class="sign-form">
				<div class="row">
					<div class="col-md-4 offset-md-4 px-3">
						<div class="box b-a-0">
							<div class="p-2 text-xs-center">
								<img src="img/photos-1/logo.png" alt="" height="80px"/><br></br>
								<h5>خوش آمدید</h5>
								<p>سیستم مدیریت جامع شفاخانه ها</p>
							</div>
							<form class="form-material mb-1" method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
								<div class="form-group">
									<input type="email" id="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" id="exampleInputEmail" placeholder="ایمیل آدرس" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                  <?php if($errors->has('email')): ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($errors->first('email')); ?></strong>
                      </span>
                  <?php endif; ?>
                </div>
								<div class="form-group">
									<input type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required id="exampleInputPassword" placeholder="گذرواژه">
                  <?php if($errors->has('password')): ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($errors->first('password')); ?></strong>
                      </span>
                  <?php endif; ?>
								</div>


								<div class="px-2 form-group mb-0">
									<button type="submit" class="btn btn-purple btn-block text-uppercase">وارد شدن</button>
								</div>
                <?php if(Route::has('password.request')): ?>
                    <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                        <?php echo e(__('گذرواژه را فراموش کردید؟')); ?>

                    </a>
                <?php endif; ?>
							</form>
              <br></br>
							<!-- <li>
							<span class="txt1">
								Don’t have an account?
							</span>
                <?php if(Route::has('register')): ?>
                    <a class="txt2" href="<?php echo e(route('register')); ?>">
                      <?php echo e(__('Sign Up')); ?>

                    </a>
                <?php endif; ?>
						</li> -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Vendor JS -->
		<script type="text/javascript" src="../vendors/jquery/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="../vendors/tether/js/tether.min.js"></script>
		<script type="text/javascript" src="../vendors/bootstrap4-rtl/js/bootstrap.min.js"></script>
	</body>

<!-- Mirrored from big-bang-studio.com/neptune/neptune-rtl/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 11:12:31 GMT -->
</html>
