@php
$title = isset($item) ? $item->name : 'إنشاء قسم ';
@endphp

<div class="row">
    <div class="col-sm-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
            <div class="box-body">

                {!! Form::myInput('text', 'name', 'إسم القسم <span class=red>*</span>', ['required']) !!}
                @if (!isset($item))
                    <div class="form-group">
                        <label>المسارات</label>
                        <br />
                        <?php
          $sections=App\Section::all();
          foreach($sections as $section){ ?>
                        <input type="checkbox" name="section_id[]"
                            value="{{ $section->id }}">{{ $section->name }}</input><br />
                        <?php } ?>
                    </div>
                @else
                    <div class="form-group">
                        <label>المسارات</label>
                        <br />
                        <?php
          $sections=App\Section::all();
          foreach($sections as $section){  ?>
                        <input type="checkbox" name="section_id[]" value="{{ $section->id }}"
                            @if ($item->sections->contains($section->id)) checked @endif>{{ $section->name }}</input><br />
                        <?php } ?>
                    </div>
                @endif
                {!! Form::mySelect('supervisor_id','المشرفة/المدربه  <span class=red>*</span>',App\User::supervisor()->pluck('name', 'id')->toArray(),null,['required', 'class' => 'chosen-rtl form-control']) !!}

                {!! Form::myTextArea('description', 'نبذة عن القسم') !!}
        
                
                 
                 @if (isset($item) )
                 {{ Form::label('start_date','تاريخ البدء',['class' => 'control-label']) }}
                 {!! Form::date('start_date',$item->start_date,['required', 'class' => 'form-control']) !!} 
                
                 {{ Form::label('end_date','تاريخ الإنتهاء',['class' => 'control-label']) }}
                 {!! Form::date('end_date',$item->end_date,['required', 'class' => 'form-control']) !!}  
                 @else
                 {{ Form::label('start_date','تاريخ البدء',['class' => 'control-label']) }}
                 {!! Form::date('start_date',date('Y-m-d'),['required', 'class' => 'form-control']) !!} 
                  
                 {{ Form::label('end_date','تاريخ الإنتهاء',['class' => 'control-label']) }}
                 {!! Form::date('end_date',date('Y-m-d'),['required', 'class' => 'form-control']) !!}  
@endif
                 {!! Form::myInput('number', 'price', 'سعر الإشتراك <span class=red>*</span>', ['required']) !!}

            </div>
        </div>

    </div>
    <div class="col-sm-6">
        <div class="box box-info">
            <div class="box-body">

                {!! Form::mySelect('registeration_status', 'حالة التسجيل', config('variables.registeration_status'), null, ['required', 'class' => 'chosen-rtl form-control']) !!}

                {!! Form::mySelect('register_type', 'نوع التسجيل', config('variables.register_type'), null, ['required', 'class' => 'chosen-rtl form-control']) !!}

                {!! Form::mySelect('payment_type', 'نوع الدفع', config('variables.payment_type'), null, ['required', 'class' => 'chosen-rtl form-control']) !!}
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-camera"></i> صورة القسم </h3>
                    </div>

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
    </div>

</div>
