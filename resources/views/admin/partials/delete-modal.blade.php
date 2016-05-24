<div class="modal fade" id="deleteModalBox">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirm {{ isset($deleteText) ? $deleteText : 'Delete' }} ? </h4>
            </div>
            <div class="modal-body">
                <div class="inner-xs text-center">
                    {{ isset($info) ? $info : 'Are you sure ?' }} ?
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::open(['url'=> '/', 'method'=>'delete', 'id'=>'deleteModal']) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger" >{{ isset($deleteText) ? $deleteText : 'Delete' }}</button>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="deleteModalBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirm {{ isset($deleteText) ? $deleteText : 'Delete' }} ? </h4>
            </div>
            <div class="modal-body">
                <div class="inner-xs text-center">
                    {{ isset($info) ? $info : 'Are you sure ?' }} ?
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::open(['url'=> '/', 'method'=>'delete', 'id'=>'deleteModal']) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger" >{{ isset($deleteText) ? $deleteText : 'Delete' }}</button>
                {!! Form::close() !!}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

