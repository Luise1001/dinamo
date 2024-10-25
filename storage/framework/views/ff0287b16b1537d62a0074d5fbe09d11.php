<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="">
                    <div class="mt-10 text-center card-header">
                        <img src="<?php echo e(asset('assets/media/icons/logo.svg')); ?>" alt="Logo">
                        <h1 class="mt-2 text-success">DINAMO</h1>
                        <h6>Iniciar sesión</h6>
                        <button class="btn btn-light bg-light">
                            Continuar con <img with="10" height="20"
                                src="<?php echo e(asset('assets/media/icons/google.svg')); ?> " alt="google">
                        </button>
                    </div>
                    <div class="">


                        <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input id="email" class="form-control" type="email" name="email"
                                    value="<?php echo e(old('email')); ?>" required placeholder="Correo electrónico">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input id="password" class="form-control" type="password" name="password" required
                                    placeholder="Contraseña">
                            </div>

                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Iniciar sesión
                                </button>
                            </div>

                            

                            <div class="d-flex justify-content-between">
                                <?php if(Route::has('password.request')): ?>
                                    <a class="text-sm text-decoration-none" href="<?php echo e(route('register')); ?>">
                                        Registrarme
                                    </a>
                                <?php endif; ?>
                                <?php if(Route::has('register')): ?>
                                    <a class="text-sm text-decoration-none" href="<?php echo e(route('password.request')); ?>">
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                <?php endif; ?>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/auth/login.blade.php ENDPATH**/ ?>