<?php $__env->startSection('content'); ?>

    <div class="container">

        <div class="row">


            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Prideti </h4>
                <form method="POST" action="<?php echo e(route('users.store')); ?>">

                    <?php echo csrf_field(); ?>

                    <div class="col-md-6 mb-3">
                        <label for="grupe">Grupe:</label>
                        <select name="group_id" class="form-control">

                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option value="<?php echo e($group->id); ?>"><?php echo e($group->group_name); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                    </div>

                    <table class="table table-hover">
                        <tr>

                            <th>Studentu sarasas</th>
                        </tr>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($user->type == 1): ?>
                                <tr>
                                    <td>
                                         <input type="checkbox" name="user_id[]" value="<?php echo e($user->id); ?>">&nbsp;&nbsp;&nbsp;<?php echo e($user->name); ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <table class="table table-hover">
                        <tr>

                            <th>Destytoju sarasas</th>
                        </tr>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($user->type == 2): ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="user_id[]" value="<?php echo e($user->id); ?>">&nbsp;&nbsp;&nbsp;<?php echo e($user->name); ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>




                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="save">Išsaugoti</button>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>