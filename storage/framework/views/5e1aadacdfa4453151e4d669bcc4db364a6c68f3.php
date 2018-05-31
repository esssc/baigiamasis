<?php $__env->startSection('content'); ?>
    <div class="container">
        <form method="POST" action="<?php echo e(route('messages.store')); ?>">
            <?php echo csrf_field(); ?>
        <div class="row">
                    <input type="hidden" name="group_id" value="<?php echo e($group_id); ?>">

                    <div class="col-md-12 mb-3">
                        <textarea name="message" id="message" cols="100" rows="5"></textarea>
                        <?php $__currentLoopData = $errors->get('about'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e($error); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>


                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="save">Išsaugoti</button>

            </div>

        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>