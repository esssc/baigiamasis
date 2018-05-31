<?php $__env->startSection('content'); ?>

    <div class="container">

        <div class="row">


            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Prideti nauja paskaita</h4>
                <form method="POST" action="<?php echo e(route('lectures.store')); ?>">

                    <?php echo csrf_field(); ?>

                        <input type="hidden" name="group_id" value="<?php echo e($group_id); ?>" >

                    <div class="col-md-4 mb-3">
                        <label for="firstName">Paskaitos pavadinimas :</label>
                        <input type="text" class="form-control" name="lecture_name" id="lecture_name" placeholder="" value="" >
                        <?php $__currentLoopData = $errors->get('lecture_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e($error); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="col-md-12 mb-3">
                        <textarea name="about" id="about" cols="200" rows="10"></textarea>
                        <?php $__currentLoopData = $errors->get('about'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e($error); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="firstName">Data :</label>
                        <input type="date" class="form-control" name="date" id="date" placeholder="" value="" >
                        <?php $__currentLoopData = $errors->get('date'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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