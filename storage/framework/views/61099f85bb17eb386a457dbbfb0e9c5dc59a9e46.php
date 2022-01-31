<div class="row">
    <div class="col-sm-12">

        <?php echo Form::mySelect('section_id', 'المسار <span class=red>*</span>',['' => ''] +  App\Section::pluck('name', 'id')->toArray(),null, ['class' => 'form-control select']); ?>

        <?php echo Form::mySelect('level_id', 'المستوى <span class=red>*</span>',['' => ''] +  App\Level::pluck('name', 'id')->toArray(),null, ['class' => 'form-control select']); ?>



        <?php echo Form::myTextArea('brief', 'نبذة'); ?>

           <?php echo Form::myFile('pdf_file', 'ملف المسار'); ?>


     <?php if(isset($item) && $item->pdf_file): ?>
     <a href="<?php echo e($item->pdf_file); ?>" download class="btn btn-lg btn-success btn-block"><i class="fa fa-file-pdf-o"></i></a>
   <?php endif; ?>
    </div>
</div>
