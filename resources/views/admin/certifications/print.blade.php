@extends('admin.print')

@section('title')
{{ $item->student->id }}-{{ $item->student->name }}
@endsection

@section('content')

@php
$total = App\Registration::TotalMarks($item->id, $item->level);
@endphp

@if ($item->section->division->type == 1)
<div class="print-certif">
    {{-- دورة تدريبية‎ --}}
    <img src="/img/certifications.jpg" alt="">
    <p class="name">{{ $item->student->name }}</p>
    {{-- <p class="note">{{ $item->section->division->note }} </p> --}}
    <p class="supervisor">{{ $item->section->supervisor->name }}</p>
    {{-- <p class="batch">{{ $item->section->division->batch }}</p> --}}
    <p class="hours">{{ $item->section->CountHours }}</p>
    <p class="totalmarks">{{ $total[0]->Marks }}</p>
    <p class="totalmarks">{{ $total[0]->Marks }}</p>
</div>
@else
<div class="print-certif-phone">
    {{-- حلقة‎ --}}
    <img src="/img/certification-phone.png" alt="">
    <p class="name">{{ $item->student->name }}</p>
    {{-- <p class="note">{{ $item->section->division->note }} </p> --}}
    {{-- <p class="batch">{{ substr($item->section->division->batch, 0, 4) }}</p> --}}
    <p class="classroom">{{ $item->classroom->name }}</p>
    <p class="teacher">{{ $item->classroom->teacher->name }}</p>
    <p class="totalmarks">{{ $total[0]->Marks }}</p>

    @if ($total[0]->Marks >= 90)
    <p class="marks_name">ممتاز</p>
    @elseif ($total[0]->Marks >= 80)
    <p class="marks_name">جيد جدا</p>
    @elseif ($total[0]->Marks >= 70)
    <p class="marks_name">جيد</p>
    @else
    <p class="marks_name">مقبول</p>
    @endif

</div>
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