<?php $__env->startSection('content'); ?>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">


            <!-- Default panel contents -->
                <br><br>
                <div class="panel-heading"><b>Kursai:</b></div>


                <!-- Table -->
                <table class="table">

                    <tr>

                        <th>
                            <?php if( Auth::user()->type == '2'): ?>
                                <a href="<?php echo e(route('course.create')); ?>" class="btn btn-primary">Prideti nauja</a>
                            <?php endif; ?>
                        </th>


                        <th>Programos</th>


                    </tr>

                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td></td>

                            <td>
                                <?php echo e($course->course_name); ?>

                            </td>

                            <td>
                                <?php if(Auth::user()->type == '2'): ?>

                                    <a href="<?php echo e(route('courseDelete', $course->id)); ?>" class="btn btn-danger">Istrinti</a>

                                <?php endif; ?>
                            </td>



                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                </table>
                <a href="<?php echo e(route('groups.index')); ?>"class="btn btn-warning">Rodyti grupes</a>


            </div>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>