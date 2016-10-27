@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <a href="{{action('Admin\GuestServiceController@index')}}">{{trans('words.guestservices')}}</a>
            <i class="fa fa-angle-right"></i>
            <span>{{ $guestservice->name }}</span>
        </h2>
    </div>
@endsection

@section('left')
    <hr>
    {!! Form::model($guestservice,['action' => ['Admin\GuestServiceController@update',$guestservice->id], 'method' => 'patch'], ['class'=>'']) !!}
    <h1>{{ trans('word.edit') . ' ' . $guestservice->name }}</h1>
    @include('admin.module.guestservice.add-edit')
    {!! Form::close() !!}
    <hr>
    @include('admin.module.service.attach',['model'=>$guestservice,'users'=>$users,'model_type'=>$modelType])
@endsection

@section('right')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>
                {{ $guestservice->name }}
            </h1>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-user-information">
            <tbody>
            <tr>
                <th>Price</th>
                <td>{{ $guestservice->price }}</td>
            </tr>
            <tr>
                <th>Active</th>
                <td>{{ $guestservice->active ? 'true' : 'false'}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="panel-footer ">
        <a data-toggle="tooltip" href="{{ action('Admin\GuestServiceController@edit',$guestservice->id) }}" data-original-title="Edit Company" type="button" class="btn btn-sm btn-warning"><i class="fa fa-2x fa-edit"></i></a>
        <a href="#" data-link="{{ action('Admin\GuestServiceController@destroy',$guestservice->id) }}" data-target="#deleteModalBox" data-original-title="Delete Company" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-2x fa-remove"></i></a>
    </div>
    @include('admin.partials.delete-modal',['info' => 'This will delete company and related records (employees,services) etc .'])
    <hr>
    @include('admin.module.service.users',['model'=>$guestservice,'modelType'=>$modelType])

@endsection
