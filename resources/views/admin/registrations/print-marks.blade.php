@extends('admin.print')

@section('title')
{{ $registration->student->id }}-{{ $registration->student->name }}
@endsection

@section('content')

@php
$markes = App\Registration::TotalMarks($registration->id, $registration->level);
$total=0;
$s1m1="-";
$s1m2="-";
$s1m3="-";
$s2m1="-";
$s2m2="-";
$s2m3="-";
$count=count($markes);
foreach($markes as $marke){
$total+=$marke->total;
if($marke->month==1&&$marke->semester==1)
{
$s1m1=$marke->total;
}
if($marke->month==2&&$marke->semester==1)
{
$s1m2=$marke->total;
}
if($marke->month==3&&$marke->semester==1)
{
$s1m3=$marke->total;
}
if($marke->month==1&&$marke->semester==2)
{
$s2m1=$marke->total;
}
if($marke->month==2&&$marke->semester==2)
{
$s2m2=$marke->total;
}
if($marke->month==3&&$marke->semester==2)
{
$s2m3=$marke->total;
}
}
if($count!=0)
{
$total=$total/$count;

}
@endphp


@if($count!=0)
@if($total<=60)
<? echo 'لم تجتز درجة النجاح وليس لها شهادة';?>
@else
<div class="print-certif-phone">
    <?php $setting=App\Setting::find(3);?>
    <img src="{{$setting->file}}" alt="">

<p style="color:#000000;top: 340px;">
ها نحنُ نمضي على جسر من نور العلم , نحملُ شعاعَ الأمل للمستقبل , كشموسُ تنيرُ ظلامَ الجهل, فهنيئاً لكِ الرقي والارتقاء
<br>
بحمد الله وتوفيقه أتمت الطالبة:
<span>
  {{ $registration->student->name }}  
</span>
 {{ $registration->classroom->department->certificate_type  }}  :
<span>
        @if($registration->classroom->department->separate_section==1)
         من {{$markes[0]->separate_section_from}} الى {{$markes[0]->separate_section_to}}
                            @else
  {{ $registration->level->name  }} 
     @endif
</span>
<br>
على يد المعلمة:
<span>
   {{ $registration->classroom->teacher->name }} 
</span>
وذلك عـــــ <span>
   {{ round(($registration->created_at->year - 622) * (33 / 32)) }}    هــ
</span>
ــــام وكان ثمار حصادها كالتالي
</br>
</p>
<div style="    top: 460px;
    text-align: center;
     justify-content: center;
    align-items: center;
        width: 100%;
    position: absolute;">
                    <table class="table " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                 <th colspan="3">الفصل الأول</th>
                                <th colspan="3">الفصل الثاني</th>
                               
                               
                                <th rowspan="2" colspan="1" >معدل</th>
                                 <th rowspan="2" colspan="1" >تقدير</th>
                           
                            </tr>
                  
    
                            <tr>
                                      <th>الشهر الأول</th>
                                   
                                    <th>الشهر الثاني</th>
                               <th>الشهر الثالث</th>
                                      <th>الشهر الأول</th>
                                   
                                    <th>الشهر الثاني</th>
                               <th>الشهر الثالث</th>
                               
                                </tr>
                                       <tr>
                                      <th> {{$s1m1}}</th>
                                   
                                    <th> {{$s1m2}}</th>
                               <th> {{$s1m3}}</th>
                                               <th> {{$s2m1}}</th>
                                   
                                    <th> {{$s2m2}}</th>
                               <th> {{$s2m3}}</th>
                                    <th>   {{ number_format($total, 2) }}  %</th>
                               <th> @if ($total >= 90)
    <span>ممتاز</span>
    @elseif ($total >= 80)
    <span>جيد جدا</span>
    @elseif ($total >= 70)
    <span>جيد</span>
    @else
    <span>مقبول</span>
    @endif</th>
                               
                                </tr>
                          
                             </thead>
                    </table>
                    <p>
اسأل الله أن يكون القرآن لكِ نوراً وسراجاً وتاجاً تلبسينه والديك وأسأل الله لكِ التوفيق والسداد
</p>
          </div>   
                  



@endif
@else
<?php echo'لا يوجد درجات تم رصدها'; ?>
@endif

@endsection

@section('css')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal&display=swap');

    @media print {
        @page {
            size: landscape;
            /* margin: 30px !important; */
        }
    }
p{
    width:950px;
    right:100px;
    text-align:center;
        line-height: 1.7;
}
th{
    
}
table{
   width:fit-content !important;
    margin: 0 auto;
       text-align: center !important;
     align-self: center;
     margin-bottom: 5px !important;
}
table, th, th {
      vertical-align: middle !important;
            border: 1px solid black !important;
            text-align: center !important;
        
         }
span{
    color:#19585f;
}
    .print-certif-phone .name {
        top: 424px;
        right: 695px;
    }

    .print-certif-phone .note {
        top: 524px;
        right: 666px;
    }

    .print-certif-phone .batch {
        top: 490px;
        right: 600px;
    }

    .print-certif-phone .classroom {
        top: 457px;
        right: 459px;
    }

    .print-certif-phone .teacher {
        top: 558px;
        right: 866px;
    }

    .print-certif-phone .totalmarks {
        top: 556px;
        right: 533px;
    }

    .print-certif-phone .marks_name {
        top: 556px;
        right: 655px;
    }

    .print-certif,
    .print-certif-phone {
        -webkit-print-color-adjust: exact;
        width: 1140px;
        height: 566px;
        margin: auto;
        position: relative;
        font-size: 18px;
        font-family: 'Tajawal', sans-serif;
        line-height: 1.5;

    }

    .print-certif p,
    .print-certif-phone p {
        position: absolute;
        font-weight: bold;
        margin: 0;
    }

    .print-certif-phone p.intro {
        top: 200px;
        width: 760px;
        margin: 20px;
        text-align: center;
        line-height: 2;
        font-size: 14px;
    }

    .print-certif p.name {
        top: 225px;
        right: 380px;
    }

    .print-certif p.note {
        top: 255px;
        text-align: center;
        right: 540px;
    }

    .print-certif p.supervisor {
        top: 325px;
        right: 330px;
    }

    .print-certif p.batch {
        top: 355px;
        right: 380px;
    }

    .print-certif p.hours {
        top: 454px;
        right: 490px;
    }

    .print-certif p.totalmarks {
        top: 355px;
        right: 566px;
    }
</style>
@endsection