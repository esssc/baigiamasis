<?php $__env->startSection('content'); ?>
    <div class="container">

    <div class="row">


        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Prideti nauja programa</h4>
            <form method="POST" action="<?php echo e(route('groups.store')); ?>">

                <?php echo csrf_field(); ?>
                <div class="col-md-6 mb-3">
                <label for="course">Kursas:</label>
                    <select name="course_id" class="form-control">

                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($course->id); ?>"><?php echo e($course->course_name); ?></option>
                    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="course">Destytojas:</label>
                    <select name="teacher_id" class="form-control">

                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($user->type == 2): ?>

                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>

                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="firstName">Programos pavadinimas :</label>
                    <input type="text" class="form-control" name="group_name" id="group_name" placeholder="" value="">
                    <?php $__currentLoopData = $errors->get('group_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($error); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <div class="col-md-6 mb-3">
                    <label for="firstName">Pradzia :</label>
                    <input type="date" class="form-control" name="begins" id="begins" placeholder="" value="" >
                    <?php $__currentLoopData = $errors->get('begins'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($error); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="firstName">Pabaiga :</label>
                    <input type="date" class="form-control" name="ends" id="ends" placeholder="" value="" >
                    <?php $__currentLoopData = $errors->get('ends'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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