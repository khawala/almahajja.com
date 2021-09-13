
<div class="row">
    <div class="col-sm-6">
        <?php echo Form::mySelect('section_id', 'المسار  <span class=red>*</span>', App\Section::whereIn('id', $section_id)->pluck('name', 'id')); ?>


        <?php echo Form::myTextArea('description', 'المنهج (النصاب) <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myFile('pdf_file', 'ملف المسار'); ?>


          <?php if(isset($item) && $item->pdf_file): ?>
            <a href="<?php echo e($item->pdf_file); ?>" download class="btn btn-lg btn-success btn-block"><i class="fa fa-file-pdf-o"></i></a>
          <?php endif; ?>
    </div>
    <div class="col-sm-6">

        <?php echo Form::myInput('text', 'start_date', 'من تاريخ', ['class' => 'form-control datetime']); ?>

        
        <?php echo Form::myInput('text', 'end_date', 'الى تاريخ', ['class' => 'form-control datetime']); ?>

        
        <?php echo Form::mySelect('semester', 'الفصل الدراسي', config('variables.division_times_semester')); ?>


        <?php echo Form::mySelect('level', 'المستوى', config('variables.sections_level')); ?>

    </div>
</div>

