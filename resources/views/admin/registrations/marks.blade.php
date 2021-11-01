@extends('admin.default')

@section('page-header')
    كشف درجات طالبة
@stop

@section('title')
    {{ $registration->id }}_{{ $registration->student->name }}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-6 col-md-4">
            <p><strong>الطالبة </strong>: {{ $registration->student->name }}</p>
            <p><strong>رقم التسجيل </strong>: {{ $registration->id }}</p>
            <p><strong>الحلقة </strong>: {{ $registration->classroom->name }}</p>
            <p><strong>المعلمة </strong>: {{ $registration->classroom->teacher->name }}</p>
        </div>
        <div class="col-xs-6 col-md-4">
            <p><strong>القسم </strong>: {{ $registration->department->name }}</p>
            <p><strong>المسار </strong>: {{ $registration->section->name }}</p>
            {{-- <p><strong>المستوى </strong>: {{ $registration->levelName }}</p> --}}
            {{-- <p><strong>كمية الحفظ </strong>: {{ $registration->section->division->note }}</p> --}}
        </div>
    </div>

   
    <a href="{{ route('registration.marks', request()->all()) }}&print=1" target="_blank" class="btn btn-success no-print pull-left"><i class="fa fa-print"></i></a>
    <hr>

	<div class="row">
	  <div class="col-xs-12">
	    <div class="box box-info">
	      <!-- /.box-header -->
	      <div class="box-body table-responsive no-padding">
            
	        <table class="table data-tables" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>الشهر</th>
                        <th>الفصل الدراسي</th>
                        <th>المستوى</th>
                        <th>المراجعة</th>
                        <th>التسميع</th>
                        <th>الإختبار الشهري</th>
                        <th>المجموع</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>الشهر</th>
                        <th>الفصل الدراسي</th>
                        <th>المستوى</th>
                        <th>المراجعة</th>
                        <th>التسميع</th>
                        <th>الإختبار الشهري</th>
                        <th>المجموع</th>
                    </tr>
                </tfoot>
             
                <tbody>
                    @foreach ($registration->marks as $mark)
                        <tr>
                            <td>{{ $mark->monthName }}</td>
                            <td>{{ $mark->semesterName }}</td>
                            <td>{{ $mark->levelName }}</td>
                            <td>{{ $mark->mark1 }}</td>
                            <td>{{ $mark->mark2 }}</td>
                            <td>{{ $mark->mark3 }}</td>
                            <td>{{ $mark->sum }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
	      </div>
	      <!-- /.box-body -->
	    </div>
	    <!-- /.box -->
	  </div>
	</div>
@endsection
