@extends('admin.default')

@section('page-header')
    ادخال الدرجات الشهرية <small>إدارة</small>
@stop

@section('content')
    <section class="box box-info">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-5">
                    <p><strong>القسم</strong>: {{ $classroom->department->name }}</p>
                    <p><strong>المسار</strong>: {{ $classroom->section->name }}</p>
                    <p><strong>الحلقة</strong>: {{ $classroom->name }}</p>
                    <p><strong>المعلمة</strong>: {{ $classroom->teacher->name }}</p>
                </div>

                <div class="col-sm-5">
                    <p><strong>الشهر</strong>: {{ config('variables.months')[request('month')] }}</p>
                    <p><strong>الفصل الدراسي</strong>: {{ config('variables.semesters')[request('semester')] }}</p>
                </div>
                <div class="col-sm-2">
                    <a class="btn btn-success" href="{{ route(ADMIN . '.marks.create', request()->all() + ['export' => true]) }}"><i class="fa fa-print"></i></a>
                    {{-- @if ($students->isNotEmpty()) --}}
                    @if ($students->isNotEmpty() && $classroom->code == 1)
                        <div class="mt30">
                            <button type="submit" form="form" class="btn btn-info one-time" >حفظ الدرجات</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>    
    </section>

        
    
    <div class="box box-info">
        <div class="box-body">
            {!! Form::open([
                    'action' => ['MarkController@store'],
                    'files'  => true,
                    'id'     => "form"
                ])
            !!}
                <div class="table-responsive no-padding">
                    <table class="table " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>رقم التسجيل</th>
                                <th>الطالبة</th>
                                
                                <th>مستوى الطالبة</th>
                        
                              <th>المجموع</th>
                              
                        
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($students as $student)
                                <tr class="row-student">
                                    <td>
                                        {{ $student->id }}
                                        <input type="hidden" name="marks[{{ $student->id }}][section_id]" value="{{ $classroom->section->id }}">
                                        <input type="hidden" name="marks[{{ $student->id }}][month]" value="{{ request('month') }}">
                                        <input type="hidden" name="marks[{{ $student->id }}][semester]" value="{{ request('semester') }}">
                                        <input type="hidden" name="marks[{{ $student->id }}][department_id]" value="{{$classroom->department->id }}">
                                        <input type="hidden" name="marks[{{ $student->id }}][level]" value="{{ $student->level->id }}">
                                    </td>
                                    <td>{{$student->name }}</td>
                                     @if($classroom->department->separate_section!=1)
                                    <td>{{ $student->level->name  }}</td>
                                    @else
                                    <!--<td><input type="number" name="marks[{{ $student->id }}][mark1]" class="form-control mark" step="0.01" min="0" max="30" value="{{ $student->mark1 }}"></td>-->
                                    <!--<td><input type="number" name="marks[{{ $student->id }}][mark2]" class="form-control mark" step="0.01" min="0" max="30" value="{{ $student->mark2 }}"></td>-->
                                    <!--<td><input type="number" name="marks[{{ $student->id }}][mark3]" class="form-control mark" step="0.01" min="0" max="40" value="{{ $student->mark3 }}"></td>-->
                                    <!--<td><input type="number" class="form-control total" step="0.01" min="0" max="100" disabled value="{{ $student->mark1 + $student->mark2 + $student->mark3 }}"></td>-->
                                    <td><input type="text" name="marks[{{ $student->id }}][separate_section]" class="form-control mark"  value="{{ $student->separate_section }}"></td>
                               
                                @endif
                                       <td><input type="number" name="marks[{{ $student->id }}][total]" class="form-control mark" step="0.01" min="0" max="100" value="{{ $student->total }}"></td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                @if ($students->isNotEmpty() && $classroom->code == 1)
                    <hr>
                    <button type="submit" class="btn btn-info one-time" >حفظ الدرجات</button>
                @endif
            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
@endsection


@section('js')
@parent
  <script>
    (function($){

      $(".row-student input").on('input', function(){
        updateTotal($(this).closest('.row-student'))
      });

      function updateTotal(_parent) {
        console.log("Update");
        var total = 0,
            _total = _parent.find('.total');

            _parent.find('input.mark').each(function(){
              if ($(this).val()) {
                total += parseFloat($(this).val())
              }
            });

            _total.val(total)
      }

    })(jQuery);
  </script>

@stop