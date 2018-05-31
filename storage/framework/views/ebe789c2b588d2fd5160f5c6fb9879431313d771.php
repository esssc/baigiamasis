<?php $__env->startSection('content'); ?>
    <div class="container">

        <div class="col-md-6">
            <div class="panel panel-primary">
                <!-- Default panel contents -->

                <div class="panel-body">

                    <form action="<?php echo e(route('lectures.update', $lectures->id)); ?>" method="post">

                        <?php echo method_field('put'); ?>
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="group_id" value="<?php echo e($group_id); ?>" >
                        <div class="form-group">
                            <label for="pavarde">Telefonas</label>
                            <input name="lecture_name" type="text" class="form-control"   value="<?php echo e($lectures->lecture_name); ?>">
                        </div>
                        <div class="col-md-12 mb-3">
                            <textarea name="about" id="about" cols="200" rows="10"></textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="date">Data :</label>
                            <input type="date" class="form-control" name="date" id="date" placeholder="" value="<?php echo e($lectures->date); ?>" required>
                        </div>
                        <input type="submit" name="save" class="btn btn-primary" value="Išsaugoti">
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>