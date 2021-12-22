<div class="row">
    <div class="col-sm-12">

        {!! Form::myInput('text', 'key', 'الاسم المميز   <span class=red>*</span>', ['required']) !!}
            {!! Form::myInput('text', 'name', 'الاسم    <span class=red>*</span>', ['required']) !!}
        
        {!! Form::myTextArea('content', 'المحتوى') !!}
    <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-camera"></i> الملف </h3>
                    </div>

                    {!! Form::myFile('file', 'الملف') !!}

                  
                </div>

                @if (isset($item) && $item->file)
                    <div class="text-center">
                        <a href="{{ $item->file }}" alt=""> الملف </a>
                        <hr>
                    </div>
                @endif
    </div>
</div>
