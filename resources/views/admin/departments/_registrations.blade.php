
<div class="box box-info">
    <div class="box-body table-responsive no-padding">
    
        <table class="table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>رقم التسجيل</th>
                    <th>الطالبة</th>
                    <th>المسار</th>
                    <th>شريحة الجوال</th>
                    <th>وقت التسميع</th>
                    <th>تاريخ التسجيل</th>
                    <th>المدفوع</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>رقم التسجيل</th>
                    <th>الطالبة</th>
                    <th>المسار</th>
                    <th>شريحة الجوال</th>
                    <th>وقت التسميع</th>
                    <th>تاريخ التسجيل</th>
                    <th>المدفوع</th>
                </tr>
            </tfoot>
            
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td><a href="{{ route(ADMIN . '.registrations.edit', $item->id) }}">{{ $item->id }}</a></td>
                        <td><a href="{{ route(ADMIN . '.registrations.edit', $item->id) }}">{{ $item->student->name }}</a></td>
                        <td>{{ $item->section->name }}</td>
                        <td>{{ $item->telecom->name }}</td>
                        <td>{{ $item->period->name}}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->paid }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>