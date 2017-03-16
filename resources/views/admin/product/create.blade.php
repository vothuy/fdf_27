@extends('templates.admin.template')
@section('main')
	<div class="col-lg-12">
        <h1 class="page-header">{{ trans('label.product') }}
            <small>{{ trans('label.add') }}</small>
        </h1>
    </div>
    <div class="col-lg-7" >
        {!! Form::open(['method' => 'POST', 'action' => 'Admin\ProductController@store', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('name', trans('label.name'))!!}
                {!! Form::text('name', old('txtName'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', trans('label.belong category'))!!}
                {!! Form::select('category_id', $category, null, ['class' => 'form-control', 'placeholder' => trans('label.please choose category')]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', trans('label.price'))!!}
                {!! Form::text('price', old('txtPrice'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', trans('label.amount'))!!}
                {!! Form::text('amount', old('txtAmount'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', trans('label.images'))!!}
                {!! Form::file('image') !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', trans('label.inventory'))!!}
                {!! Form::radio('inventory', '', true) !!} {{ trans('label.visible') }}
                {!! Form::radio('inventory', '', true) !!} {{ trans('label.invisible') }}
            </div>
        {!! Form::submit(trans('label.add'), ['class' => 'btn btn-primary btn_save']) !!}
        {!! Form::reset(trans('label.reset'), ['class' => 'btn btn-primary btn-danger']) !!}
    {!! Form::close() !!}
    </div>
@endsection
