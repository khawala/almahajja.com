<div class="row">
    <div class="col-sm-12">

        {!! Form::mySelect('supervisor_id', 'المشرفة/المدربه  <span class=red>*</span>', App\User::supervisor()->pluck('name', 'id')->toArray(),null, ['required', 'class' => 'chosen-rtl form-control'])  !!}
       

        {!! Form::myInput('text', 'name', 'اسم مسار  <span class=red>*</span>', ['required']) !!}
        
        {!! Form::myTextArea('description', 'نبذة عن المسار') !!}
        
    </div>
    <!--<div class="col-sm-6">-->

    <!--    {!! Form::myInput('text', 'category', 'القسم') !!}-->

    <!--    {!! Form::myInput('text', 'track', 'الفرع') !!}-->
        
    <!--    {!! Form::myFile('pdf_file', 'ملف المسار') !!}-->

    <!--    @if (isset($item) && $item->pdf_file)-->
    <!--        <a href="{{ $item->pdf_file }}" download class="btn btn-lg btn-success btn-block"><i class="fa fa-file-pdf-o"></i></a>-->
    <!--    @endif-->
    <!--</div>-->
</div>
