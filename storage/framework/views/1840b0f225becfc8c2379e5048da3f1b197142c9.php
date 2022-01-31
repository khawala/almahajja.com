<div class="row">
    <div class="col-sm-12">

        <?php echo Form::myInput('text', 'name', 'اسم المستوى  <span class=red>*</span>', ['required']); ?>

        
        <?php echo Form::myTextArea('description', 'نبذة عن المستوى'); ?>

           <?php echo Form::mySelect('status', ' حالة المستوى للتسجيل', config('variables.status'),null); ?>

              
    </div>
</div>
