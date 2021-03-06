@extends('admin.print')

@section('page-header')
   ملخص {{$department->name}}
@stop

@section('title')
    {{ $department->id }}_{{ $department->name }}
@endsection

@section('content')

        <div class="wrapper">
<h1>{{ $department->id }}_{{ $department->name }}</h1>
            <!--<a href="{{ request()->fullUrl() }}&print=1" target="_blank" class="btn btn-success no-print pull-left"><i class="fa fa-print"></i></a>-->
            <hr>
        
            <div class="row">
              <div class="col-xs-12">

                    <table class="table " id="customers" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                 <th> الاسم</th>
                                <th>العدد</th>
                                <th>المحتوى</th>
                            </tr>
                        </thead>
                     
                      
                     
                        <tbody>
                      
                                <tr>
                                      <td>المسارات</td>
                                    <td>{{ count($department->sections) }}</td>
                                    <td>{!!$sectionName !!}</td>
                                </tr>
                                 <tr>
                                      <td>الحلقات</td>
                                    <td>{{ count($department->classrooms) }}</td>
                                    <td>{!!$classroomName !!}</td>
                                </tr>
                                 <tr>
                                      <td>المستويات</td>
                                    <td>{{ $levelCount }}</td>
                                    <td>{!!$levelName !!}</td>
                                </tr>
                                 <tr>
                                      <td>المعلمات</td>
                                    <td>{{ $teacherCount }}</td>
                                    <td>{!!$teacherName !!}</td>
                                </tr>
                                 <tr>
                                      <td>الطلاب</td>
                                    <td colspan="2">{{ count($department->registrations) }}</td>
                                  
                                </tr>
                                          <tr>
                              
                                      <td colspan="3">الشريحة</td>
                                </tr>
                                @foreach($telecom_array as $key => $item)
                            @foreach($item as $key => $item2)
                                <tr>
                                      <td>{{ $key }}</td>
                                      <td colspan="2">{{$item2}}</td>
                                </tr>
                                @endforeach
                                @endforeach
                                      <tr>
                              
                                      <td colspan="3">الفترة</td>
                                </tr>
                                  @foreach($period_array as $key => $item)
                            @foreach($item as $key => $item2)
                                <tr>
                                      <td>{{ $key }}</td>
                                      <td colspan="2">{{$item2}}</td>
                                </tr>
                                @endforeach
                                @endforeach
                        </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
        
            </div>
        </div>

        <div class="pagebreak"></div>
        
@endsection

@section('css')
    <style>
                
            body{margin: 0;}
            .wrapper{
                margin: auto;
                position: relative;
              
               width: 1140px;
                height: 1612px;
            }
            .bg-print{
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
            }
            .content-wrapper{
                margin-left: 0!important;
            }
            section.content{
                margin-right: 90px;
            }
            .pagebreak { page-break-before: always; }
            #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align:center;
}

#customers tr:nth-child(even){background-color: #f2f2f2; text-align:center;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  
  background-color: #04AA6D;
  color: white;
}
    </style>
    
@endsection