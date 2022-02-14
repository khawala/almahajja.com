<?php $__env->startSection('page-header'); ?>
	شاشة الاعدادات
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	
	<?php echo Form::model($item, [
			'action' => ['ConfigurationController@update', $item->id],
			'method' => 'put', 
			'files' => true
		]); ?>

		<div class="row">
		  <div class="col-sm-4">
				<div class="box box-info">
				  <div class="box-body">
						<?php echo Form::myTextArea('about_almahajja_waqf', 'عن الوقف', ['rows' => 3]); ?>

						
						<?php echo Form::myTextArea('about_almahajja_project', 'عن مشروع الحلقات الهاتفية', ['rows' => 3]); ?>

						
						<?php echo Form::myTextArea('vision', 'رؤيتنا', ['rows' => 3]); ?>

						
						<?php echo Form::myTextArea('mission', 'رسالتنا', ['rows' => 3]); ?>

						
						<?php echo Form::myTextArea('values', 'قيمنا', ['rows' => 3]); ?>

						
						<?php echo Form::myTextArea('goals', 'أهدافنا', ['rows' => 3]); ?>

						
						<?php echo Form::myTextArea('history', 'نبذة تاريخية', ['rows' => 3]); ?>

						
				  </div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="box box-info">
				  <div class="box-body">

						<?php echo Form::myInput('text', 'website', 'الموقع الالكتروني'); ?>


						<?php echo Form::myInput('text', 'email', 'البريد الالكتروني'); ?>


						<?php echo Form::myInput('text', 'mobile', 'الجوال'); ?>


						<?php echo Form::myInput('text', 'phone', 'الهاتف'); ?>

	<?php echo Form::myInput('text', 'whatsapp', 'واتساب'); ?>


						<?php echo Form::myInput('text', 'fax', 'الفاكس'); ?>


						<?php echo Form::myInput('text', 'toll_free', 'الرقم المجاني'); ?>


						<?php echo Form::myInput('text', 'twitter', 'تويتر'); ?>


						<?php echo Form::myInput('text', 'instagram', 'انستغرام'); ?>


						<?php echo Form::myInput('text', 'facebook', 'التلقرام'); ?>


						<?php echo Form::myInput('text', 'youtube', 'اليوتيوب'); ?>


						<?php echo Form::myInput('text', 'snapchat', 'سناب شات'); ?>


						<?php echo Form::myInput('text', 'address', 'عنوان المكتب'); ?>

						
				  </div>
				</div>

		  </div>

		  <div class="col-sm-4">
				<div class="box box-info">
				  <div class="box-body">

					<?php echo Form::myFile('logo', 'الشعار'); ?>


					<?php if($item->logo): ?>
						<h3>الشعار</h3>
						<div class="text-center">
							<img style="width: 100%" src="<?php echo e($item->logo); ?>" alt="">
							<hr>
						</div>
					<?php endif; ?>

					<?php echo $__env->make('admin.commun.map', [
						'lat' => (isset($item) && $item->lat) ? $item->lat : 21.389680447254825, 
						'lng' => (isset($item) && $item->lng) ? $item->lng : 39.85845143389895
					], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


				  </div>
				</div>
		  </div>

		</div>

		<div class="box-footer">
		  <button type="submit" class="btn btn-info"><?php echo e(trans('app.edit_button')); ?></button>
		</div>
	
  <?php echo Form::close(); ?>

	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>