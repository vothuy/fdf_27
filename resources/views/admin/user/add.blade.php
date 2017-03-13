@extends('templates.admin.template')
@section('main')
<div class="col-lg-12">
    <h1 class="page-header">{{ trans('label.user') }}</span>
        <small>{{ trans('label.add') }}</small>
    </h1>
</div>
<div class="col-lg-7">
    {!! Form::open(['method' => 'post', 'action' => 'Admin\UserController@store', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('name', trans('label.name'), ['class' => 'control-label']) !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('label.email'), ['class' => 'control-label']) !!}
            {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('label.fullname'), ['class' => 'control-label']) !!}
            {!! Form::text('fullname', old('fullname'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('label.password'), ['class' => 'control-label']) !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('label.address'), ['class' => 'control-label']) !!}
            {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('label.phone'), ['class' => 'control-label']) !!}
            {!! Form::text('phone', old('phone'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('label.images'),['class' => 'control-label']) !!}
            {{ Form::file('avatar', ['class' => 'field']) }}
        </div>
        {!! Form::submit(trans('label.add'), ['class' => 'btn btn-primary btn_save']) !!}
        {!! Form::reset(trans('label.reset'), ['class' => 'btn btn-primary btn-danger']) !!}
    {!! Form::close() !!}
</div>
@endsection
