<div>
    <div class="form-group" style="padding-top: 20px">
        <label for="name">Name</label>
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) !!}
    </div>
    <div class="form-group" >
        <label for="price">Email</label>
        {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) !!}
    </div>
    <div class="form-group" style="padding-top: 20px">
        <label for="name">Password</label>
        {!! Form::password('password',null,['class'=>'form-control','placeholder'=>'Password']) !!}
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success" style="width: 100%">Save</button>
        {!! Form::close() !!}
    </div>
</div>