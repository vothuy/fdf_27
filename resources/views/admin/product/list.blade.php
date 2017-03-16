@extends('templates.admin.template')
@section('main')
<div class="col-lg-12">
    <h1 class="page-header">{{ trans('label.product') }}
        <small>{{ trans('label.list') }}</small>
    </h1>
</div>
@if (session('notification'))
    <div class="alert alert-success">
        {{ session('notification') }}
    </div>
@endif
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>{{ trans('label.name') }}</th>
            <th>{{ trans('label.belong category') }}</th>
            <th>{{ trans('label.price') }}</th>
            <th>{{ trans('label.amount') }}</th>
            <th>{{ trans('label.images') }}</th>
            <th>{{ trans('label.delete') }}</th>
            <th>{{ trans('label.edit') }}</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr class="odd gradeX" align="center">
            <td>{{ $product->name }}</td>
            <td>{{ $product->category_id }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->amount }}</td>
            <td><img src="{!! Storage::url($product->image) !!}" /></td>
            <td class="center">
                {{ Form::open(['action' => ['Admin\ProductController@destroy', $product->id], 'method' =>'delete', 'class' => 'form-delete', 'onsubmit' => 'return ConfirmDelete()' ]) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ action('Admin\ProductController@edit', $product->id) }}">{{ trans('label.edit') }}</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
