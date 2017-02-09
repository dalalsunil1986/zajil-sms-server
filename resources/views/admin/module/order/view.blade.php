@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <a href="{{action('Admin\OrderController@index')}}">Orders</a>
            <i class="fa fa-angle-right"></i>
            <span>{{ $order->transaction_id }}</span>
        </h2>
    </div>
@endsection

{{--@section('left')--}}
{{--@include('admin.module.buffet.sidebar',['active' =>'buffet', 'record'=>$order])--}}
{{--<hr>--}}
{{--{!! Form::model($order,['action' => ['Admin\BuffetController@update',$order->id], 'method' => 'patch'], ['class'=>'']) !!}--}}
{{--<h1>Edit Buffet </h1>--}}
{{--@include('admin.module.buffet.add-edit')--}}
{{--{!! Form::close() !!}--}}
{{--@endsection--}}

@section('left')
    {!! Form::model($order,['action' => ['Admin\OrderController@update',$order->id], 'method' => 'patch'], ['class'=>'']) !!}
    <div class="panel-body">
        <table class="table table-user-information">
            <tbody>
            <tr>
                <th>Name</th>
                <td>{{ $order->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <th>Amount</th>
                <td>{{ $order->amount }}</td>
            </tr>
            <tr>
                <th>Order Date</th>
                <td>{{ $order->created_at->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Transaction ID</th>
                <td>{{ $order->transaction_id }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{!! Form::select('status',$statuses,$order->status,['class'=>'form-control']) !!}</td>
            </tr>

            </tbody>
        </table>
    </div>
    <div class="panel-footer ">
        {!! Form::submit('Save',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
        <a href="#" class="red text-right" style="float: right" data-toggle="modal" data-target="#deleteModalBox"
           data-link="{{action('Admin\OrderController@destroy',$order->id)}}">
            <i class="fa fa-close ">Delete</i>
        </a>
        @include('admin.partials.delete-modal',['info' => 'Delete The Order ?'])
    </div>

@endsection
@section('right')

    @if($order->message_id)
        {!! Form::model($order,['action' => ['Admin\OrderController@update',$order->id], 'method' => 'patch'], ['class'=>'']) !!}
        {!! Form::hidden('service_type','message') !!}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Message</h1>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-user-information">
                <tbody>
                <tr>
                    <th>Message ID</th>
                    <td>{{ $order->message_id }}</td>
                </tr>

                <tr>
                    <th>Message Text</th>
                    <td>{{ $order->message_text }}</td>
                </tr>
                <tr>
                    <th>Message Time</th>
                    <td>{{ $order->message_time }}</td>
                </tr>
                <tr>
                    <th>Message Date</th>
                    <td>{{ $order->message_date }}</td>
                </tr>
                @if($order->message)
                    <tr>
                        <th>Price</th>
                        <td>{{ $order->message->price }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

        <div class="panel-footer ">
            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>


    @endif

    @if($order->buffet_package_id)
        {!! Form::model($order,['action' => ['Admin\OrderController@update',$order->id], 'method' => 'patch'], ['class'=>'']) !!}
        {!! Form::hidden('service_type','buffet_package') !!}
        <hr>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Buffet</h1>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-user-information">
                <tbody>
                <tr>
                    <th>Buffet Package ID</th>
                    <td>{{ $order->buffet_package_id }}</td>
                </tr>
                @if($order->buffetPackage && $order->buffetPackage->buffet)
                    <tr>
                        <th>Buffet Co</th>
                        <td>{{ $order->buffetPackage->buffet->name }}</td>
                    </tr>
                    <tr>
                        <th>Buffet Package </th>
                        <td>{{ $order->buffetPackage->description }}</td>
                    </tr>
                    <tr>
                        <th>Buffet Date</th>
                        <td>{{ $order->buffet_date }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>{{ $order->buffetPackage->price }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

        <div class="panel-footer ">
            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>

    @endif

    @if($order->hall_id)
        {!! Form::model($order,['action' => ['Admin\OrderController@update',$order->id], 'method' => 'patch'], ['class'=>'']) !!}
        {!! Form::hidden('service_type','hall') !!}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Hall</h1>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-user-information">
                <tbody>
                <tr>
                    <th>Hall ID</th>
                    <td>{{ $order->hall_id }}</td>
                </tr>

                @if($order->hall)
                    <tr>
                        <th>Name</th>
                        <td>{{ $order->hall->name }}</td>
                    </tr>
                    <tr>
                        <th>Hall Date</th>
                        <td>{{ $order->hall_date }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>{{ $order->hall->price }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="panel-footer ">
            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>


    @endif

    @if($order->photographer_id)
        {!! Form::model($order,['action' => ['Admin\OrderController@update',$order->id], 'method' => 'patch'], ['class'=>'']) !!}
        {!! Form::hidden('service_type','photographer') !!}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Photographer</h1>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-user-information">
                <tbody>
                <tr>
                    <th>Photographer ID</th>
                    <td>{{ $order->photographer_id }}</td>
                </tr>

                @if($order->photographer)
                    <tr>
                        <th>Name</th>
                        <td>{{ $order->photographer->name }}</td>
                    </tr>
                    <tr>
                        <th>Hall Date</th>
                        <td>{{ $order->photographer_date }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>{{ $order->photographer->price }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="panel-footer ">
            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    @endif
    @if($order->light_service_id)
        {!! Form::model($order,['action' => ['Admin\OrderController@update',$order->id], 'method' => 'patch'], ['class'=>'']) !!}
        {!! Form::hidden('service_type','light_service') !!}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Lighting</h1>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-user-information">
                <tbody>
                <tr>
                    <th>Lighting ID</th>
                    <td>{{ $order->light_service_id }}</td>
                </tr>
                @if($order->lightService)
                    <tr>
                        <th>Name</th>
                        <td>{{ $order->lightService->name }}</td>
                    </tr>
                    <tr>
                        <th>Hall Date</th>
                        <td>{{ $order->light_service_date }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>{{ $order->lightService->price }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="panel-footer ">
            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    @endif

    @if($order->guest_service_id)
        {!! Form::model($order,['action' => ['Admin\OrderController@update',$order->id], 'method' => 'patch'], ['class'=>'']) !!}
        {!! Form::hidden('service_type','guest_service') !!}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Guest Service</h1>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-user-information">
                <tbody>
                <tr>
                    <th>Guest Service ID</th>
                    <td>{{ $order->guest_service_id }}</td>
                </tr>

                @if($order->guestService)
                    <tr>
                        <th>Name</th>
                        <td>{{ $order->guestService->name }}</td>
                    </tr>
                    <tr>
                        <th>Hall Date</th>
                        <td>{{ $order->guest_service_date }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>{{ $order->guestService->price }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="panel-footer ">
            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    @endif




@endsection
