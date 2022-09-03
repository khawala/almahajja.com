@extends('site.new_default')
@php
    $months    = config('variables.months');
    $semesters = config('variables.semesters');
    $levels    = config('variables.sections_level');
@endphp
@section('content')
    <section class="sub-page">
        <header>
            <div class="container">
                @if ($marks->isNotEmpty())
                    <div class="row">
                        <div class="col-sm-6">
                            <p>القسم: {{ $marks->first()->departments_name }}</p>
                            <p>المسار: {{ $marks->first()->sections_name }}</p>
                        </div>
                        <div class="col-sm-6">
                        <?php $rid=\App\Registration::where('id',$marks->first()->rid)->first();?>
                     
                            <p>الحلقة: {{ $rid->classroom->name }}</p>
                            <!--<p>المعلمة: {{ $marks->first()->users_name }}</p>-->
                        </div>
                    </div>
                @endif
            </div>
        </header>

        <div class="container">
            <div class="details">
                <a href="{{ route('registration.marks', ['id' => $registration_id, 'level' => $level]) }}&print=1" target="_blank" class="btn btn-success no-print pull-left"><i class="fa fa-print"></i></a>

                <h2>الدورات والحلقات</h2>


                <div class="table-responsive">
                    <table class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>الشهر</th>
                                <th>الفصل الدراسي</th>
                                <th>المستوى</th>
                                <th>المجموع</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($marks as $mark)
                            @if($mark->total!=null)
                                <tr>
                                    <td>{{ $months[$mark->month] }}</td>
                                    <td>{{ $semesters[$mark->semester] }}</td>
                                   
                                      @if($mark->separate_section!=null)
                                
                                 <td>{{ $mark->separate_section }}</td>
                                 
                                 @else
                                    <td>{{ $mark->leveln->name }}</td>
                                    @endif
                                    <!--<td>{{ $mark->mark1 }}</td>-->
                                    <!--<td>{{ $mark->mark2 }}</td>-->
                                    <!--<td>{{ $mark->mark3 }}</td>-->
                                    <td>{{ $mark->total}}</td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')

    <style>
        @media print {
            @page {
                size: portrait;
            }
        }
    </style>

@endsection