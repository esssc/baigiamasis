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

                        <th>
                            <?php if( Auth::user()->type == '2'): ?>
                                <a href="<?php echo e(route('showLectures', $group_id)); ?>" class="btn btn-primary">Prideti nauja pamoka</a>

                            <?php endif; ?>
                        </th>
                        <th>Pamokos pavadinimas</th>
                        <th>Apie</th>
                        <th>Data</th>
                        <th>Failai <a href=""><i class="fas fa-trash-alt"></i></a></th>




                    </tr>

                    <?php $__currentLoopData = $lectures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lecture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td></td>

                            <td>
                                <?php echo e($lecture->lecture_name); ?>

                            </td>
                            <td>
                                <?php echo $lecture->about; ?>

                            </td>
                            <td>
                                <?php echo e($lecture->date); ?>

                            </td>

                           <td>

                               <ul>
                                   <?php $__currentLoopData = $lecture->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php if( Auth::user()->type == '2' || $file->status == 0): ?>
                                   <li>
                                       <a  href="<?php echo e(asset('storage/App/public/'.$file->file)); ?>" download ><?php echo e($file->file_name); ?></a> &nbsp

                                           <?php if( Auth::user()->type == '2'): ?>
                                                   <?php if( $file->status == 0): ?>
                                                       <a href="<?php echo e(route('hideFile', $file->id)); ?>" class=" btn-outline-danger" name="status" >Slepti faila</a>

                                                       <?php else: ?>
                                                           <a href="<?php echo e(route('showFile', $file->id)); ?>" class=" btn-outline-success" name="status" >Rodyti faila</a>

                                                    <?php endif; ?>
                                           <?php endif; ?>
                                       &nbsp <a href="<?php echo e(route('deleteFile', $file->id)); ?>" style="font-size: 18px" class=" btn-outline-danger"><i class="fa fa-trash"></i></a>
                                   </li>
                                       <?php endif; ?>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </ul>

                           </td>

                            <td>
                                <?php if(Auth::user()->type == '2'): ?>
                                    <a href="<?php echo e(route('lectureDelete', $lecture->id)); ?>" class="btn btn-danger">Istrinti</a>
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
    <br>
    <br>
    <?php if(Auth::user()->type == '2'): ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <form id="file-upload-form" action="<?php echo e(route('files.store')); ?>" method="POST" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>

                    <div class="file-input-wrap">
                        <h2>Ikelti Failus</h2>

                        <div class="col-md-6 mb-3">
                            <label for="course">Pamoka:</label>
                            <select name="lecture_id" class="form-control">

                                <?php $__currentLoopData = $lectures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lecture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lecture->id); ?>"><?php echo e($lecture->lecture_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>
                        <input type="file" name="failai[]" id="file" multiple>
                        <input type="submit" value="Įkelti" name="upload">
                    </div>

                </form>

            </div>

        </div>
    </div>
        <?php endif; ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>