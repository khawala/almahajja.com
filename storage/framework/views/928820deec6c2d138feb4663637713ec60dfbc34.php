<?php $__env->startSection('page-header'); ?>
    الدرجات الشهرية <small>إدارة</small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="filter-area">
        <form action="" class="form-inline">

            <ul class="list-inline">
                <li style="float: left">
                  <button class="btn btn-success btn-xs"><i class="fa fa-search"></i></button>
                 
                </li>
            </ul>
                  <?php if(auth()->user()->isSupervisor): ?> 

                       <?php echo Form::mySelect('department_id', '', ['' => 'القسم'] + App\Department::where('supervisor_id',auth()->user()->id)->pluck('name', 'id')->toArray(), request('department_id'), ['class' => 'form-control select']); ?>

              <?php echo Form::mySelect('classroom_id', '', ['' => 'الحلقة'] + App\Classroom::whereHas('department', function ($q) {
                $q->where('supervisor_id', auth()->id());
            })->pluck('name', 'id')->toArray(), request('classroom_id'), ['class' => 'form-control select']); ?>

            <?php echo Form::mySelect('section_id', '', ['' => 'المسار'] + App\Section::whereHas('departments', function ($q) {
                $q->where('supervisor_id', auth()->id());
            })->pluck('name', 'id')->toArray(), request('section_id'), ['class' => 'form-control select']); ?>

             
             <?php else: ?>
            <?php echo Form::mySelect('department_id', '', ['' => 'القسم'] + App\Department::pluck('name', 'id')->toArray(), request('department_id'), ['class' => 'form-control select']); ?>

            <?php echo Form::mySelect('classroom_id', '', ['' => 'الحلقة'] + App\Classroom::pluck('name', 'id')->toArray(), request('classroom_id'), ['class' => 'form-control select']); ?>


            <?php echo Form::mySelect('section_id', '', ['' => 'المسار'] + App\Section::pluck('name', 'id')->toArray(), request('section_id'), ['class' => 'form-control select']); ?>

            <?php endif; ?>
           



        </form>
    </section>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-body table-responsive no-padding">
                    <table class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>إسم القسم</th>
                                <th>إسم الحلقة</th>
                                <th>المسار</th>
                                <th>المعلمة</th>
                                <th>الخيارات</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>إسم القسم</th>
                                <th>إسم الحلقة</th>
                                <th>المسار</th>
                                <th>المعلمة</th>
                                <th>الخيارات</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($classroom->department_name); ?></td>
                                    <td><?php echo e($classroom->classroom_name); ?></td>
                                    <td><?php echo e($classroom->section_name); ?></td>
                                    <td><?php echo e($classroom->user_name); ?></td>
                                    <td>
                                        <form action="<?php echo e(route(ADMIN . '.marks.create')); ?>" target="_blank">
                                            <input type="hidden" name="classroom" value="<?php echo e($classroom->classroom_id); ?>">
                                            <?php echo Form::mySelect('month', '', config('variables.months'),null, ['class' => 'form-control select']); ?>

                                            <?php echo Form::mySelect('semester', '', config('variables.semesters'), null,['class' => 'form-control select']); ?>

                              
                                            <?php if($classroom->separate_section!=1): ?>
                                            <?php echo Form::mySelect('level', '', App\Level::pluck('name', 'id')->toArray(), null, ['required', 'class' => 'form-control select']); ?>

                                            <?php endif; ?>
                                            <button class="btn btn-danger">رصد الدرجات</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    <?php echo $classrooms->appends(request()->input())->links(); ?>

                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>