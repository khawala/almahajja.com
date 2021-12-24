<div class="row">
    <div class="col-sm-12">

        <?php echo Form::mySelect('supervisor_id', 'المشرفة/المدربه  <span class=red>*</span>', App\User::supervisor()->pluck('name', 'id')->toArray(),null, ['required', 'class' => 'form-control select']); ?>

       

        <?php echo Form::myInput('text', 'name', 'اسم مسار  <span class=red>*</span>', ['required']); ?>

        
        <?php echo Form::myTextArea('description', 'نبذة عن المسار'); ?>

        
    </div>
    <!--<div class="col-sm-6">-->

    <!--    <?php echo Form::myInput('text', 'category', 'القسم'); ?>-->

    <!--    <?php echo Form::myInput('text', 'track', 'الفرع'); ?>-->
        
    <!--    <?php echo Form::myFile('pdf_file', 'ملف المسار'); ?>-->

    <!--    <?php if(isset($item) && $item->pdf_file): ?>-->
    <!--        <a href="<?php echo e($item->pdf_file); ?>" download class="btn btn-lg btn-success btn-block"><i class="fa fa-file-pdf-o"></i></a>-->
    <!--    <?php endif; ?>-->
    <!--</div>-->
</div>
