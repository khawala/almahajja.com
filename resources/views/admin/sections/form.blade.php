<div class="row">
    <div class="col-sm-12">

        {!! Form::mySelect('supervisor_id', 'المشرفة/المدربه  <span class=red>*</span>', App\User::supervisor()->pluck('name', 'id')->toArray(),null, ['required', 'class' => 'chosen-rtl form-control'])  !!}
       
        
        {!! Form::myInput('text', 'name', 'اسم مسار  <span class=red>*</span>', ['required']) !!}
        {!! Form::mySelect('period_id', 'الفترة  <span class=red>*</span>', App\Period::pluck('name', 'id')->toArray(),null, ['required', 'class' => 'chosen-rtl form-control'])  !!}
        {!! Form::myTextArea('description', 'نبذة عن المسار') !!}
        
    </div>
   
</div>
