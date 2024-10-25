<div class="m-2 card">
    <?php if(isset($permissions) && $permissions->count() > 1): ?>
        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="p-2 nav-link d-flex justify-content-between" href="<?php echo e(route($permission->route)); ?> ">
                    <?php echo e($permission->display_name); ?>

                    
                    <span class="px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                            <path fill="#999999" d="M8.025 22L6.25 20.225L14.475 12L6.25 3.775L8.025 2l10 10z" />
                        </svg>
                    </span>
                </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <form action="<?php echo e(route('logout')); ?> " method="post">
            <?php echo csrf_field(); ?>
            <div class="p-2 d-flex justify-content-between">
                <button class="nav-link">
                    Cerrar sesión
                </button>

                <span class="px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                        <path fill="#999999" d="M8.025 22L6.25 20.225L14.475 12L6.25 3.775L8.025 2l10 10z" />
                    </svg>
                </span>
            </div>
        </form>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/html/resources/views/app/layouts/menu/users/developer.blade.php ENDPATH**/ ?>