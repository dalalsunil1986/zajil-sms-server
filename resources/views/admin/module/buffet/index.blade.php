@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Buffets</span>
        </h2>
    </div>
@endsection

@section('js')
    @parent
@endsection

@section('left')
    {!! Form::open(['action' => ['Admin\BuffetController@store'], 'method' => 'post'], ['class'=>'']) !!}
    <h1>Add Buffet</h1>
    @include('admin.module.buffet.add-edit')
    {!! Form::close() !!}
@endsection

@section('right')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Buffets</h1>
        </div>
    </div>
    <div class="panel-body" style="padding: 0;">
        <table class="table table-striped table-bordered table-hover" >
            <thead class="bg-blue">
            <tr>
                <th>Company Name</th>
                <th>Description</th>
                <th>Address</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($buffets as $company)
                <tr class="gradeU">
                    <td>
                        <a href="{{ action('Admin\BuffetController@show',$company->id)}}">{{ $company->name }} </a>
                    </td>
                    <td class="f18">{{ $company->description }}</td>
                    <td class="f18">{{ $company->address }}</td>
                    <td class="f18">
                        <a href="#" class="red" data-toggle="modal" data-target="#deleteModalBox"
                           data-link="{{action('Admin\BuffetController@destroy',$company->id)}}">
                            <i class="fa fa-close "></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.partials.delete-modal',['info' => 'This will delete company and related records (employees,services) etc .'])
    </div>

@endsection
