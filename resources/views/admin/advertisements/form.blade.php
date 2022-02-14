@php
  $title = isset($item) ? $item->name: "إنشاء الاعلانات"
@endphp

<div class="row">
  <div class="col-sm-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
      </div>
      <div class="box-body">

        {!! Form::myInput('text', 'name', 'عنوان الاعل') !!}

        {!! Form::myTextArea('short_description', 'مختصر الاعل') !!}

        {!! Form::myTextArea('description', 'نص الاعلان') !!}

        {!! Form::myInput('url', 'url', 'رابط خارجي') !!}


      </div>
    </div>

  </div>

  <div class="col-sm-4">
    <div class="box box-warning">
      <div class="box-header with-border">
        {!! Form::mySelect('status', 'حالة الاعلان', config('variables.advertisements_status')) !!}

        {!! Form::myTextArea('note', 'الملاحظات') !!}
      </div>
    </div>

    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-camera"></i> صورة الاعلان</h3>
      </div>
      <div class="box-body">
        {!! Form::myFile('photo', 'صورة الاعلان') !!}

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

  </div>

</div>