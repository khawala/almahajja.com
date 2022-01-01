

<?php $__env->startSection('page-header'); ?>
   ملخص <?php echo e($department->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e($department->id); ?>_<?php echo e($department->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

        <div class="wrapper">
<h1><?php echo e($department->id); ?>_<?php echo e($department->name); ?></h1>
            <!--<a href="<?php echo e(request()->fullUrl()); ?>&print=1" target="_blank" class="btn btn-success no-print pull-left"><i class="fa fa-print"></i></a>-->
            <hr>
        
            <div class="row">
              <div class="col-xs-12">

                    <table class="table " id="customers" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                 <th> الاسم</th>
                                <th>العدد</th>
                                <th>المحتوى</th>
                            </tr>
                        </thead>
                     
                      
                     
                        <tbody>
                      
                                <tr>
                                      <td>المسارات</td>
                                    <td><?php echo e(count($department->sections)); ?></td>
                                    <td><?php echo $sectionName; ?></td>
                                </tr>
                                 <tr>
                                      <td>الحلقات</td>
                                    <td><?php echo e(count($department->classrooms)); ?></td>
                                    <td><?php echo $classroomName; ?></td>
                                </tr>
                                 <tr>
                                      <td>المستويات</td>
                                    <td><?php echo e($levelCount); ?></td>
                                    <td><?php echo $levelName; ?></td>
                                </tr>
                                 <tr>
                                      <td>المعلمات</td>
                                    <td><?php echo e($teacherCount); ?></td>
                                    <td><?php echo $teacherName; ?></td>
                                </tr>
                                 <tr>
                                      <td>الطلاب</td>
                                    <td colspan="2"><?php echo e(count($department->registrations)); ?></td>
                                  
                                </tr>
                                          <tr>
                              
                                      <td colspan="3">الشريحة</td>
                                </tr>
                                <?php $__currentLoopData = $telecom_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                      <td><?php echo e($key); ?></td>
                                      <td colspan="2"><?php echo e($item2); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <tr>
                              
                                      <td colspan="3">الفترة</td>
                                </tr>
                                  <?php $__currentLoopData = $period_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                      <td><?php echo e($key); ?></td>
                                      <td colspan="2"><?php echo e($item2); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
        
            </div>
        </div>

        <div class="pagebreak"></div>
        
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
                
            body{margin: 0;}
            .wrapper{
                margin: auto;
                position: relative;
              
               width: 1140px;
                height: 1612px;
            }
            .bg-print{
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
            }
            .content-wrapper{
                margin-left: 0!important;
            }
            section.content{
                margin-right: 90px;
            }
            .pagebreak { page-break-before: always; }
            #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align:center;
}

#customers tr:nth-child(even){background-color: #f2f2f2; text-align:center;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  
  background-color: #04AA6D;
  color: white;
}
    </style>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.print', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>