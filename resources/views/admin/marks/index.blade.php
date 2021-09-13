@extends('admin.default')

@section('page-header')
    الدرجات الشهرية <small>إدارة</small>
@stop

@section('content')
    <div class="box box-info">
        <div class="box-body table-responsive no-padding">
            <table class="table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>إسم الحلقة</th>
                        <th>المسار</th>
                        <th>المعلمة</th>
                        <th>الخيارات</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>إسم الحلقة</th>
                        <th>المسار</th>
                        <th>المعلمة</th>
                        <th>الخيارات</th>
                    </tr>
                </tfoot>
                
                <tbody>
                    @foreach ($classrooms as $classroom)
                        <tr>
                            <td>{{ $classroom->classroom_name }}</td>
                            <td>{{ $classroom->section_name }}</td>
                            <td>{{ $classroom->user_name }}</td>
                            <td>
                                <form action="{{ route(ADMIN . '.marks.create') }}" target="_blank">
                                    <input type="hidden" name="classroom" value="{{ $classroom->classroom_id }}">
                                    {!! Form::mySelect('month', '', config('variables.months')) !!}
                                    {!! Form::mySelect('semester', '', config('variables.semesters')) !!}
                                    {!! Form::mySelect('level', '', config('variables.sections_level'), null, ['required']) !!}
                                    <button class="btn btn-danger">رصد الدرجات</button>
                                </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {!! $classrooms->links() !!}
        </div>
        <!-- /.box-body -->
    </div>
@endsection