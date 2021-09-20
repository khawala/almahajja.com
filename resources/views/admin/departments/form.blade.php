@php
  $title = isset($item) ? $item->name: "إنشاء قسم "
@endphp

<div class="row">
  <div class="col-sm-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
      </div>
      <div class="box-body">

        {!! Form::myInput('text', 'name', 'إسم القسم <span class=red>*</span>', ['required']) !!}
        @if(!isset($item))
 <div class="form-group">
     <label>المسارات</label>
    <br/>
         <?php
          $sections=App\Section::all();
          foreach($sections as $section){ ?>
      <input type="checkbox" name="section_id[]" value="{{$section->id}}">{{$section->name}}</input><br/>
<?php } ?>
    </div>
    @else
     <div class="form-group">
     <label>المسارات</label>
    <br/>
         <?php
          $sections=App\Section::all();
          foreach($sections as $section){  ?>
      <input type="checkbox" name="section_id[]" value="{{$section->id}}" @if($item->sections->contains($section->id)) checked @endif>{{$section->name}}</input><br/>
<?php } ?>
    </div>
@endif
        {!! Form::mySelect('supervisor_id', 'المشرفة/المدربه  <span class=red>*</span>', App\User::supervisor()->pluck('name', 'id')->toArray(),null, ['required', 'class' => 'chosen-rtl form-control'])  !!}
        

      </div>
    </div>

  </div>
  <div class="col-sm-6">
    <div class="box box-info">
      <div class="box-body">

        {!! Form::mySelect('registeration_status', 'حالة التسجيل', config('variables.registeration_status'),null, ['required', 'class' => 'chosen-rtl form-control']) !!}

          {!! Form::mySelect('register_type', 'نوع التسجيل', config('variables.register_type'),null, ['required', 'class' => 'chosen-rtl form-control']) !!}

  {!! Form::mySelect('payment_type', 'نوع الدفع', config('variables.payment_type'),null, ['required', 'class' => 'chosen-rtl form-control']) !!}

         
          
      </div>
    </div>
  </div>
</div>