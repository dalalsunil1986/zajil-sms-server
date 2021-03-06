<div>
    <div class="form-group" style="padding-top: 20px">
        <label for="name">{{ trans('word.name') }}</label>
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) !!}
    </div>
    <div class="form-group" >
        <label for="price">{{ trans('word.price') }}</label>
        {!! Form::text('price',null,['class'=>'form-control','placeholder'=>'Price']) !!}
    </div>
    <div class="form-group" >
        <label for="price">Description</label>
        {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Description','rows'=>3]) !!}
    </div>
    <div class="form-group">
        <label for="price">Active</label>
        {!! Form::select('active',['0'=>'No','1'=>'Yes'],null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success" style="width: 100%">{{ trans('word.save') }}</button>
        {!! Form::close() !!}
    </div>
</div>