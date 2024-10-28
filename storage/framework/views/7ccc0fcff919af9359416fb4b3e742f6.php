<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="d-grid w-100">
            <div class="text-center">
                <img src="<?php echo e(asset('assets/media/icons/logo.svg')); ?>" alt="Logo">
                <h1 class="text-primary-color fw-bold">DINAMO</h1>
                <h6 class="text-primary-color">Iniciar sesión</h6>
            </div>
            
            <div class="p-2">
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>

                    <div>
                        <label for="email" class="fw-semibold text-primary-color required">Correo
                            electrónico</label>
                        <input id="email" class="form-control" type="email" name="email" value="<?php echo e(old('email')); ?>"
                            required placeholder="Correo electrónico">
                    </div>

                    <div class="mt-1">
                        <label for="password" class="fw-semibold text-primary-color required">Contraseña</label>
                        <input id="password" class="form-control" type="password" name="password" required
                            placeholder="Contraseña">
                    </div>

                    <div class="mt-3 text-center">
                        <button type="submit" class="shadow-sm text-primary-color btn btn-mid w-100 bg-secondary-light fw-semibold fs-6">
                            Iniciar sesión
                        </button>

                        <button onclick="window.history.back()" class="mt-3 text-white shadow-sm btn btn-md bg-neutral-medium">
                            Volver
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/app/auth/login.blade.php ENDPATH**/ ?>