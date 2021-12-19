@php
$title = isset($item) ? $item->name : 'إنشاء الحلقات والقاعات';
@endphp

<div class="row">
    <div class="col-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
            <div class="box-body">

                {!! Form::myInput('text', 'name', 'إسم الحلقة <span class=red>*</span>', ['required']) !!}
                @if (auth()->user()->isSupervisor) 
   {!! Form::mySelect('department_id', 'القسم <span class=red>*</span>', ['' => ''] + App\Department::where('supervisor_id',auth()->user()->id)->pluck('name', 'id')->toArray(), null, ['class' => 'chosen-rtl   form-contro', 'id' => 'department']) !!}
    
             @else   
                {!! Form::mySelect('department_id', 'القسم <span class=red>*</span>', ['' => ''] + App\Department::pluck('name', 'id')->toArray(), null, ['class' => 'chosen-rtl   form-contro', 'id' => 'department']) !!}
              
                @endif
@if(isset($item))
   @if (auth()->user()->isSupervisor) 
           {!! Form::mySelect('section_id', 'المسار <span class=red>*</span>', ['' => ''] + App\Section::whereHas('departments', function ($q) {
                $q->where('supervisor_id', auth()->id());})->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']) !!}
               @else
                    {!! Form::mySelect('section_id', 'المسار <span class=red>*</span>', ['' => ''] + App\Section::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']) !!}
                                     @endif
                                      {!! Form::mySelect('level_id', 'المستوى', ['' => ''] + App\Level::pluck('name', 'id')->toArray(), null, ['class' =>'form-control select']) !!}
          
                                        @else
                                        
                                        <div class="form-group">
                                        
                                                <label for="">المسار</label>
                                                <select name="section_id" id="section_id" class="form-control select" required>
                                                 
                                                        <option value="">اختر القسم اولاً</option>
                                                 
                                                </select>
                                                @if ($errors->has('section_id'))
                                                    <p class="help-block"><small>{{ $errors->first('section_id') }}</small></p>
                                                @endif
                                        </div>
                                    
                                        <div class="form-group">
                                        
                                                <label for="">المستوى</label>
                                                <select name="level_id" id="level_id" class="form-control select" required>
                                                 
                                                        <option value="">اختر المسار اولاً</option>
                                                 
                                                </select>
                                                @if ($errors->has('level_id'))
                                                    <p class="help-block"><small>{{ $errors->first('level_id') }}</small></p>
                                                @endif
                                        </div>
                                        
                           @endif  
                {!! Form::mySelect('teacher_id','المعلمة <span class=red>*</span>',['' => ''] +App\User::where('role', 5)->pluck('name', 'id')->toArray(),null,['class' => 'chosen-rtl form-contro']) !!}
                {!! Form::mySelect('code', 'رصد الدرجات', config('variables.classrooms_code'), null, ['class' => 'chosen-rtl form-contro']) !!}

               
                {!! Form::myTextArea('description', 'نبذة  <span class=red>*</span>', ['required']) !!}
                {!! Form::mySelect('type', 'نوع  <span class=red>*</span>', config('variables.divisions_type')) !!}

                {{-- {!! Form::myInput('text', 'batch', 'انعقاد الدورة <span class=red>*</span>', ['required']) !!} --}}

                {{-- {!! Form::myInput('number', 'price', 'رسوم التسجيل <span class=red>*</span>', ['required']) !!}

        {!! Form::myInput('text', 'activity', 'الانشطة') !!} --}}

            </div>
        </div>

    </div>
    {{-- <div class="col-sm-6">
        <div class="box box-warning">
            <div class="box-body">

                {!! Form::myTextArea('description', 'معلومات اضافية') !!}

                {!! Form::myTextArea('note', 'ملاحظات') !!}

                {!! Form::myFile('pdf_file', 'ملف ') !!}

                @if (isset($item) && $item->pdf_file)
                    <a href="{{ $item->pdf_file }}" download class="btn btn-lg btn-success btn-block"><i
                            class="fa fa-file-pdf-o"></i></a>
                @endif
                {!! Form::mySelect('gender', 'متاح لـ <span class=red>*</span>', config('variables.divisions_gender')) !!}

                {!! Form::mySelect('status', 'حالة التسجيل <span class=red>*</span>', config('variables.status')) !!}
                {!! Form::mySelect('type', 'نوع  <span class=red>*</span>', config('variables.divisions_type')) !!}


                @isset($item)
                    @if ($item->created_by)
                        {!! Form::myInput('text', 'created_by', 'تسجيل بواسطة', ['disabled'], $item->creator->name) !!}
                    @endif
                    @if ($item->created_at)
                        {!! Form::myInput('text', 'created_at', 'تاريخ التسجيل', ['disabled'], $item->created_at) !!}
                    @endif
                    @if ($item->updated_by)
                        {!! Form::myInput('text', 'updated_by', 'تحديث بواسطة', ['disabled'], $item->updator->name) !!}
                    @endif
                    @if ($item->updated_at)
                        {!! Form::myInput('text', 'updated_at', 'تاريخ التحديث', ['disabled'], $item->updated_at) !!}
                    @endif
                @endisset
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-camera"></i> صورة الدورة </h3>
            </div>
            <div class="box-body">
                {!! Form::myFile('photo', 'الصورة') !!}

                <p><small>جميع الصور مع التمديد
                        <span class="btn btn-default btn-xs">JPG</span>
                        <span class="btn btn-default btn-xs">JPEG</span>
                        <span class="btn btn-default btn-xs">PNG</span></small></p>
            </div>

            @if (isset($item) && $item->photo)
                <div class="text-center">
                    <img src="{{ $item->photo }}" alt="">
                    <hr>
                </div>
            @endif
        </div>
    </div> --}}

</div>
