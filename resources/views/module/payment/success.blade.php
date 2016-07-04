@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="center-block">
            <h1 style="text-align: center; padding-top: 100px; color:green">Transaction Success</h1>
            <div class="text-center">
                <a href="{{route('payment.end')}}" class="btn btn-positive" role="button" style="text-align: center"><h2>  Return to HomePage  </h2></a>
            </div>
        </div>
    </div>
@endsection