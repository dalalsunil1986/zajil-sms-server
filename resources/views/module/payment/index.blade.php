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

            <div class="col-md-12">
                <h1></h1>
                <div class="form-group">
                    <label for="companyName">اسم</label>
                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'اسم']) !!}
                </div>
                <div class="form-group">
                    <label for="companyName">موبايل</label>
                    {!! Form::text('mobile',null,['class'=>'form-control','placeholder'=>'موبايل']) !!}
                </div>
                <div class="form-group">
                    <label for="companyName">عنوان</label>
                    {!! Form::text('address',null,['class'=>'form-control','placeholder'=>'عنوان']) !!}
                </div>
                <div class="form-group">
                    <label for="companyName">مسج</label>
                    {!! Form::text('message',null,['class'=>'form-control','placeholder'=>'مسج']) !!}
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success" style="width: 100%">ادفع {{ $amount }}</button>
                </div>
            </div>



            {!! Form::close() !!}
        </div>
    </div>
@endsection