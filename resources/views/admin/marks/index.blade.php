@extends('admin.default')

@section('page-header')
    الدرجات الشهرية <small>إدارة</small>
@stop

@section('content')
    <section class="filter-area">
        <form action="" class="form-inline">

            <ul class="list-inline">
                <li style="float: left">
                  <button class="btn btn-success btn-xs"><i class="fa fa-search"></i></button>
                 
                </li>
            </ul>
                  @if (auth()->user()->isSupervisor) 

                       {!! Form::mySelect('department_id', '', ['' => 'القسم'] + App\Department::where('supervisor_id',auth()->user()->id)->pluck('name', 'id')->toArray(), request('department_id'), ['class' => 'form-control select']) !!}
              {!! Form::mySelect('classroom_id', '', ['' => 'الحلقة'] + App\Classroom::whereHas('department', function ($q) {
                $q->where('supervisor_id', auth()->id());
            })->pluck('name', 'id')->toArray(), request('classroom_id'), ['class' => 'form-control select']) !!}
            {!! Form::mySelect('section_id', '', ['' => 'المسار'] + App\Section::whereHas('departments', function ($q) {
                $q->where('supervisor_id', auth()->id());
            })->pluck('name', 'id')->toArray(), request('section_id'), ['class' => 'form-control select']) !!}
             
             @else
            {!! Form::mySelect('department_id', '', ['' => 'القسم'] + App\Department::pluck('name', 'id')->toArray(), request('department_id'), ['class' => 'form-control select']) !!}
            {!! Form::mySelect('classroom_id', '', ['' => 'الحلقة'] + App\Classroom::pluck('name', 'id')->toArray(), request('classroom_id'), ['class' => 'form-control select']) !!}

            {!! Form::mySelect('section_id', '', ['' => 'المسار'] + App\Section::pluck('name', 'id')->toArray(), request('section_id'), ['class' => 'form-control select']) !!}
            @endif
           



        </form>
    </section>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-body table-responsive no-padding">
                    <table class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>إسم القسم</th>
                                <th>إسم الحلقة</th>
                                <th>المسار</th>
                                <th>المعلمة</th>
                                <th>الخيارات</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>إسم القسم</th>
                                <th>إسم الحلقة</th>
                                <th>المسار</th>
                                <th>المعلمة</th>
                                <th>الخيارات</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            @foreach ($classrooms as $classroom)
                                <tr>
                                    <td>{{ $classroom->department_name }}</td>
                                    <td>{{ $classroom->classroom_name }}</td>
                                    <td>{{ $classroom->section_name }}</td>
                                    <td>{{ $classroom->user_name }}</td>
                                    <td>
                                        <form action="{{ route(ADMIN . '.marks.create') }}" target="_blank">
                                            <input type="hidden" name="classroom" value="{{ $classroom->classroom_id }}">
                                            {!! Form::mySelect('month', '', config('variables.months'),null, ['class' => 'form-control select']) !!}
                                            {!! Form::mySelect('semester', '', config('variables.semesters'), null,['class' => 'form-control select']) !!}
                              
                                            @if($classroom->separate_section!=1)
                                            {!! Form::mySelect('level', '', App\Level::pluck('name', 'id')->toArray(), null, ['required', 'class' => 'form-control select']) !!}
                                            @endif
                                            <button class="btn btn-danger">رصد الدرجات</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {!! $classrooms->appends(request()->input())->links() !!}
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection
