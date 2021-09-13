
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
                @foreach ($registrationsBySection as $item)
                    <tr>
                        <td>{{ $item->section->name }}</td>
                        <td>{{ $item->count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
