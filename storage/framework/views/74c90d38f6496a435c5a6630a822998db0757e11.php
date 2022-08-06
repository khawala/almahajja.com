<?php $__env->startSection('page-header'); ?>
    تقرير الفواتير 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  
   <?php echo Form::open([
            'action' => ['RegistrationController@invoiceReportPost'],
            'files' => true
        ]); ?>

          <?php echo e(Form::label('start_date','تاريخ البدء',['class' => 'control-label'])); ?>

               <?php echo Form::date('start_date',date('Y-m-d'),['required', 'class' => 'form-control']); ?> 
                
              <?php echo e(Form::label('end_date','تاريخ الإنتهاء',['class' => 'control-label'])); ?>

               <?php echo Form::date('end_date',date('Y-m-d'),['required', 'class' => 'form-control']); ?> 
          
            	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">بحث</button>
  	</div>

         <?php echo Form::close(); ?>

    

	
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>