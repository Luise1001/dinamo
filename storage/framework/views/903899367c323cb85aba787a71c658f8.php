<div>
    <!--[if BLOCK]><![endif]--><?php if(isset($permissions) && $permissions->count() > 0): ?>
        <div class="p-2 m-2 card">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="p-2 nav-link d-flex justify-content-between"
                    href="<?php echo e(route('permissions.edit', ['id' => $permission->id])); ?>">
                    <?php echo e($permission->display_name); ?>


                    <label class="container-switch">
                        <input wire:click="active(<?php echo e($permission->id); ?>)" type="checkbox" class="toggle-switch"
                            <?php echo e($permission->active == true ? 'checked' : ''); ?>>
                        <span class="slider"></span>
                    </label>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH /var/www/html/resources/views/livewire/permission-livewire.blade.php ENDPATH**/ ?>