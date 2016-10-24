<div class="panel panel-default">
    <div class="panel-heading">
        <h1>
            Attached Users
        </h1>
    </div>
</div>
<div class="panel-body">
    <table class="table table-user-information">
        <tbody>
        <tr>
            <th>Name</th>
            <th>Delete</th>
        </tr>
        @foreach($model->services as $service)
            <tr>
                <td>{{ $service->user ? $service->user->name : 'User Not Found' }}</td>
                <td>
                    {!! Form::open(['action' => ['Admin\UserController@detachService'], 'method' => 'post'], ['class'=>'']) !!}
                    {!! Form::hidden('model_type',$modelType) !!}
                    {!! Form::hidden('model_id',$model->id) !!}
                    {!! Form::hidden('user_id',$service->user ? $service->user->id : null) !!}
                    <button type="submit" class="" style="">X</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>