<?php $__env->startSection('content'); ?>

    <?php if(Auth::check()): ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">




                <!-- Default panel contents -->
                    <br><br>
                    <div class="panel-heading"><b>Grupes:</b></div>


                    <!-- Table -->
                    <table class="table">

                        <tr>
                            <th></th>

                            <th>Mokiniai</th>

                            <th>Elektronis pastas</th>
                            <th>Telefonas</th>

                        </tr>


                        <?php $__currentLoopData = $groups->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td></td>

                                <td>
                                    <?php echo e($user->name); ?>

                                    <?php echo e($user->surname); ?>

                                </td>

                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->phone); ?></td>

                                <td>
                                    <?php if(Auth::user()->type == '2'): ?>


                                        <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-outline-success">Redaguoti</a>

                                        <a href="<?php echo e(route('userDelete', $user->id)); ?>" class="btn btn-danger">Istrinti</a>

                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </table>
                    <a href="<?php echo e(route('course.index')); ?>"class="btn btn-warning">Rodyti kursus</a>
                    <a href="<?php echo e(route('groups.index')); ?>"class="btn btn-warning">Rodyti grupes</a>




                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>