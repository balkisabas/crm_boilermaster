

<?php $__env->startSection('title', 'BoilerMaster'); ?> 

<?php $__env->startSection('css'); ?>
<!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('/build/libs/owl.carousel/assets/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/build/libs/owl.carousel/assets/owl.theme.default.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Sign in to continue to BoilerMaster.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="<?php echo e(URL::asset ('/build/images/profile-img.png')); ?>" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0"> 
                        <div class="auth-logo">
                            <a href="" class="auth-logo-light">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title bg-light">
                                        <img src="<?php echo e(URL::asset ('/build/images/logo.PNG')); ?>" alt="" width="110" height="85">
                                    </span>
                                </div>
                            </a>

                            <a href="" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title  bg-light">
                                        <img src="<?php echo e(URL::asset ('/build/images/logo.PNG')); ?>" alt="" width="80" height="70">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                        <form class="form-horizontal" method="POST" action="<?php echo e(route('zohologin')); ?>">
                            <?php echo csrf_field(); ?>
                                <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" id="username" placeholder="Enter your Zoho Mail" autocomplete="email" required>
                            </div>
                            <div class="mb-3">
                                <div class="float-end" hidden>
                                    <?php if(Route::has('password.request')): ?>
                                    <a href="<?php echo e(route('password.request')); ?>" class="text-muted">Forgot password?</a>
                                    <?php endif; ?>
                                </div>
                                <label class="form-label">Password</label>
                                <div class="input-group auth-pass-inputgroup <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter your zoho mail password" aria-label="Password" aria-describedby="password-addon" required>
                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                </div>
                            </div>
                            <div class="form-check" hidden>
                                <input class="form-check-input" type="checkbox" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                            <br>
                            <div class="mt-3 d-grid">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                <div class="mt-5 text-center">
                                    <p>Or <a href="<?php echo e(route('login')); ?>">login with BoilerMaster</a></p>
                                    <p>© <script>document.write(new Date().getFullYear())</script> BoilerMaster</p>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- owl.carousel js -->
<script src="<?php echo e(URL::asset('/build/libs/owl.carousel/owl.carousel.min.js')); ?>"></script>
<!-- auth-2-carousel init -->
<script src="<?php echo e(URL::asset('/build/js/pages/auth-2-carousel.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\boilermaster\resources\views/loginZoho.blade.php ENDPATH**/ ?>