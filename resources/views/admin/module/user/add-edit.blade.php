<div>
    <div class="form-group" style="padding-top: 20px">
        <label for="name">Name</label>
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) !!}
    </div>

    <div class="form-group" style="padding-top: 20px">
        <label for="name">Password</label>
        {!! Form::password('password',null,['class'=>'form-control','placeholder'=>'Password']) !!}
    </div>
    <div class="form-group" style="padding-top: 20px">
        <label for="name">Password</label>
        {!! Form::password('password_confirmation',null,['class'=>'form-control','placeholder'=>'Confirm Password']) !!}
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