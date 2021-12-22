<?php $__env->startSection('title'); ?>
<?php echo e($item->student->id); ?>-<?php echo e($item->student->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php
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
?>


<?php if($count!=0): ?>
<?php if($total<=60): ?>
<? echo 'لم تجتز درجة النجاح وليس لها شهادة';?>
<?php else: ?>
<div class="print-certif-phone">
    <?php $setting=App\Setting::find(1);?>
    <img src="<?php echo e($setting->file); ?>" alt="">

    <p style="color:#19585f;top: 310px;">مَن كَانَ لِلهِ العَظِيمَ طَرِيقهُ .. كَانَ الكِفَاحُ بِعُمرِهِ مَشكُورًا .. نَالَ المَكارِمَ بَعْدَ طـُول جِهَادِهِ .. نَالَ المَبَاهِجَ ضَاحِكـًا مَسْرُورًا

</p>
</hr>
<p style="color:#000000;top: 340px;">
يسر مؤسسة وقف المحجة البيضاء لتحفيظ القرآن الكريم والسنة النبوية عن بعد بالتعاون مع معهد الشيماء للدراسات القرآنية
أن تتقدم بتهنئة الطالبة:
<span>
  <?php echo e($item->student->name); ?>  
</span>
</br>
بحلقة 
<span>
  <?php echo e($item->classroom->name); ?>  
</span>
على إجتهادها وحرصها.
<br>
لعام: <span>
  <?php echo e(round(($item->created_at->year - 622) * (33 / 32))); ?>  
</span>
</br>
لاجتيازها
<span>
  <?php echo e($item->classroom->department->certificate_type); ?>  
</span>
</br>
حيث حصلت على درجة: 
<span>
  <?php echo e(number_format($total, 2)); ?>  %
</span>
, بتقدير 
 <?php if($total >= 90): ?>
    <span>ممتاز</span>
    <?php elseif($total >= 80): ?>
    <span>جيد جدا</span>
    <?php elseif($total >= 70): ?>
    <span>جيد</span>
    <?php else: ?>
    <span>مقبول</span>
    <?php endif; ?>
على يد المعلمة 
<span>
   <?php echo e($item->classroom->teacher->name); ?> 
</span>
</br>

وتمنحها هذه الشهادة سائلين الله تعالى لها العلم النافع والعمل الصالح
</p>

<?php endif; ?>
<?php else: ?>
<?php echo'لا يوجد درجات تم رصدها'; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.print', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>