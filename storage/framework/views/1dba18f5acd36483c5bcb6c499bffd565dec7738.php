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
    background: #7f999a;
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
                   <?php if($registration): ?>
                    <small class="En">
                        تاريخ الفاتورة: <?php echo e($registration->created_at); ?></small>
                  <?php endif; ?>
                    <small class="En">رقم الجوال: <?php echo e($institute->mobile); ?></small>
                    <small><a href="mailto:<?php echo e($institute->email); ?>" class="En"> البريد الإلكتروني: <?php echo e($institute->email); ?></a></small>
                </div>
            </header>
            <main class="invoice">
                <p class="title_invoice">
                  سند قبض
                </p>
                <div id="details" class="clearfix">
                    <div id="client">
                        <div class="to">
                          فاتورة إلى

                          :
                      <?php echo e($trainee->name); ?>

                        </div>
                      
                        <div class="address">
                          <b>
                            الرقم التدريبي
                          :
                              <?php echo e($trainee->id); ?>

                          </b>
                          
                        </div>
                        
                        <div class="address">
                          <b>
                            الجوال
                        :
                        <?php echo e($trainee->mobile1); ?>

                          </b>
                         
                        </div>
                        <div class="email">
                            <b>
                              
                             البريد الإلكتروني
                            :
                            <?php echo e($trainee->email); ?>

                            </b>
                           
                        </div>
                    </div>
                    <div id="invoice">
                        <div class="to">
                         بيانات الدورة التدريبية :
                      <?php echo e($department->name); ?>

                      
                        </div>
                     
                         
                  
                        
                        <div class="date">
                          <b>
              
                                        السعر شامل الضريبة :
                        <?php echo e($department->price); ?>

                            ريال سعودي
                       
                                                   
                          </b>
                          
                        </div>
                      
                   <div class="date">
                          <b>
                            تاريخ البداية
                            :
                               <?php echo e($department->start_date); ?>

                          </b>
                       
                        </div>
                                
                        

                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                         
                            <th class="th_desc">عنوان</th>
                            <th class="th_desc">الوسيلة </th>
                                <th class="th_unit">  المبلغ  المدفوع</th>
                        
                            <th class="th_unit">  الضريبة <?php echo e($tax); ?> %</th>
                                                     
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                         
                            <td class="desc">
                                <h3>
                                  <?php echo e($department->name); ?>

                                </h3>

                            </td>

                            <td class="desc ">
                               <?php echo e($registration->PaymentTypeName); ?>

                            </td>
                         
                        
         <td class="unit En">
                                
                              <?php    echo $total-$taxamount?>
                              SR
                            </td>
                                  
                            <td class="unit En">
                                
                              <?php   echo $taxamount?>
                              SR
                            </td>
                          
                        </tr>
                
                    </tbody>
                </table>
                    <div>
                                        الاجمالي :<?php echo e($total); ?>

                                        SR
                                                              <?php if($registration->paid!=0 && $registration->paid!=null): ?>
                                                              <br>
                                                              الباقي: <?php echo e($department->price-$registration->paid); ?>

                                                              SR
                                                              <?php endif; ?>
                            </div>
                             
             
                 <?php if($department->price!=0): ?>
                 
        <img src="<?php echo e($displayQRCodeAsBase64); ?>" alt="QR Code" />
    <?php endif; ?>
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
