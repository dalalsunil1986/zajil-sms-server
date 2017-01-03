@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <a href="{{action('Admin\BuffetController@index')}}">Buffets</a>
            <i class="fa fa-angle-right"></i>
            <span>{{ $buffet->name }}</span>
        </h2>
    </div>
@endsection

@section('left')
    @include('admin.module.buffet.sidebar',['active' =>'buffet', 'record'=>$buffet])
    <hr>
    {!! Form::model($buffet,['action' => ['Admin\BuffetController@update',$buffet->id], 'method' => 'patch'], ['class'=>'']) !!}
    <h1>Edit Buffet </h1>
    @include('admin.module.buffet.add-edit')
    {!! Form::close() !!}
    <hr>
    @include('admin.module.service.attach',['model'=>$buffet,'users'=>$users,'modelType'=>$modelType])
@endsection

@section('right')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>
                {{ $buffet->name }}
            </h1>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-user-information">
            <tbody>
            <tr>
                <th>Description</th>
                <td>{{ $buffet->description }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $buffet->address }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="panel-footer ">
        <a data-toggle="tooltip" href="{{ action('Admin\BuffetController@edit',$buffet->id) }}" data-original-title="Edit Company" type="button" class="btn btn-sm btn-warning"><i class="fa fa-2x fa-edit"></i></a>
        <a href="#" data-link="{{ action('Admin\BuffetController@destroy',$buffet->id) }}" data-target="#deleteModalBox" data-original-title="Delete Company" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-2x fa-remove"></i></a>
    </div>
    @include('admin.partials.delete-modal',['info' => 'This will delete company and related records (employees,services) etc .'])
    <hr>
    @include('admin.module.service.users',['model'=>$buffet,'modelType'=>$modelType])

@endsection
