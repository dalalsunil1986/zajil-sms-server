@extends('admin.layouts.one-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Orders</span>
        </h2>
    </div>
@endsection

@section('js')
    @parent
@endsection

@section('left')

@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Orders</h1>
        </div>
    </div>
    <div class="panel-body" style="padding: 0;">
        <table class="table table-striped table-bordered table-hover" >
            <thead class="bg-blue">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Amount</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr class="gradeU">
                    <td>
                        <a href="{{ action('Admin\OrderController@show',$order->id)}}">{{ $order->name }} </a>
                    </td>
                    <td class="f18">{{ $order->email }}</td>
                    <td class="f18">{{ $order->phone }}</td>
                    <td class="f18">{{ $order->amount }}</td>
                    <td class="f18">{{ $order->created_at->format('d-m-Y') }}</td>
                    <td class="f18">{{ $order->status }}</td>
                    <td class="f18">
                        <a href="#" class="red" data-toggle="modal" data-target="#deleteModalBox"
                           data-link="{{action('Admin\OrderController@destroy',$order->id)}}">
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
