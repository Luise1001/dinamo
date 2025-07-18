<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('left-button'); ?>
    <?php echo $__env->make('app.layouts.menu.components.back-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navbar-title'); ?>
    CREAR ROLE
<?php $__env->stopSection(); ?>

<div class="p-3 m-2 card">
        <form action="<?php echo e(route('roles.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div>
                <label for="name" class="text-dark-gray fw-semibold fs-6 required">Nombre</label>
                <input type="text" class="form-control" name="name" placeholder="Nombre">
            </div>

            <div class="mt-1">
                <label for="display_name" class="text-dark-gray fw-semibold fs-6 required">Nombre para mostrar</label>
                <input type="text" class="form-control" name="display_name" placeholder="Nombre para mostrar">
            </div>

            <div class="mt-1">
                <label for="description" class="text-dark-gray fw-semibold fs-6">Descripción</label>
                <input type="text" class="form-control" id="description" name="description"
                    placeholder="Descripción">
            </div>

            <div class="mt-3 text-center">
                <button type="submit"
                    class="btn btn-md bg-light-blue text-dark-green fw-semibold fs-6">Guardar</button>
            </div>
        </form>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/app/roles/create.blade.php ENDPATH**/ ?>