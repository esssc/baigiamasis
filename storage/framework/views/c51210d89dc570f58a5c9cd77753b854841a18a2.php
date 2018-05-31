<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="col-md-6">
            <div class="panel panel-primary">
                <!-- Default panel contents -->

                <div class="panel-body">

                    <form action="<?php echo e(route('users.update', $user->id)); ?>" method="post">

                        <?php echo method_field('put'); ?>
                        <?php echo csrf_field(); ?>


                        <div class="form-group">
                            <label for="pavarde">Telefonas</label>
                            <input name="phone" type="text" class="form-control"   value="<?php echo e($user->phone); ?>">
                        </div>
                        <div class="form-group">
                            <label for="pavarde">Pabaiga</label>
                            <input name="email" type="text" class="form-control"  value="<?php echo e($user->email); ?>">
                        </div>



                        <input type="submit" name="save" class="btn btn-primary" value="Išsaugoti">
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>