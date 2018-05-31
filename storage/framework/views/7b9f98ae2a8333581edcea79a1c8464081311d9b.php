<ul>


    <li>
        <a>labas</a>
        <?php $__currentLoopData = $users->groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php echo e($user->groups->group_name); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </li>
</ul>