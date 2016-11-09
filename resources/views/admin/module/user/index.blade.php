@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Users</span>
        </h2>
    </div>
@endsection

@section('left')
    {!! Form::open(['action' => ['Admin\UserController@store'], 'method' => 'post'], ['class'=>'']) !!}
    <h1>Add User</h1>
    <div>
        <div class="form-group" style="padding-top: 20px">
            <label for="name">Name</label>
            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Name']) !!}
        </div>

        <div class="form-group" style="padding-top: 20px">
            <label for="name">Email</label>
            {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) !!}
        </div>

        <div class="form-group" style="padding-top: 20px">
            <label for="name">Password</label>
            {!! Form::password('password',null,['class'=>'form-control','placeholder'=>'Password']) !!}
        </div>
        <div class="form-group" style="padding-top: 20px">
            <label for="name">Password</label>
            {!! Form::password('password_confirmation',null,['class'=>'form-control','placeholder'=>'Confirm Password']) !!}
        </div>
        <div class="form-group">
            <label for="price">Active</label>
            {!! Form::select('active',['0'=>'No','1'=>'Yes'],null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" style="width: 100%">Save</button>
            {!! Form::close() !!}
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('right')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Users</h1>
        </div>
    </div>
    <div class="panel-body" style="padding: 0;">
        <table class="table table-striped table-bordered table-hover" >
            <thead class="bg-blue">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Registered Date</th>
                <th>Active</th>
                <th>Admin</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="gradeU">
                    <td>
                        <a href="{{ action('Admin\UserController@show',$user->id)}}">{{ $user->name }} </a>
                    </td>
                    <td class="f18">{{ $user->email }}</td>
                    <td class="f18">{{ $user->created_at->format('d-m-Y') }}</td>
                    <td class="f18">{{ $user->active  ? 'Yes' : 'No' }}</td>
                    <td class="f18">{{ $user->admin ? 'Yes' : 'No' }}</td>
                    <td class="f18">
                        <a href="#" class="red" data-toggle="modal" data-target="#deleteModalBox"
                           data-link="{{action('Admin\UserController@destroy',$user->id)}}">
                            <i class="fa fa-close "></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.partials.delete-modal',['info' => 'Delete User'])
    </div>

@endsection
