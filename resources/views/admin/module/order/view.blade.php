@extends('admin.layouts.two-col')

@section('breadcrumb')
    <div class="banner">
        <h2>
            <a href="/admin">Home</a>
            <i class="fa fa-angle-right"></i>
            <a href="{{action('Admin\OrderController@index')}}">Orders</a>
            <i class="fa fa-angle-right"></i>
            <span>{{ $order->secret_token }}</span>
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

            </tbody>
        </table>
    </div>
@endsection
@section('right')

    @if($order->message_id)
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
                    <th>Message Date</th>
                    <td>{{ $order->message_date }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $order->message->price }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="panel-footer ">
            <a data-toggle="tooltip" href="{{ action('Admin\PhotographerController@edit',$order->id) }}" data-original-title="Edit Company" type="button" class="btn btn-sm btn-warning"><i class="fa fa-2x fa-edit"></i></a>
            <a href="#" data-link="{{ action('Admin\PhotographerController@destroy',$order->id) }}" data-target="#deleteModalBox" data-original-title="Delete Company" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-2x fa-remove"></i></a>
        </div>
        @include('admin.partials.delete-modal',['info' => 'Remove Message From Service ?'])

    @endif

    @if($order->buffet_package_id)

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
                    <td>{{ $order->buffetPackage->id }}</td>
                </tr>
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
                </tbody>
            </table>
        </div>

        <div class="panel-footer ">
            <a data-toggle="tooltip" href="{{ action('Admin\PhotographerController@edit',$order->id) }}" data-original-title="Edit Company" type="button" class="btn btn-sm btn-warning"><i class="fa fa-2x fa-edit"></i></a>
            <a href="#" data-link="{{ action('Admin\PhotographerController@destroy',$order->id) }}" data-target="#deleteModalBox" data-original-title="Delete Company" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-2x fa-remove"></i></a>
        </div>
        @include('admin.partials.delete-modal',['info' => 'Remove Buffet From Service ?.'])

    @endif

    @if($order->hall_id)
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
                    <td>{{ $order->hall->id }}</td>
                </tr>

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
                </tbody>
            </table>
        </div>

        <div class="panel-footer ">
            <a data-toggle="tooltip" href="{{ action('Admin\PhotographerController@edit',$order->id) }}" data-original-title="Edit Company" type="button" class="btn btn-sm btn-warning"><i class="fa fa-2x fa-edit"></i></a>
            <a href="#" data-link="{{ action('Admin\PhotographerController@destroy',$order->id) }}" data-target="#deleteModalBox" data-original-title="Delete Company" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-2x fa-remove"></i></a>
        </div>
        @include('admin.partials.delete-modal',['info' => 'Remove Message From Service ?'])

    @endif

    @if($order->photographer_id)
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
                    <td>{{ $order->photographer->id }}</td>
                </tr>

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
                </tbody>
            </table>
        </div>

        <div class="panel-footer ">
            <a data-toggle="tooltip" href="{{ action('Admin\PhotographerController@edit',$order->id) }}" data-original-title="Edit Company" type="button" class="btn btn-sm btn-warning"><i class="fa fa-2x fa-edit"></i></a>
            <a href="#" data-link="{{ action('Admin\PhotographerController@destroy',$order->id) }}" data-target="#deleteModalBox" data-original-title="Delete Company" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-2x fa-remove"></i></a>
        </div>
        @include('admin.partials.delete-modal',['info' => 'Remove Message From Service ?'])

    @endif
    @if($order->light_service_id)
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
                    <td>{{ $order->lightService->id }}</td>
                </tr>

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
                </tbody>
            </table>
        </div>

        <div class="panel-footer ">
            <a data-toggle="tooltip" href="{{ action('Admin\PhotographerController@edit',$order->id) }}" data-original-title="Edit Company" type="button" class="btn btn-sm btn-warning"><i class="fa fa-2x fa-edit"></i></a>
            <a href="#" data-link="{{ action('Admin\PhotographerController@destroy',$order->id) }}" data-target="#deleteModalBox" data-original-title="Delete Company" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-2x fa-remove"></i></a>
        </div>
        @include('admin.partials.delete-modal',['info' => 'Remove Message From Service ?'])

    @endif

    @if($order->guest_service_id)
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
                    <td>{{ $order->guestService->id }}</td>
                </tr>

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
                </tbody>
            </table>
        </div>

        <div class="panel-footer ">
            <a data-toggle="tooltip" href="{{ action('Admin\PhotographerController@edit',$order->id) }}" data-original-title="Edit Company" type="button" class="btn btn-sm btn-warning"><i class="fa fa-2x fa-edit"></i></a>
            <a href="#" data-link="{{ action('Admin\PhotographerController@destroy',$order->id) }}" data-target="#deleteModalBox" data-original-title="Delete Company" data-toggle="modal" type="button" class="btn btn-sm btn-danger"><i class="fa fa-2x fa-remove"></i></a>
        </div>
        @include('admin.partials.delete-modal',['info' => 'Remove Message From Service ?'])

    @endif




@endsection
