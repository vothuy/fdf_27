@extends('templates.admin.template')
@section('main')
<div class="col-lg-12">
    <h1 class="page-header">{{ trans('label.category') }}
        <small>{{ trans('label.add') }}</small>
    </h1>
</div>
<div class="col-lg-7" >
    {!! Form::open(['method' => 'POST', 'action' => 'Admin\CategoryController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', trans('label.category name'))!!}
            {!! Form::text('cateName', old('cateName'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', trans('label.category description'))!!}
            {!! Form::textarea('description', null, ['size' => '30x5', 'class' => 'form-control'])!!}
        </div>
        {!! Form::submit(trans('label.add'), ['class' => 'btn btn-primary btn_save']) !!}
        {!! Form::reset(trans('label.reset'), ['class' => 'btn btn-primary btn-danger']) !!}
    {!! Form::close() !!}
</div>
@endsection
