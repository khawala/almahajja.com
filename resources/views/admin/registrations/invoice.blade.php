<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>الفاتورة</title>
        <link rel="icon" href="{{ asset('images/favicon.ico') }}">
        <link rel="stylesheet" href="{{ asset('css_new/Forms.css') }}" />
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
                  <img src="{{ $logo->file }}" alt="معهد ">
                </div>
                <div id="company">
                    <h2 class="name">
                        {{ $instituteName }}
                    </h2>
                    <small class="En">الرقم الضريبي: {{ $commercial_register }}</small>
                   @if($registration)
                    <small class="En">
                        تاريخ الفاتورة: {{$registration->created_at}}</small>
                  @endif
                    <small class="En">رقم الجوال: {{ $institute->mobile }}</small>
                    <small><a href="mailto:{{ $institute->email }}" class="En"> البريد الإلكتروني: {{ $institute->email }}</a></small>
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
                      {{ $trainee->name }}
                        </div>
                      
                        <div class="address">
                          <b>
                            الرقم التدريبي
                          :
                              {{ $trainee->id }}
                          </b>
                          
                        </div>
                        
                        <div class="address">
                          <b>
                            الجوال
                        :
                        {{ $trainee->mobile1  }}
                          </b>
                         
                        </div>
                        <div class="email">
                            <b>
                              
                             البريد الإلكتروني
                            :
                            {{ $trainee->email  }}
                            </b>
                           
                        </div>
                    </div>
                    <div id="invoice">
                        <div class="to">
                         بيانات الدورة التدريبية :
                      {{ $department->name }}
                      
                        </div>
                     
                         
                  
                        
                        <div class="date">
                          <b>
              
                                        السعر شامل الضريبة :
                        {{$department->price}}
                            ريال سعودي
                       
                                                   
                          </b>
                          
                        </div>
                      
                   <div class="date">
                          <b>
                            تاريخ البداية
                            :
                               {{ $department->start_date}}
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
                        
                            <th class="th_unit">  الضريبة {{$tax}} %</th>
                                                     
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                         
                            <td class="desc">
                                <h3>
                                  {{ $department->name }}
                                </h3>

                            </td>

                            <td class="desc ">
                               {{$registration->PaymentTypeName}}
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
                                        الاجمالي :{{$total}}
                                        SR
                                                              @if($registration->paid!=0 && $registration->paid!=null)
                                                              <br>
                                                              الباقي: {{$department->price-$registration->paid}}
                                                              SR
                                                              @endif
                            </div>
                             
             
                 @if($department->price!=0)
                 
        <img src="{{$displayQRCodeAsBase64}}" alt="QR Code" />
    @endif
            </main>
            <footer>
                {{ $instituteName }}
                |
                <b>
                
            الهاتف
                 :
                    {{ $institute->phone }}
              
                </b>

             
                <b>
                البريد الإلكتروني
                :
                 {{ $institute->email }}
                </b>
               
              <br> 
                <b>
                 العنوان
               :
                {{ $institute->address }}

                </b>
               
            </footer>
        </section>
    </body>
</html>
