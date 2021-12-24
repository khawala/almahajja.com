<div class="row">
    <div class="col-sm-6">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">
            @if (isset($item))
              رقم التسجيل:	{{ $item->id }}
            @else
              إنشاء تسجيل الطالبة
            @endif
          </h3>
        </div>
        <div class="box-body">
  
          {!! Form::mySelect('user_id', 'الطالبة <span class=red>*</span>', ['' => ''] + App\User::students()->active()->pluck('name', 'id')->toArray(), null, ['required', 'class' => 'form-control select']) !!}
  
  
          {!! Form::mySelect('telecom_id', 'شريحة الجوال', ['' => ''] + App\Telecom::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']) !!}
  
          {!! Form::mySelect('period_id', 'وقت التسميع', ['' => ''] + App\Period::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']) !!}
  
          {!! Form::mySelect('activity_id', 'الانشطة', ['' => ''] + App\Activity::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']) !!}
          
        </div>
      </div>
  
    </div>
    <div class="col-sm-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-user"></i> للإستخدام الإداري</h3>
              </div>
  
          <div class="box-body">
            @if (auth()->user()->isSupervisor) 
            {!! Form::mySelect('department_id', 'القسم <span class=red>*</span>', ['' => ''] + App\Department::where('supervisor_id',auth()->user()->id)->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select', 'id' => 'department']) !!}
                        {!! Form::mySelect('section_id', 'المسار <span class=red>*</span>', ['' => ''] + App\Section::whereHas('departments', function ($q) {
                         $q->where('supervisor_id', auth()->id());
                     })->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']) !!}
              {!! Form::mySelect('classroom_id', 'الحلقة', ['' => 'إختر حلقة ...'] + App\Classroom::whereHas('department', function ($q) {
                $q->where('supervisor_id', auth()->id());
            })->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']) !!}
                        
                      @else   
              {!! Form::mySelect('department_id', 'القسم', ['' => 'إختر القسم ...'] + App\Department::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']) !!}
              {!! Form::mySelect('classroom_id', 'الحلقة', ['' => 'إختر حلقة ...'] + App\Classroom::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']) !!}
              {!! Form::mySelect('section_id', 'المسار <span class=red>*</span>', ['' => ''] + App\Section::pluck('name', 'id')->toArray(), null, ['required', 'class' => 'form-control select']) !!}
             @endif
              {!! Form::mySelect('level_id', 'المستوى', ['' => 'إختر المستوى ...'] + App\Level::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']) !!}
              {!! Form::mySelect('status', 'حالة التسجيل <span class=red>*</span>', config('variables.registrations_status')) !!}
              
              {!! Form::myInput('number', 'paid', 'المدفوع') !!}
      
              {!! Form::myTextArea('note', 'الملاحظات') !!}
  
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