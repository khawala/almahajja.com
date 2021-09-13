
<div class="row">
    <div class="col-sm-6">
        {!! Form::mySelect('section_id', 'المسار  <span class=red>*</span>', App\Section::whereIn('id', $section_id)->pluck('name', 'id')) !!}

        {!! Form::myTextArea('description', 'المنهج (النصاب) <span class=red>*</span>', ['required']) !!}

        {!! Form::myFile('pdf_file', 'ملف المسار') !!}

          @if (isset($item) && $item->pdf_file)
            <a href="{{ $item->pdf_file }}" download class="btn btn-lg btn-success btn-block"><i class="fa fa-file-pdf-o"></i></a>
          @endif
    </div>
    <div class="col-sm-6">

        {!! Form::myInput('text', 'start_date', 'من تاريخ', ['class' => 'form-control datetime']) !!}
        
        {!! Form::myInput('text', 'end_date', 'الى تاريخ', ['class' => 'form-control datetime']) !!}
        
        {!! Form::mySelect('semester', 'الفصل الدراسي', config('variables.division_times_semester')) !!}

        {!! Form::mySelect('level', 'المستوى', config('variables.sections_level')) !!}
    </div>
</div>

