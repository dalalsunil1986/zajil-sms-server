@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <a href="{{action('Admin\BuffetController@index')}}">Buffets</a>
            <i class="fa fa-angle-right"></i>
            <a href="{{action('Admin\BuffetController@show',$package->buffet->id)}}">{{ $package->buffet->name }}</a>
            <i class="fa fa-angle-right"></i>
            <a href="{{action('Admin\BuffetController@getPackages',$package->buffet->id)}}">Packages</a>
            <i class="fa fa-angle-right"></i>
            <span>{{ $package->description }}</span>
        </h2>
    </div>
@endsection

@section('left')
    <hr>
    {!! Form::model($package,['action' => ['Admin\BuffetController@editPackage',$package->id], 'method' => 'post'], ['class'=>'']) !!}
    <h1>Edit Package </h1>
    @include('admin.module.buffet.package.add-edit',['record'=>$package])
    {!! Form::close() !!}
@endsection

@section('right')
    <div class="panel-body">
        <table class="table table-user-information">
            <tbody>
            <tr>
                <th>Description</th>
                <td>{{ $package->description }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{ $package->price }}</td>
            </tr>
            <tr>
                <th>Active</th>
                <td>{{ $package->active ? 'true' : 'false'}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="panel-footer ">
        <a data-toggle="tooltip" href="{{ action('Admin\BuffetController@edit',$package->id) }}" data-original-title="Edit Company" type="button" class="btn btn-sm btn-warning"><i class="fa fa-2x fa-edit"></i></a>
        <a href="#" data-link="{{ action('Admin\BuffetController@destroy',$package->id) }}" data-target="#deleteModalBox" data-original-title="Delete Company" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-2x fa-remove"></i></a>
    </div>
    @include('admin.partials.delete-modal',['info' => 'This will delete company and related records (employees,services) etc .'])

@endsection
