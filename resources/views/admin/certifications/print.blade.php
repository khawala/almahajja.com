@extends('admin.print')

@section('title')
{{ $item->student->id }}-{{ $item->student->name }}
@endsection

@section('content')

@php
$markes = App\Registration::TotalMarks($item->id, $item->level);
$total=0;

$count=count($markes);
foreach($markes as $marke){
$total+=$marke->total;
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
    {{-- حلقة‎ --}}
    <img src="/img/certificate.jpg" alt="">

    <p style="color:#19585f;top: 310px;">مَن كَانَ لِلهِ العَظِيمَ طَرِيقهُ .. كَانَ الكِفَاحُ بِعُمرِهِ مَشكُورًا .. نَالَ المَكارِمَ بَعْدَ طـُول جِهَادِهِ .. نَالَ المَبَاهِجَ ضَاحِكـًا مَسْرُورًا

</p>
</hr>
<p style="color:#000000;top: 340px;">
يسر مؤسسة وقف المحجة البيضاء لتحفيظ القرآن الكريم والسنة النبوية عن بعد بالتعاون مع معهد الشيماء للدراسات القرآنية
أن تتقدم بتهنئة الطالبة:
<span>
  {{ $item->student->name }}  
</span>
</br>
بحلقة 
<span>
  {{ $item->classroom->name  }}  
</span>
على إجتهادها وحرصها.
<br>
لاجتيازها
<span>
  {{ $item->classroom->department->certificate_type  }}  
</span>
</br>
حيث حصلت على درجة: 
<span>
  {{ $total }}  %
</span>
, بتقدير 
 @if ($total >= 90)
    <span>ممتاز</span>
    @elseif ($total >= 80)
    <span>جيد جدا</span>
    @elseif ($total >= 70)
    <span>جيد</span>
    @else
    <span>مقبول</span>
    @endif
على يد المعلمة 
<span>
   {{ $item->classroom->teacher->name }} 
</span>
</br>

وتمنحها هذه الشهادة سائلين الله تعالى لها العلم النافع والعمل الصالح
</p>

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
        line-height: 2.4;
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