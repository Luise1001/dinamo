<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="">
                    <div class="text-center">
                        <img src="<?php echo e(asset('assets/media/icons/logo.svg')); ?>" alt="Logo">
                    </div>

                    <div class="card-body">
                        <?php if($errors->any()): ?>
                            <div class="mb-4 alert alert-danger">
                                <ul class="mb-0">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(route('register')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input id="name" class="form-control" type="text" name="name"
                                    value="<?php echo e(old('name')); ?>" required placeholder="Nombre">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico
                                </label>
                                <input id="email" class="form-control" type="email" name="email"
                                    value="<?php echo e(old('email')); ?>" required placeholder="Correo electrónico">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input id="password" class="form-control" type="password" name="password" required
                                   placeholder="Contraseña">
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                                <input id="password_confirmation" class="form-control" type="password"
                                    name="password_confirmation" required placeholder="Confrimar contraseña">
                            </div>

                            <?php if(Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature()): ?>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                    <label class="form-check-label" for="terms">
                                        <?php echo __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' =>
                                                '<a target="_blank" href="' .
                                                route('terms.show') .
                                                '" class="text-decoration-none">' .
                                                __('Terms of Service') .
                                                '</a>',
                                            'privacy_policy' =>
                                                '<a target="_blank" href="' .
                                                route('policy.show') .
                                                '" class="text-decoration-none">' .
                                                __('Privacy Policy') .
                                                '</a>',
                                        ]); ?>

                                    </label>
                                </div>
                            <?php endif; ?>

                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Registrarme 
                                 </button>
                            </div>

                            <div class="text-center">
                                <a class="text-decoration-none" href="<?php echo e(route('login')); ?>">
                                   Iniciar sesión
                                </a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/auth/register.blade.php ENDPATH**/ ?>