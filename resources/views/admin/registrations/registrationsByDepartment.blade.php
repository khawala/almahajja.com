        <div class="col-sm-6">
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">المسجلات حسب المسارات</h3>
    </div>
    <div class="box-body">
        <table class="table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>اسم المسار</th>
                    <th>المسجلات</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>اسم المسار</th>
                    <th>المسجلات</th>
                </tr>
            </tfoot>
            
            <tbody>
                @foreach ($registrationsByDepartment as $item)
                    <tr>
                        <td>{{ $item->department->name }}</td>
                        <td>{{ $item->count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
        <div class="col-sm-6">
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">احصائيات عامة</h3>
    </div>
    <div class="box-body">
        <table class="table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>الاسم </th>
                    <th>العدد</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>الاسم </th>
                    <th>العدد</th>
                </tr>
            </tfoot>
            
            <tbody>
             
                    <tr>
                        <td>عدد الاقسام</td>
                        <td>{{\App\Department::count()}}</td>
                    </tr>
                     <tr>
                        <td>عدد الحلقات</td>
                        <td>{{\App\Classroom::count()}}</td>
                    </tr>
               <tr>
                        <td>عدد المسارات</td>
                        <td>{{\App\Section::count()}}</td>
                    </tr>
                     <tr>
                        <td>عدد المستويات</td>
                        <td>{{\App\Level::count()}}</td>
                    </tr>
                     <tr>
                        <td>عدد الإداريات</td>
                        <td>{{\App\User::where('role','20')->count()}}</td>
                    </tr>
                     <tr>
                        <td>عدد المشرفات</td>
                        <td>{{\App\User::where('role','10')->count()}}</td>
                    </tr>
                     <tr>
                        <td>عدد المعلمات</td>
                        <td>{{\App\User::where('role','5')->count()}}</td>
                    </tr>
                     <tr>
                        <td>عدد الطالباات</td>
                        <td>{{\App\User::where('role','0')->count()}}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
</div>





