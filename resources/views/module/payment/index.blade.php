@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['action' => ['PaymentController@store'], 'method' => 'post'], ['class'=>'']) !!}

            {!! Form::hidden('',null) !!}
            {!! Form::hidden('',null) !!}
            {!! Form::hidden('',null) !!}
            {!! Form::hidden('',null) !!}
            {!! Form::hidden('',null) !!}


            {!! Form::close() !!}
        </div>
    </div>
@endsection