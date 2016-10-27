<div>
    <div class="form-group" style="padding-top: 20px">
        <label for="name">Location Name</label>
        {!! Form::text('location',null,['class'=>'form-control','placeholder'=>'Location Name']) !!}
    </div>
    <div class="form-group" >
        <label for="price">Price</label>
        {!! Form::text('price',null,['class'=>'form-control','placeholder'=>'Price']) !!}
    </div>
    <div class="form-group" >
        <label for="recepient_count">Recepient Count</label>
        {!! Form::text('recepient_count',null,['class'=>'form-control','placeholder'=>'Recepient Count']) !!}
    </div>
    <div class="form-group">
        <label for="price">Active</label>
        {!! Form::select('active',['0'=>'No','1'=>'Yes'],null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success" style="width: 100%">Save</button>
        {!! Form::close() !!}
    </div>
</div>