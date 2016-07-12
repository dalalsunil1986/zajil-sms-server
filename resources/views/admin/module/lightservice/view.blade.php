@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <a href="{{action('Admin\LightServiceController@index')}}">{{trans('words.lightservices')}}</a>
            <i class="fa fa-angle-right"></i>
            <span>{{ $lightservice->name }}</span>
        </h2>
    </div>
@endsection

@section('left')
    <hr>
    {!! Form::model($lightservice,['action' => ['Admin\LightServiceController@update',$lightservice->id], 'method' => 'patch'], ['class'=>'']) !!}
    <h1>{{ trans('word.edit') . ' ' . $lightservice->name }}</h1>
    @include('admin.module.lightservice.add-edit')
    {!! Form::close() !!}
@endsection

@section('right')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>
                {{ $lightservice->name }}
            </h1>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-user-information">
            <tbody>
            <tr>
                <th>Price</th>
                <td>{{ $lightservice->price }}</td>
            </tr>

            </tbody>
        </table>
    </div>
    <div class="panel-footer ">
        <a data-toggle="tooltip" href="{{ action('Admin\LightServiceController@edit',$lightservice->id) }}" data-original-title="Edit Company" type="button" class="btn btn-sm btn-warning"><i class="fa fa-2x fa-edit"></i></a>
        <a href="#" data-link="{{ action('Admin\LightServiceController@destroy',$lightservice->id) }}" data-target="#deleteModalBox" data-original-title="Delete Company" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-2x fa-remove"></i></a>
    </div>
    @include('admin.partials.delete-modal',['info' => 'This will delete company and related records (employees,services) etc .'])

@endsection
