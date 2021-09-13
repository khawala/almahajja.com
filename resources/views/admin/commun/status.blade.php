<?php $allStatus = config('variables.status'); ?>

@if ($status)
	<span class="btn btn-xs btn-success">{{ $allStatus[1] }}</span>
@else
	<span class="btn btn-xs btn-danger">{{ $allStatus[0] }}</span>
@endif