@extends('admin.default')

@section('page-header')
الشهادات <small>{{ trans('app.manage') }}</small>
@stop

@section('content')

<section class="filter-area">
    <form action="" class="form-inline">
        {!! Form::mySelect('section_id', '', [''=>'المسار'] + App\Section::ListGroup(), request('section_id'), ['required', 'class' => 'form-control select']) !!}

        {!! Form::mySelect('classroom_id', '', [''=>'الحلقة'] + App\Classroom::myList(), request('classroom_id')) !!}

        <button class="btn btn-success btn-xs"><i class="fa fa-search"></i></button>
        <a href="{{ route(ADMIN . '.certifications.index') }}" class="btn btn-primary btn-xs"><i class="fa fa-close"></i></a>
        <a href="{{ route(ADMIN . '.certifications.index',['export' => true]) }}" class="btn btn-info btn-xs"><i class="fa fa-print"></i></a>

    </form>
</section>
<br>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

                <table class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>رقم التسجيل</th>
                            <th>الطالبة</th>
                            <th>المسار</th>
                            <th>تاريخ التسجيل</th>
                            <th>الحلقة</th>
                            <th>الشهادة</th>
                            <th>كشف الدرجات</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>رقم التسجيل</th>
                            <th>الطالبة</th>
                            <th>المسار</th>
                            <th>تاريخ التسجيل</th>
                            <th>الحلقة</th>
                            <th>الشهادة</th>
                            <th>كشف الدرجات</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->student->name }}</td>
                            <td>{{ $item->section->name }}</td>
                            <td>{!! $item->created_at_formated !!}</td>
                            <td>{{ $item->classroom->name}}</td>
                            <td>
                                <a href="{{ route('certifications.print', $item) }}" target="_blank" class="btn btn-default" title="الشهادة"><i class="fa fa-print"></i></a>
                            </td>
                            <td>
                                              <a href="{{ route('registration.marks', ['id' => $item->id, 'level' => $item->level->id]) }}&print=1" target="_blank" class="btn btn-success no-print"><i class="fa fa-print"></i></a>

                            <!--   {!! Form::open([ 'class' => 'form-inline', 'method' => 'GET',  'target' => '_blank', 'route' => ADMIN . '.registrations.marks',    ]) !!}-->
                            <!--    {!! Form::hidden('id', $item->id) !!}-->
                            <!--    {!! Form::mySelect('level', '',App\Level::pluck('name', 'id')->toArray(), null, ['required']) !!}-->
                            <!--    <button class="btn btn-success btn-xs" title="الكشف"><i class="fa fa-print"></i></button>-->
                            <!--    {!! Form::close() !!}-->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
        {!! $items->links() !!}
    </div>
</div>

@stop