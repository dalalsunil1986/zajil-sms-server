@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>{{trans('words.guestservices')}}</span>
        </h2>
    </div>
@endsection

@section('js')
    @parent
@endsection

@section('left')
    {!! Form::open(['action' => ['Admin\GuestServiceController@store'], 'method' => 'post'], ['class'=>'']) !!}
    <h1>{{trans('words.add') . trans('words.guestservice')}}</h1>
    @include('admin.module.guestservice.add-edit')
    {!! Form::close() !!}
@endsection

@section('right')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>{{trans('words.guestservices')}}</h1>
        </div>
    </div>
    <div class="panel-body" style="padding: 0;">
        <table class="table table-striped table-bordered table-hover" >
            <thead class="bg-blue">
            <tr>
                <th>{{ trans('word.name') }}</th>
                <th>{{ trans('word.price') }}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($guestservices as $guestservice)
                <tr class="gradeU">
                    <td>
                        <a href="{{ action('Admin\GuestServiceController@show',$guestservice->id)}}">{{ $guestservice->name }} </a>
                    </td>
                    <td class="f18">{{ $guestservice->price }}</td>
                    <td class="f18">
                        <a href="#" class="red" data-toggle="modal" data-target="#deleteModalBox"
                           data-link="{{action('Admin\GuestServiceController@destroy',$guestservice->id)}}">
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
