<?php $__env->startSection('content'); ?>
    <div class="container">

    <div class="col-md-6">
        <div class="panel panel-primary">
            <!-- Default panel contents -->

            <div class="panel-body">

                <form action="<?php echo e(route('groups.update', $group->id)); ?>" method="post">

                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label for="vardas">Grupes pavadinimas</label>
                        <input name="group_name" type="text" class="form-control"   value="<?php echo e($group->group_name); ?>">
                        <?php $__currentLoopData = $errors->get('group_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e($error); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="form-group">
                        <label for="pavarde">Pradzia</label>
                        <input name="begins" type="date" class="form-control"   value="<?php echo e($group->begins); ?>">
                        <?php $__currentLoopData = $errors->get('begins'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e($error); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="form-group">
                        <label for="pavarde">Pabaiga</label>
                        <input name="ends" type="date" class="form-control"  value="<?php echo e($group->ends); ?>">
                        <?php $__currentLoopData = $errors->get('ends'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e($error); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>



                    <input type="submit" name="save" class="btn btn-primary" value="Išsaugoti">
                </form>
            </div>
        </div>
    </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>