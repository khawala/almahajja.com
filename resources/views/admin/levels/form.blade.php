<div class="row">
    <div class="col-sm-12">

        {!! Form::myInput('text', 'name', 'اسم المستوى  <span class=red>*</span>', ['required']) !!}
        
        {!! Form::myTextArea('description', 'نبذة عن المستوى') !!}
           {!! Form::mySelect('status', ' حالة المستوى للتسجيل', config('variables.status'),null) !!}
              
    </div>
</div>
