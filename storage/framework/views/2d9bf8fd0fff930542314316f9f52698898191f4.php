<?php $__env->startSection('title'); ?>
<?php echo e($item->student->id); ?>-<?php echo e($item->student->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php
$total = App\Registration::TotalMarks($item->id, $item->level);
?>

<?php if($item->section->division->type == 1): ?>
<div class="print-certif">
    
    <img src="/img/certifications.jpg" alt="">
    <p class="name"><?php echo e($item->student->name); ?></p>
    
    <p class="supervisor"><?php echo e($item->section->supervisor->name); ?></p>
    
    <p class="hours"><?php echo e($item->section->CountHours); ?></p>
    <p class="totalmarks"><?php echo e($total[0]->Marks); ?></p>
    <p class="totalmarks"><?php echo e($total[0]->Marks); ?></p>
</div>
<?php else: ?>
<div class="print-certif-phone">
    
    <img src="/img/certification-phone.png" alt="">
    <p class="name"><?php echo e($item->student->name); ?></p>
    
    
    <p class="classroom"><?php echo e($item->classroom->name); ?></p>
    <p class="teacher"><?php echo e($item->classroom->teacher->name); ?></p>
    <p class="totalmarks"><?php echo e($total[0]->Marks); ?></p>

    <?php if($total[0]->Marks >= 90): ?>
    <p class="marks_name">ممتاز</p>
    <?php elseif($total[0]->Marks >= 80): ?>
    <p class="marks_name">جيد جدا</p>
    <?php elseif($total[0]->Marks >= 70): ?>
    <p class="marks_name">جيد</p>
    <?php else: ?>
    <p class="marks_name">مقبول</p>
    <?php endif; ?>

</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style>
    @import  url('https://fonts.googleapis.com/css2?family=Tajawal&display=swap');

    @media  print {
        @page  {
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.print', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>