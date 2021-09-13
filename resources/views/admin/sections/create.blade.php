<button type="button" class="btn btn-success" data-toggle="modal" data-target="#sectionModal">
    إضافة مسار
</button>


<!-- Modal -->
<div class="modal fade" id="sectionModal" tabindex="-1" role="dialog" aria-labelledby="sectionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open([
                'action' => ['SectionController@store'],
                'files' => true
            ]) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sectionModalLabel"> مسار جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('admin.sections.form', ['division_id' => $item->id])
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">حفظ</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

