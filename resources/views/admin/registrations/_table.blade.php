
<table class="table" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>رقم التسجيل</th>
            <th>الطالبة</th>
            <th>القسم</th>

            <th>المسار</th>
            <th>شريحة الجوال</th>
            <th>وقت التسميع</th>
            <th>تاريخ التسجيل</th>
            <th>المدفوع</th>
            <th>المستوى</th>
            <th>الحلقة</th>
            <th>الحالة</th>
            <th class="actions">اجراءات</th>
        </tr>
    </thead>
    
    <tfoot>
        <tr>
            <th>رقم التسجيل</th>
            <th>الطالبة</th>
            <th>القسم</th>
            <th>المسار</th>
            <th>شريحة الجوال</th>
            <th>وقت التسميع</th>
            <th>تاريخ التسجيل</th>
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
                <td>{{ $item->paid }}</td>
                <td width="170">
                    {!! Form::model($item, [
                        'url'  => route(ADMIN . '.registrations.update', $item->id), 
                        'method' => 'PUT',
                        ]) 
                    !!}
                        {!! Form::mySelect('level_id', '', ['' => ''] + App\Level::pluck('name', 'id')->toArray(), null, ['class' => 'form-control onchange', 'width' => 300]) !!}
                    {!! Form::close() !!}
                </td>
                <td width="130">
                    {!! Form::model($item, [
                        'url'  => route(ADMIN . '.registrations.update', $item->id), 
                        'method' => 'PUT',
                        ]) 
                    !!}
                        {!! Form::mySelect('classroom_id', '', ['' => ''] + App\Classroom::where('department_id','=',$item->department->id)->pluck('name', 'id')->toArray(), null, ['class' => 'chosen-rtl form-control onchange', 'width' => 200]) !!}

                    {!! Form::close() !!}
                </td>
                <td width="150">
                    {!! Form::model($item, [
                        'url'  => route(ADMIN . '.registrations.update', $item->id), 
                        'method' => 'PUT',
                        ]) 
                    !!}
                        {!! Form::mySelect('status', '', config('variables.registrations_status'), null, ['class' => 'form-control onchange', 'width' => 200]) !!}
                    {!! Form::close() !!}
                </td>
                <td class="actions">
                    <ul class="list-inline">
                        <li><a href="{{ route(ADMIN . '.registrations.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                        <li>
                            {!! Form::open([
                                'class'=>'delete',
                                'url'  => route(ADMIN . '.registrations.destroy', $item->id), 
                                'method' => 'DELETE',
                                ]) 
                            !!}

                                <button class="btn btn-danger btn-xs" title="{{ trans('app.delete_title') }}"><i class="fa fa-trash"></i></button>
                                
                            {!! Form::close() !!}
                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>