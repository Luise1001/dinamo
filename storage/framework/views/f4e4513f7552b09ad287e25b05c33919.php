<nav class="navbar navbar-expand-lg bg-dark-green">
    <div class="justify-content-between d-flex">
        <div class="p-2">
          <?php echo $__env->yieldContent('left-button'); ?>
        </div>

        <div class="p-2 text-light-gray fw-bold">
            <?php echo $__env->yieldContent('navbar-title'); ?>
        </div>

        <div class="p-2 mx-2 position-absolute end-0">
            <?php echo $__env->yieldContent('right-button'); ?>
        </div>
    </div>
</nav>
<?php /**PATH /var/www/html/resources/views/app/layouts/menu/navbar/navbar-menu.blade.php ENDPATH**/ ?>