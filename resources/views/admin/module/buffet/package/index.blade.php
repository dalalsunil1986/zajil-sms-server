@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <a href="{{action('Admin\BuffetController@index')}}">Buffets</a>
            <i class="fa fa-angle-right"></i>
            <a href="{{action('Admin\BuffetController@show',$buffet->id)}}">{{ $buffet->name }}</a>
            <i class="fa fa-angle-right"></i>
            <span>Packages</span>
        </h2>
    </div>
@endsection

@section('left')
    @include('admin.module.buffet.sidebar',['active' =>'packages', 'record'=>$buffet])
    {!! Form::open(['action' => ['Admin\BuffetController@createPackage','buffetID'=>$buffet->id], 'method' => 'post'], ['class'=>'']) !!}
    <h1>Add Package</h1>
    @include('admin.module.buffet.package.add-edit',['record'=>$buffet])
    {!! Form::close() !!}
@endsection

@section('right')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>{{ $buffet->name }} Packages</h1>
        </div>
    </div>
    <div class="panel-body" style="padding: 0;">
        <table class="table table-striped table-bordered table-hover" >
            <thead class="bg-blue">
            <tr>
                <th>Description</th>
                <th>Price</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($buffet->packages as $package)
                <tr class="gradeU">
                    <td class="f18"><a href="{{ action('Admin\BuffetController@getPackage',$package->id) }}">{{ $package->description }}</a></td>
                    <td class="f18">{{ $package->price }}</td>
                    <td class="f18">
                        <a href="{{action('Admin\BuffetController@deletePackage',$package->id)}}" class="red"
                           >
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
