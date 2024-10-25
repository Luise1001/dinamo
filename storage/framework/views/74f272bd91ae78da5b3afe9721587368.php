<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('left-button'); ?>
    <?php echo $__env->make('app.layouts.menu.components.back-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('navbar-title'); ?>
    PERMISOS
<?php $__env->stopSection(); ?>

<?php $__env->startSection('right-button'); ?>
    <?php echo $__env->make('app.layouts.menu.components.plus', ['route' => route('permissions.create')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<?php $__env->stopSection(); ?>

<div class="m-2 card">
<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('permission-livewire');

$__html = app('livewire')->mount($__name, $__params, 'lw-1163144249-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/app/permissions/index.blade.php ENDPATH**/ ?>