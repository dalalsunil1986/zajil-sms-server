<div>
    <div class="form-group">
        <span class="btn btn-default fileinput-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Select Thumbnail Image...</span>
            <!-- The file input field used as target for the file upload widget -->
            <input id="cover" type="file" name="cover" class="cover form-control">
        </span>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success" style="width: 100%">Save</button>
        {!! Form::close() !!}
    </div>
</div>