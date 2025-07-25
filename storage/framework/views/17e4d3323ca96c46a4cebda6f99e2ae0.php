<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="w-100 d-grid">
            <div class="text-center">
                <img src="<?php echo e(asset('assets/media/icons/logo.svg')); ?>" alt="Logo">
                <h1 class="text-primary-color fw-bold">DINAMO</h1>
                <h6 class="text-primary-color">Registrarme</h6>
            </div>

            <div class="p-2">
                <form method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>

                    <div>
                        <label for="name" class="fw-semibold text-primary-color required">Nombre</label>
                        <input id="name" class="form-control" type="text" name="name" value="<?php echo e(old('name')); ?>"
                            required placeholder="Nombre">
                    </div>

                    <div class="mt-1">
                        <label for="email" class="fw-semibold text-primary-color required">Correo electrónico
                        </label>
                        <input id="email" class="form-control" type="email" name="email" value="<?php echo e(old('email')); ?>"
                            required placeholder="Correo electrónico">
                    </div>

                    <div class="mt-1">
                        <label for="password" class="fw-semibold text-primary-color required">Contraseña</label>
                        <input id="password" class="form-control" type="password" name="password" required
                            placeholder="Contraseña">
                    </div>

                    <div class="mt-1">
                        <label for="password_confirmation" class="fw-semibold text-primary-color required">Confirmar contraseña</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                            required placeholder="Confrimar contraseña">
                    </div>

                    <div class="mt-3 text-center">
                        <button type="submit" class="shadow-sm btn btn-md bg-secondary-light text-primary-color fw-semibold w-100">
                            Registrarme
                        </button>

                        <a href="/"  class="mt-3 text-white shadow-sm btn btn-md bg-neutral-medium">
                            Volver
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/app/auth/register.blade.php ENDPATH**/ ?>