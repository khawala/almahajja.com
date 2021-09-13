<button type="button" class="btn btn-success" data-toggle="modal" data-target="#divisionTimeModal">
	إضافة
</button>

<!-- Modal -->
<div class="modal fade" id="divisionTimeModal" tabindex="-1" role="dialog" aria-labelledby="divisionTimeModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<?php echo Form::open([
			'action' => ['DivisionTimeController@store'],
			'files' => true
			]); ?>

		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="divisionTimeModalLabel"> منهج جديد</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo $__env->make('admin.division-times.form', ['section_id' => $item->sections->pluck('id')], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary">حفظ</button>
			</div>
		</div>
		<?php echo Form::close(); ?>

	</div>
</div>