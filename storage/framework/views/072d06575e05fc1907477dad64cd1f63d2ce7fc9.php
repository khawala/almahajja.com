<div class="row">
    <div class="col-sm-12">

        <?php echo Form::mySelect('supervisor_id', 'المشرفة/المدربه  <span class=red>*</span>', App\User::supervisor()->pluck('name', 'id')->toArray(),null, ['required', 'class' => 'chosen-rtl form-control']); ?>

       
        
        <?php echo Form::myInput('text', 'name', 'اسم مسار  <span class=red>*</span>', ['required']); ?>

        <?php echo Form::mySelect('period_id', 'الفترة  <span class=red>*</span>', App\Period::pluck('name', 'id')->toArray(),null, ['required', 'class' => 'chosen-rtl form-control']); ?>

        <?php echo Form::myTextArea('description', 'نبذة عن المسار'); ?>

            <?php echo Form::mySelect('status', ' حالة المسار للتسجيل', config('variables.status'),null); ?>

                   
    </div>
   
</div>
