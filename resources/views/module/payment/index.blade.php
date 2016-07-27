@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
{{--            {!! Form::open(['url' => ['http://test.e.net.kw/Merchant/Payment/eNetCpgMainAPI.aspx'], 'method' => 'post'], ['class'=>'']) !!}--}}
            {!! Form::open(['url' => ['https://dealer.e.net.kw/Merchant/payment/eNetCpgMainAPI.aspx'], 'method' => 'POST'], ['class'=>'']) !!}
            {{--@foreach($params as $key )--}}
                {{--{!! Form::hidden($key['name'],$key['contents']) !!}--}}
            {{--@endforeach--}}
            @foreach($params as $key => $val )
                {!! Form::hidden($key,$val) !!}
            @endforeach
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" style="width: 100%">ادفع {{ $order->amount }}</button>
        </div>

    </div>
@endsection
