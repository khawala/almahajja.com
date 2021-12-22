<div class="row">
    <div class="col-sm-12">

        <?php echo Form::myInput('text', 'key', 'الاسم المميز   <span class=red>*</span>', ['required']); ?>

            <?php echo Form::myInput('text', 'name', 'الاسم    <span class=red>*</span>', ['required']); ?>

        
        <?php echo Form::myTextArea('content', 'المحتوى'); ?>

    <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-camera"></i> الملف </h3>
                    </div>

                    <?php echo Form::myFile('file', 'الملف'); ?>


                  
                </div>

                <?php if(isset($item) && $item->file): ?>
                    <div class="text-center">
                        <a href="<?php echo e($item->file); ?>" alt=""> الملف </a>
                        <hr>
                    </div>
                <?php endif; ?>
    </div>
</div>
