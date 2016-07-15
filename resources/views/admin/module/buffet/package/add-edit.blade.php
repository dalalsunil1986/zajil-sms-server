<div>
    {!! Form::hidden('buffet_id',$record->id) !!}
    <div class="form-group" style="padding-top: 20px">
        <label for="name">Package Description</label>
        {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Description']) !!}
    </div>

    <div class="form-group">
        <label for="companyAddress">Price</label>
        {!! Form::text('price',null,['class'=>'form-control','placeholder'=>'Price']) !!}
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success" style="width: 100%">Save</button>
    </div>
</div>
