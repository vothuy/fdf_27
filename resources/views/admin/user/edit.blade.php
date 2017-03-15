@extends('templates.admin.template')
@section('main')
<div class="col-lg-12">
    <h1 class="page-header">{{ trans('label.user') }}</span>
        <small>{{ trans('label.edit') }}</small>
    </h1>
</div>
<div class="col-lg-7">
    {!! Form::open([ 'method' => 'PUT', 'action' => ['Admin\UserController@update', $user->id ] ]) !!}
        <div class="form-group">
            {!! Form::label('name', trans('label.name'), ['class' => 'control-label']) !!}
            {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('label.email'), ['class' => 'control-label']) !!}
            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('label.fullname'), ['class' => 'control-label']) !!}
            {!! Form::text('fullname', $user->fullname, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('label.address'), ['class' => 'control-label']) !!}
            {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('label.images'),['class' => 'control-label']) !!}
            {{ Form::file('avatar', ['class' => 'field', 'placeholder' => $user->avatar]) }}
        </div>
        {!! Form::submit(trans('label.edit'), ['class' => 'btn btn-primary btn_save']) !!}
        {!! Form::reset(trans('label.reset'), ['class' => 'btn btn-primary btn-danger']) !!}
    <form>
    {!! Form::close() !!}
</div>
@endsection
