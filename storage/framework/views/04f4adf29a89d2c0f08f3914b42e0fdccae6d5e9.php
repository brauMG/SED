
            <?php if($errors->any()): ?>
        <section class="notification isDanger">
        <ul class="errors">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        </section>
        <?php endif; ?>
<?php /**PATH /var/www/ICA/resources/views/errors.blade.php ENDPATH**/ ?>