{!! Form::model($model,['action' => ['Admin\UserController@attachService'], 'method' => 'post'], ['class'=>'']) !!}
<h1> Attach {{ ucfirst($modelType) }}</h1>
{!! Form::hidden('model_id',$model->id) !!}
{!! Form::hidden('model_type',$modelType) !!}
<div class="form-group">
    {!! Form::select('user_id',$users,null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success" style="width: 100%; padding-top: 10px">{{ trans('word.save') }}</button>
</div>
{!! Form::close() !!}