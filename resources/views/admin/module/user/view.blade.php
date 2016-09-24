@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <a href="{{action('Admin\HallController@index')}}">Halls</a>
            <i class="fa fa-angle-right"></i>
            <span>{{ $user->name }}</span>
        </h2>
    </div>
@endsection

@section('left')
    <hr>
    {!! Form::model($user,['action' => ['Admin\UserController@update',$user->id], 'method' => 'patch'], ['class'=>'']) !!}
    <h1>Edit Buffet </h1>
    @include('admin.module.hall.add-edit')
    {!! Form::close() !!}
@endsection

@section('right')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>
                {{ $user->name }}
            </h1>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-user-information">
            <tbody>
            <tr>
                <th>Description</th>
                <td>{{ $user->description }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $user->address }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="panel-footer ">
        <a data-toggle="tooltip" href="{{ action('Admin\UserController@edit',$user->id) }}" data-original-title="Edit Company" type="button" class="btn btn-sm btn-warning"><i class="fa fa-2x fa-edit"></i></a>
        <a href="#" data-link="{{ action('Admin\UserController@destroy',$user->id) }}" data-target="#deleteModalBox" data-original-title="Delete Company" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-2x fa-remove"></i></a>
    </div>
    @include('admin.partials.delete-modal',['info' => 'This will delete company and related records (employees,services) etc .'])

@endsection
