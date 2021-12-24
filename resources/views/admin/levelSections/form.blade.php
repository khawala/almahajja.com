<div class="row">
    <div class="col-sm-12">

        {!! Form::mySelect('section_id', 'المسار <span class=red>*</span>',['' => ''] +  App\Section::pluck('name', 'id')->toArray(),null, ['class' => 'form-control select']) !!}
        {!! Form::mySelect('level_id', 'المستوى <span class=red>*</span>',['' => ''] +  App\Level::pluck('name', 'id')->toArray(),null, ['class' => 'form-control select']) !!}


        {!! Form::myTextArea('brief', 'نبذة') !!}
           {!! Form::myFile('pdf_file', 'ملف المسار') !!}

     @if (isset($item) && $item->pdf_file)
     <a href="{{ $item->pdf_file }}" download class="btn btn-lg btn-success btn-block"><i class="fa fa-file-pdf-o"></i></a>
   @endif
    </div>
</div>
