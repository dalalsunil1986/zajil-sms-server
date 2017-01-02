@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Messages</span>
        </h2>
    </div>
@endsection

@section('left')
    {!! Form::open(['action' => ['Admin\MessageController@store'], 'method' => 'post'], ['class'=>'']) !!}
    <h1>Add Message Location</h1>
    @include('admin.module.message.add-edit')
    {!! Form::close() !!}
@endsection

@section('right')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Messages</h1>
        </div>
    </div>
    <div class="panel-body" style="padding: 0;">
        <table class="table table-striped table-bordered table-hover" >
            <thead class="bg-blue">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Character Count</th>
                <th>Recepient Count</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($messages as $message)
                <tr class="gradeU">
                    <td><span class="title"><a href="{{action('Admin\MessageController@show',$message->id)}}">{{ $message->location }}</a></span></td>
                    <td><span class="title">{{ $message->price }}</span></td>
                    <td><span class="title">{{ $message->characters_count }}</span></td>
                    <td><span class="title">{{ $message->recepient_count }}</span></td>
                    <td class="f18">
                        <a href="#" class="red" data-toggle="modal" data-target="#deleteModalBox"
                           data-link="{{action('Admin\MessageController@destroy',[$message->id])}}">
                            <i class="fa fa-close "></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.partials.delete-modal',['info' => 'Remove Service'])
    </div>

@endsection
