<?php $__env->startSection('content'); ?>


    <div class="container">

    <div class="row">


        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Prideti nauja programa</h4>
            <form method="POST" action="<?php echo e(route('course.store')); ?>">

                <?php echo csrf_field(); ?>


                    <div class="col-md-6 mb-3">
                        <label for="firstName">Programos pavadinimas :</label>
                        <input type="text" class="form-control" name="course_name" id="course_name" placeholder="" value="">
                        <?php $__currentLoopData = $errors->get('course_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e($error); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>



                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="save">Išsaugoti</button>
            </form>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>