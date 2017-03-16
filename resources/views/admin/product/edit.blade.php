@extends('templates.admin.template')
@section('main')
    <div class="col-lg-12">
        <h1 class="page-header">{{ trans('label.product') }}
            <small>{{ trans('label.edit') }}</small>
        </h1>
    </div>
    <div class="col-lg-7" >
        {!! Form::open(['method' => 'PUT', 'action' => ['Admin\ProductController@update', $product->id], 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('name', trans('label.name'))!!}
                {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', trans('label.belong category'))!!}
                {!! Form::select('category_id', $category, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', trans('label.price'))!!}
                {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', trans('label.amount'))!!}
                {!! Form::text('amount', $product->amount, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', trans('label.images'))!!}
                {!! Form::file('image') !!}
                <div class="form-group">
                    @if ($product['image'] != '')
                    {!! Form::label('name', trans('label.image_old'))!!}
                    <img src="{!!Storage::url($product['image'])!!}" alt="" /> {{ trans('label.delete') }} <input type="checkbox" name="delete_picture" value="1" />
                    @endif
                </div>
            </div>
            {!! Form::submit(trans('label.edit'), ['class' => 'btn btn-primary btn_save']) !!}
            {!! Form::reset(trans('label.reset'), ['class' => 'btn btn-primary btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@endsection
