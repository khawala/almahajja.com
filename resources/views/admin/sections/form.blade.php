<div class="row">
    <div class="col-sm-12">

        {!! Form::mySelect('supervisor_id', 'المشرفة/المدربه  <span class=red>*</span>', App\User::supervisor()->pluck('name', 'id')->toArray(),null, ['required', 'class' => 'form-control select'])  !!}
       
        
        {!! Form::myInput('text', 'name', 'اسم مسار  <span class=red>*</span>', ['required']) !!}
        {!! Form::mySelect('period_id', 'الفترة  <span class=red>*</span>', App\Period::pluck('name', 'id')->toArray(),null, ['required', 'class' => 'form-control select'])  !!}
        {!! Form::myTextArea('description', 'نبذة عن المسار') !!}
            {!! Form::mySelect('status', ' حالة المسار للتسجيل', config('variables.status'),null) !!}
                   
    </div>
   
</div>
