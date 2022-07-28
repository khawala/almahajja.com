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
                  <img src="{{ $logo->file }}" alt="معهد ">
                </div>
                <div id="company">
                    <h2 class="name">
                        {{ $instituteName }}
                    </h2>
                    <small class="En">الرقم الضريبي: {{ $commercial_register }}</small>
             
                    <small class="En">رقم الجوال: {{ $institute->mobile }}</small>
                    <small><a href="mailto:{{ $institute->email }}" class="En"> البريد الإلكتروني: {{ $institute->email }}</a></small>
                </div>
            </header>
            <main class="invoice">
        <div class="wrapper">
<h1>من {{ $start_date }}إلى  {{$end_date }}</h1>
            <a href="{{ request()->fullUrl() }}&print=1" target="_blank" class="btn btn-success no-print pull-left"><i class="fa fa-print"></i></a>
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
                      @foreach($items as $item)
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
                                      <td> {{$item->id}}</td>
                                               <td> @if($item->student){{$item->student->name}} @endif</td>   
                               
                                        <td> {{$item->created_at->format('Y-m-d')}}</td>   
                                        <td> @if($item->department) {{$item->department->name}} @endif</td>   
                                        <td> {{$item->PaymentTypeName}}</td>  
                                        <td><?php echo $taxamount ?></td> 
                                        <td><?php echo $price ?></td>   
                                 <td><?php echo $total ?></td>   
                               
                                </tr>
                                @endforeach 
                        </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
        
            </div>
        </div>
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
