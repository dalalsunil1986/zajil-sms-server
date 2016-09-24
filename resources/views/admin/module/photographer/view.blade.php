@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <a href="{{action('Admin\PhotographerController@index')}}">{{trans('words.photographers')}}</a>
            <i class="fa fa-angle-right"></i>
            <span>{{ $photographer->name }}</span>
        </h2>
    </div>
@endsection

@section('left')
    <hr>
    {!! Form::model($photographer,['action' => ['Admin\PhotographerController@update',$photographer->id], 'method' => 'patch'], ['class'=>'']) !!}
    <h1>Edit Photographer </h1>
    @include('admin.module.photographer.add-edit')
    {!! Form::close() !!}
    <hr>
    <h1> Attach Photographer</h1>

    {!! Form::model($photographer,['action' => ['Admin\UserController@attachService'], 'method' => 'post'], ['class'=>'']) !!}

    {!! Form::hidden('model_id',$photographer->id) !!}
    {!! Form::hidden('model_type','photographer') !!}
    <div class="form-group">
        {!! Form::select('user_id',$users,null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success" style="width: 100%; padding-top: 10px">{{ trans('word.save') }}</button>
    </div>
    {!! Form::close() !!}
@endsection

@section('right')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>
                {{ $photographer->name }}
            </h1>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-user-information">
            <tbody>
            <tr>
                <th>Price</th>
                <td>{{ $photographer->price }}</td>
            </tr>

            </tbody>
        </table>
    </div>
    <div class="panel-footer ">
        <a data-toggle="tooltip" href="{{ action('Admin\PhotographerController@edit',$photographer->id) }}" data-original-title="Edit Company" type="button" class="btn btn-sm btn-warning"><i class="fa fa-2x fa-edit"></i></a>
        <a href="#" data-link="{{ action('Admin\PhotographerController@destroy',$photographer->id) }}" data-target="#deleteModalBox" data-original-title="Delete Company" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-2x fa-remove"></i></a>
    </div>
    @include('admin.partials.delete-modal',['info' => 'This will delete company and related records (employees,services) etc .'])

@endsection
