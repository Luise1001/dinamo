<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('left-button'); ?>
    <?php echo $__env->make('app.layouts.menu.components.back-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navbar-title'); ?>
    EDITAR ROL
<?php $__env->stopSection(); ?>

<?php if(isset($role)): ?>
    <div class="p-3 m-2 card">
        <form id="edit_role" action="<?php echo e(route('roles.update')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div>
                <input type="hidden" name="id" value="<?php echo e($role->id); ?>">
                <label for="name" class="text-primary-color fw-semibold fs-6 required">Nombre</label>
                <input type="text" class="form-control" name="name" value="<?php echo e($role->name); ?>">
            </div>

            <div class="mt-1">
                <label for="display_name" class="text-primary-color fw-semibold fs-6 required">Nombre para
                    mostrar</label>
                <input type="text" class="form-control" name="display_name" value="<?php echo e($role->display_name); ?>">
            </div>

            <div class="mt-1">
                <label for="description" class="text-primary-color fw-semibold fs-6">Descripción</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="<?php echo e($role->description); ?>">
            </div>

            <div class="mt-2">
                <?php if(isset($permissions) && $permissions->count() > 1): ?>
                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="p-2 nav-link d-flex justify-content-between">
                            <?php echo e($permission->display_name); ?>


                            <label class="container-switch">
                                <input onClick="permission(this, <?php echo e($permission->id); ?>)" type="checkbox"
                                    class="toggle-switch"
                                    <?php echo e($role->permissions->contains($permission->id) ? 'checked' : ''); ?>>
                                <span class="slider"></span>
                            </label>
                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

            <div class="mt-3 text-center">
                <button type="submit" class="btn btn-md bg-secondary-light text-primary-color fw-semibold fs-6">Guardar
                </button>
            </div>
        </form>
    </div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    let list_permissions = <?php echo json_encode($role->permissions->pluck('id'), 15, 512) ?>; 
</script>
<script src="<?php echo e(asset('assets/js/app/roles/edit.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/app/roles/edit.blade.php ENDPATH**/ ?>