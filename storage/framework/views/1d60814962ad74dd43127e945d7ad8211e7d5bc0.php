<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>الفاتورة</title>
        <link rel="icon" href="<?php echo e(asset('images/favicon.ico')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css_new/Forms.css')); ?>" />
        <style>
            table th, table td {
    padding: 0px;
    text-align: center !important;
    vertical-align: middle !important;
            }
            table td h3 {

    font-size: 1em;

}
            img {
    display:block;
    margin:auto;
            }
            table .th_no, table .th_desc, table .th_unit {
    color: #FFFFFF;
 font-size: 1em;
    background: rgb(0, 71, 103);
}
section {
    
    height: auto;
}
   footer {
    position: relative;
   }
                #client ,#invoice {max-width: 50%;}
        </style>
    </head>
    <body>
        <section>
            <header class="clearfix">
                <div id="logo">
                  <img src="<?php echo e($logo->file); ?>" alt="معهد ">
                </div>
                <div id="company">
                    <h2 class="name">
                        <?php echo e($instituteName); ?>

                    </h2>
                    <small class="En">الرقم الضريبي: <?php echo e($commercial_register); ?></small>
             
                    <small class="En">رقم الجوال: <?php echo e($institute->mobile); ?></small>
                    <small><a href="mailto:<?php echo e($institute->email); ?>" class="En"> البريد الإلكتروني: <?php echo e($institute->email); ?></a></small>
                </div>
            </header>
            <main class="invoice">
        <div class="wrapper">
<h1>من <?php echo e($start_date); ?>إلى  <?php echo e($end_date); ?></h1>
            <a href="<?php echo e(request()->fullUrl()); ?>&print=1" target="_blank" class="btn btn-success no-print pull-left"><i class="fa fa-print"></i></a>
            <hr>
        
            <div class="row">
              <div class="col-xs-12">

                    <table class="table " id="customers" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                       <th> رقم الفاتورة</th>
                                 <th> اسم الطالب</th>
                                <th>التاريخ</th>
                                   <th>  القسم المشترك فيه </th>
                               
                                <th> طريقة الدفع</th>
                                <th>الضريبة</th>
                                       <th>    السعر شامل الضريبة </th>
                                  
                                   <th>  الرصيد</th>
                           
                            </tr>
                        </thead>
                     
                      
                     
                        <tbody>
                            <?php $total=0 ;
                                $tax1=App\Setting::where('id',6)->pluck('content')->first();
                                            $tax= '1.'.$tax1;
                                            ?>
                      <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                      $price=0;
                      if($item->paid!=0 && $item->paid!=null)
                                                              {
                                                                 $price=$item->paid;
                                                                 $total+= $price;
                                                              }
                                                              else
                                                              {
                                                                  if($item->department)
                                                                  {$price=$item->department->price;}
                                                                 
                                                            
                                                                 
                                                                 $total+= $price;  
                                                              }
                                                                $taxamount=$price-($price/(double)$tax);
        
               $taxamount= round($taxamount, 2);
                                                              
                                                        ?>
                                <tr>
                                      <td> <?php echo e($item->id); ?></td>
                                               <td> <?php if($item->student): ?><?php echo e($item->student->name); ?> <?php endif; ?></td>   
                               
                                        <td> <?php echo e($item->created_at->format('Y-m-d')); ?></td>   
                                        <td> <?php if($item->department): ?> <?php echo e($item->department->name); ?> <?php endif; ?></td>   
                                        <td> <?php echo e($item->PaymentTypeName); ?></td>  
                                        <td><?php echo $taxamount ?></td> 
                                        <td><?php echo $price ?></td>   
                                 <td><?php echo $total ?></td>   
                               
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
        
            </div>
        </div>
 </main>
            <footer>
                <?php echo e($instituteName); ?>

                |
                <b>
                
            الهاتف
                 :
                    <?php echo e($institute->phone); ?>

              
                </b>

             
                <b>
                البريد الإلكتروني
                :
                 <?php echo e($institute->email); ?>

                </b>
               
              <br> 
                <b>
                 العنوان
               :
                <?php echo e($institute->address); ?>


                </b>
               
            </footer>
        </section>
    </body>
</html>
