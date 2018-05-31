<?php $__env->startSection('content'); ?>

    <?php if(Auth::check()): ?>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">

                <?php if( Auth::user()->type == '2'): ?>
                    <a href="<?php echo e(route('users.create')); ?>" class="btn btn-outline-primary">Prideti studentus i grupes</a>
            <?php endif; ?>

            <!-- Default panel contents -->
                <br><br>
                <div class="panel-heading"><b>Grupes:</b></div>
                <!-- Table -->
                <table class="table">
                    <tr>
                        <th>
                            <?php if( Auth::user()->type == '2'): ?>
                            <a href="<?php echo e(route('groups.create')); ?>" class="btn btn-primary">Prideti nauja</a>
                            <?php endif; ?>
                        </th>
                        <th>Kurso pavadinimas</th>
                        <th>Grupes pavadinimas</th>
                        <th>Pradzia</th>
                        <th>Pabaiga</th>
                    </tr>
                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td></td>
                            <td>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($group->course_id == $course->id): ?>
                                        <?php echo e($course->course_name); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>

                            <td>
                                <a href="<?php echo e(route('users.show', $group->id)); ?>"><?php echo e($group->group_name); ?></a>
                            </td>
                            <td>
                                <?php echo e($group->begins); ?>

                            </td>
                            <td>
                                <?php echo e($group->ends); ?>

                            </td>
                            <td>
                                    <?php if(Auth::user()->type == '2'): ?>
                                    <a href="<?php echo e(route('sendMessages', $group->id)); ?>"  class="btn btn-outline-info"><i class="fa fa-envelope"></i></a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('messages.index')); ?>"  class="btn btn-outline-info"><i class="fa fa-envelope"></i></a>
                                <?php endif; ?>
                                    <?php if(Auth::user()->type == '2'): ?>
                                    <a href="<?php echo e(route('groups.edit',$group->id)); ?>" class="btn btn-outline-success">Redaguoti</a>

                                    <a href="<?php echo e(route('groupDelete', $group->id)); ?>" class="btn btn-danger">Istrinti</a>
                                <?php endif; ?>
                                    <a href="<?php echo e(route('lectures.show', $group->id)); ?>" class="btn btn-warning">Rodyti pamokas</a>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </table>
                    <?php if(Auth::user()->type == '2'): ?>
                <a href="<?php echo e(route('course.index')); ?>"class="btn btn-warning">Rodyti kursus</a>
                    <?php endif; ?>

            </div>
        </div>
    </div>
    </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>