
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">المسجلات حسب الحلقات</h3>
    </div>
    <div class="box-body">
        <table class="table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>اسم الحلقات</th>
                    <th>المسجلات</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>اسم الحلقات</th>
                    <th>المسجلات</th>
                </tr>
            </tfoot>
            
            <tbody>
                @foreach ($registrationsByClassroom as $item)
                    <tr>
                        <td>{{ $item->classroom->name }}</td>
                        <td>{{ $item->count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
