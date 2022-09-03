
<table class="table" id="dtDynamicVerticalScrollExample" cellspacing="0" width="auto">
    <thead>
        <tr>
            <th>رقم </th>
            <th>الطالبة</th>
            <th>القسم</th>

            <th>المسار</th>
            <th> الشريحة</th>
            <th>الوقت </th>
            <th>تاريخ التسجيل</th>
                     <th>طريقة الدفع</th>
           
            <th>المدفوع</th>
            <th>المستوى</th>
            <th>الحلقة</th>
         
            <th>الحالة</th>
            <th class="actions">اجراءات</th>
        </tr>
    </thead>
    
    <tfoot>
        <tr>
            <th>رقم </th>
            <th>الطالبة</th>
            <th>القسم</th>
            <th>المسار</th>
                <th> الشريحة</th>
            <th>الوقت </th>
            <th>تاريخ التسجيل</th>
                     <th>طريقة الدفع</th>
           
            <th>المدفوع</th>
            <th>المستوى</th>
            <th>الحلقة</th>
        <th>الحالة</th>
            <th class="actions">اجراءات</th>
        </tr>
    </tfoot>
    
    <tbody>
        @foreach ($items as $item)
            <tr>
                <td><a href="{{ route(ADMIN . '.registrations.edit', $item->id) }}">{{ $item->id }}</a></td>
                <td><a href="{{ route(ADMIN . '.registrations.edit', $item->id) }}">{{ $item->student->name }}</a></td>
                
                <td>{{ $item->department->name }}</td>
                <td>{{ $item->section->name }}</td>
                <td>{{ $item->telecom->name }}</td>
                <td>{{ $item->period->name}}</td>
                <td>{{ $item->created_at }}</td>
                     <td>{{ $item->PaymentTypeName }}</td>
                <td>{{ $item->paid }}</td>
        
                <td style="width:250 px;">
                            @if($item->department->separate_section!=1)
                    {!! Form::model($item, [
                        'url'  => route(ADMIN . '.registrations.update', $item->id), 
                        'method' => 'PUT',
                        ]) 
                    !!}
                        {!! Form::mySelect('level_id', '', ['' => ''] + $item->section->levels->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select onchange', 'width' =>'FIT-CONTENT']) !!}
                    {!! Form::close() !!}
                 @endif
                </td>
             
                <td width="130">
                    {!! Form::model($item, [
                        'url'  => route(ADMIN . '.registrations.update', $item->id), 
                        'method' => 'PUT',
                        ]) 
                    !!}
                        {!! Form::mySelect('classroom_id', '', ['' => ''] + App\Classroom::where([['department_id','=',$item->department->id],['section_id','=',$item->section->id]])->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select onchange', 'width' => 200]) !!}

                    {!! Form::close() !!}
                </td>
                <td width="150">
                    {!! Form::model($item, [
                        'url'  => route(ADMIN . '.registrations.update', $item->id), 
                        'method' => 'PUT',
                        ]) 
                    !!}
                        {!! Form::mySelect('status', '', config('variables.registrations_status'), null, ['class' => 'form-control select onchange', 'width' => 200]) !!}
                    {!! Form::close() !!}
                </td>
                  
                <td class="actions">
                    <ul class="list-inline">
                        <li><a href="{{ route(ADMIN . '.registrations.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                       @if($item->status!=0 && $item->department->price!=null && $item->department->price!=0)
        
                         <li><a href="{{ route(ADMIN . '.registrations.invoice', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-info btn-xs">الفاتورة</a></li>
                      @endif
                        <li>
                            {!! Form::open([
                                'class'=>'delete',
                                'url'  => route(ADMIN . '.registrations.destroy', $item->id), 
                                'method' => 'DELETE',
                                ]) 
                            !!}

                                <button class="btn btn-danger btn-xs" title="{{ trans('app.delete_title') }}">حذف</button>
                                
                            {!! Form::close() !!}
                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>