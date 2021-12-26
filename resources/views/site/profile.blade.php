@extends('site.new_default')

@section('content')
    <section class="sub-page">
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <h2>{{ $user->name }}</h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>جوال التواصل: {{ $user->mobile1 }}</p>
                                <p>البريد الالكتروني: {{ $user->email }}</p>
                                <p> الشريحة: {{ $user->telecom->name }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p>الجنس: {{ $user->GenderName }}</p>
                                <p>الجنسية: {{ $user->nationality->name }}</p>
                                <p>حالة الحساب: {{ $user->statusName }}</p>
                            </div>
                        </div>
                        <a href="{{route('profile.edit')}}" class="btn button-info" style="background-color:#7f999a;color:white;">تعديل</a>
                    </div>
                    <div class="col-sm-3">
                        <img src="{{ $user->photo }}" alt="">
                    </div>
                </div>
            </div>
        </header>
      
     
  
@if(auth()->user()->role==0)
        <div class="container">
            <div class="details">
                <h2>الدورات والحلقات</h2>

                <div class="table-responsive">
                    <table class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>رقم التسجيل</th>
                                    <th>القسم</th>
                                <th>المسار</th>
                                <th>وقت التسميع</th>
                                <th>المستوى</th>
                                <th>الحلقة</th>
                                <th width="270">الحالة</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($user->registrations as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                      <td>{{ $item->department->name }}</td>
                                    <td>{{ $item->section->name }}</td>
                                
                                    <td>{{ $item->period->name}}</td>
                                   
                                 
                                    @if($item->level)
                                    <td>{{ $item->level->name }}
                                      <?php
                                            $file=App\LevelSection::where([['level_id',$item->level->id],['section_id',$item->section->id]])->first();
                                           
                                            if($file){  ?>
                                                <a href="{{$file->pdf_file}}" target="_blnck">
                                                    <i class="fas fa-download"></i> الخطة
                                                </a>
                                              <?php   } ?>
                                         </td>
                              
                                           
                                          
                                      
                                    @else
                                    <td>لم يحدد بعد</td>
                                    @endif
                                    @if($item->classroom)
                                    <td>{{ $item->classroom->name }}</td>
                                    @else
                                    <td>لم تحدد بعد</td>
                                    @endif
                                    <td>
                                        <ul class="list-inline">
                                            <li>{{ $item->statusName }}</li>

                                            @if ($item->level && $item->section)
                                                <li><a class="btn btn-xs btn-info" href="{{ route('profile.marks', [$item->id, $item->section->id]) }}">كشف الدرجات</a></li>
                                            @endif

                                            @if ($item->status == 3||$item->status==5)
                                                <li><a target="_blank" class="btn btn-xs btn-success" href="{{ route('certifications.print', $item) }}">طباعة الشهادة</a></li>
                                            @endif
 
                                            @foreach ($item->section->divisiontimes as $divisiontime)
                                                @if ($divisiontime->pdf_file)
                                                    <a class="btn btn-primary btn-xs" download href="{{ $divisiontime->pdf_file }}"><i class="fa fa-download"></i></a>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
         <div class="container">
            <div class="details">
                <h2> طلبات التوظيف</h2>

                <div class="box-body table-responsive no-padding">
            
	        <table class="table data-tables" cellspacing="0" width="100%">
                <thead>
                    <tr>
                     
                        <th>الوظيفة</th>
                        <th> القسم</th>
                        <th>الملاحظات</th>
                        <th>الحالة</th>

                    </tr>
                </thead>
             
                <tfoot>
                    <tr>

                        <th>الوظيفة</th>
                        <th>القسم </th>
                        <th>الملاحظات</th>
                        <th>الحالة</th>
                      
                    </tr>
                </tfoot>
             
                <tbody>
                 
					@foreach (auth()->user()->jobRequest as $item)
						<tr>
						   
	                        <td>{{ $item->job->name }}</a></td>
	                        
                            <td>@if($item->department){{ $item->department->name }} @else '_' @endif</td>
                            <td>{{ $item->note }}</td>
                            <td>{{ $item->statusName }}</td>
	                       
						</tr>
					@endforeach
                </tbody>
            </table>
	      </div>
	      <!-- /.box-body -->
            </div>
        </div>
        @endif
        
    </section>
@endsection