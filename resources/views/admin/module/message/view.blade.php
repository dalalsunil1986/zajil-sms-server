@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <a href="{{action('Admin\MessageController@index')}}">Messages</a>
            <i class="fa fa-angle-right"></i>
            <span>{{ $message->location }}</span>
        </h2>
    </div>
@endsection

@section('left')

    {!! Form::model($message,['action' => ['Admin\MessageController@update',$message->id], 'method' => 'patch'], ['class'=>'']) !!}
    <h1>Edit Message </h1>
    @include('admin.module.message.add-edit')
    <hr>
    @include('admin.module.service.attach',['model'=>$message,'users'=>$users,'modelType'=>$modelType])
    {!! Form::close() !!}

@endsection

@section('right')
    <div class="panel-body">
        <table class="table table-user-information">
            <tbody>
            <tr>
                <th>Location</th>
                <td>{{ $message->location }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{ $message->price }}</td>
            </tr>
            <tr>
                <th>Recepient Count</th>
                <td>{{ $message->recepient_count }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="panel-footer ">
        <a href="#" data-link="{{ action('Admin\MessageController@destroy',$message->id) }}" data-target="#deleteModalBox" data-original-title="Delete Message" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-2x fa-remove"></i></a>
    </div>
    @include('admin.partials.delete-modal',['info' => 'Delete Message '])

    <hr>
    @include('admin.module.service.users',['model'=>$message])

@endsection
