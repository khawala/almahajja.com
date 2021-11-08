<?php $__env->startSection('page-header'); ?>
    ادخال الدرجات الشهرية <small>إدارة</small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="box box-info">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-5">
                    <p><strong>القسم</strong>: <?php echo e($classroom->department->name); ?></p>
                    <p><strong>المسار</strong>: <?php echo e($classroom->section->name); ?></p>
                    <p><strong>الحلقة</strong>: <?php echo e($classroom->name); ?></p>
                    <p><strong>المعلمة</strong>: <?php echo e($classroom->teacher->name); ?></p>
                </div>

                <div class="col-sm-5">
                    <p><strong>الشهر</strong>: <?php echo e(config('variables.months')[request('month')]); ?></p>
                    <p><strong>الفصل الدراسي</strong>: <?php echo e(config('variables.semesters')[request('semester')]); ?></p>
                </div>
                <div class="col-sm-2">
                    <a class="btn btn-success" href="<?php echo e(route(ADMIN . '.marks.create', request()->all() + ['export' => true])); ?>"><i class="fa fa-print"></i></a>
                    
                    <?php if($students->isNotEmpty() && $classroom->code == 1): ?>
                        <div class="mt30">
                            <button type="submit" form="form" class="btn btn-info one-time" >حفظ الدرجات</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>    
    </section>

        
    
    <div class="box box-info">
        <div class="box-body">
            <?php echo Form::open([
                    'action' => ['MarkController@store'],
                    'files'  => true,
                    'id'     => "form"
                ]); ?>

                <div class="table-responsive no-padding">
                    <table class="table " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>رقم التسجيل</th>
                                <th>الطالبة</th>
                                <th>مستوى الطالبة</th>
                                <th>المراجعة (30)</th>
                                <th>التسميع (30)</th>
                                <th>الإختبار الشهري (40)</th>
                                <th>المجموع</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="row-student">
                                    <td>
                                        <?php echo e($student->id); ?>

                                        <input type="hidden" name="marks[<?php echo e($student->id); ?>][section_id]" value="<?php echo e($classroom->section->id); ?>">
                                        <input type="hidden" name="marks[<?php echo e($student->id); ?>][month]" value="<?php echo e(request('month')); ?>">
                                        <input type="hidden" name="marks[<?php echo e($student->id); ?>][semester]" value="<?php echo e(request('semester')); ?>">
                                        <input type="hidden" name="marks[<?php echo e($student->id); ?>][department_id]" value="<?php echo e($classroom->department->id); ?>">
                                        <input type="hidden" name="marks[<?php echo e($student->id); ?>][level]" value="<?php echo e($student->level->id); ?>">
                                    </td>
                                    <td><?php echo e($student->name); ?></td>
                                    <td><?php echo e($student->level->name); ?></td>
                                    <td><input type="number" name="marks[<?php echo e($student->id); ?>][mark1]" class="form-control mark" step="0.01" min="0" max="30" value="<?php echo e($student->mark1); ?>"></td>
                                    <td><input type="number" name="marks[<?php echo e($student->id); ?>][mark2]" class="form-control mark" step="0.01" min="0" max="30" value="<?php echo e($student->mark2); ?>"></td>
                                    <td><input type="number" name="marks[<?php echo e($student->id); ?>][mark3]" class="form-control mark" step="0.01" min="0" max="40" value="<?php echo e($student->mark3); ?>"></td>
                                    <td><input type="number" class="form-control total" step="0.01" min="0" max="100" disabled value="<?php echo e($student->mark1 + $student->mark2 + $student->mark3); ?>"></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                
                <?php if($students->isNotEmpty() && $classroom->code == 1): ?>
                    <hr>
                    <button type="submit" class="btn btn-info one-time" >حفظ الدرجات</button>
                <?php endif; ?>
            <?php echo Form::close(); ?>

        </div>
        <!-- /.box-body -->
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
  <script>
    (function($){

      $(".row-student input").on('input', function(){
        updateTotal($(this).closest('.row-student'))
      });

      function updateTotal(_parent) {
        console.log("Update");
        var total = 0,
            _total = _parent.find('.total');

            _parent.find('input.mark').each(function(){
              if ($(this).val()) {
                total += parseFloat($(this).val())
              }
            });

            _total.val(total)
      }

    })(jQuery);
  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>