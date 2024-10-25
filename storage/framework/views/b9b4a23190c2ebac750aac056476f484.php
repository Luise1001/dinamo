<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('left-button'); ?>
    <?php echo $__env->make('app.layouts.menu.components.back-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navbar-title'); ?>
    EDITAR ROLE
<?php $__env->stopSection(); ?>

<div class="p-3 m-2 card">
    <?php if(isset($role)): ?>
        <form action="<?php echo e(route('roles.update')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div>
                <input type="hidden" name="id" value="<?php echo e($role->id); ?>">
                <label for="name" class="text-dark-gray fw-semibold fs-6 required">Nombre</label>
                <input type="text" class="form-control" name="name" value="<?php echo e($role->name); ?>">
            </div>

            <div class="mt-1">
                <label for="display_name" class="text-dark-gray fw-semibold fs-6 required">Nombre para mostrar</label>
                <input type="text" class="form-control" name="display_name" value="<?php echo e($role->display_name); ?>">
            </div>

            <div class="mt-1">
                <label for="description" class="text-dark-gray fw-semibold fs-6">Descripción</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="<?php echo e($role->description); ?>">
            </div>

            <div class="mt-2">
                <?php if(isset($permissions) && $permissions->count() > 1): ?>
                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="p-2 nav-link d-flex justify-content-between">
                            <?php echo e($permission->display_name); ?>


                            <label class="container-switch">
                                <input type="checkbox" class="toggle-switch" <?php echo e($role->permissions->contains($permission->id) ? 'checked' : ''); ?>>
                                <span class="slider"></span>
                            </label>
                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

            <div class="mt-3 text-center">
                <button type="submit" class="btn btn-md bg-light-blue text-dark-green fw-semibold fs-6">Guardar
                </button>
            </div>
        </form>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/app/roles/edit.blade.php ENDPATH**/ ?>