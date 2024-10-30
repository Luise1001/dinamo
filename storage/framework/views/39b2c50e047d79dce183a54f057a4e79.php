<div>
    <!--[if BLOCK]><![endif]--><?php if(isset($roles) && $roles->count() > 0): ?>
        <div class="p-2 m-2 card">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="p-2 nav-link d-flex justify-content-between"
                    href="<?php echo e(route('roles.edit', ['id' => $role->id])); ?>">
                    <?php echo e($role->display_name); ?>


                    <label class="container-switch">
                        <input wire:click="active(<?php echo e($role->id); ?>)" type="checkbox" class="toggle-switch"
                            <?php echo e($role->active == true ? 'checked' : ''); ?> value="1">
                        <span class="slider"></span>
                    </label>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH /var/www/html/resources/views/livewire/role-livewire.blade.php ENDPATH**/ ?>