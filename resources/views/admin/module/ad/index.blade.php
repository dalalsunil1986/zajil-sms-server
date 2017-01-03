@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Ads</span>
        </h2>
    </div>
@endsection

@section('js')
    @parent
@endsection

@section('left')
    {!! Form::open(['action' => 'Admin\AdController@store', 'method' => 'post','files'=>true,'class'=>'']) !!}
    <h1>Upload Ad Image</h1>
    <div style="margin-top: 20px">
        @include('admin.module.ad.add-edit')
    </div>
    {!! Form::close() !!}
@endsection

@section('right')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Ads</h1>
        </div>
    </div>
    <div class="panel-body" style="padding: 0;">
        <table class="table table-striped table-bordered table-hover" >
            <thead class="bg-blue">
            <tr>
                <th>Image</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($ads as $ad)
                <tr class="gradeU">
                    <td>
                        <a href="{{ action('Admin\AdController@show',$ad->id)}}">
                            <img src="{{ $ad->url }}" class="img img-responsive" style="width: 100px;height:100px"/>
                        </a>
                    </td>
                    <td class="f18">
                        <a href="#" class="red" data-toggle="modal" data-target="#deleteModalBox"
                           data-link="{{action('Admin\AdController@destroy',$ad->id)}}">
                            <i class="fa fa-close "></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.partials.delete-modal',['info' => 'Delete Ad'])
    </div>

@endsection
