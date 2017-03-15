@extends('templates.admin.template')
@section('main')
<div class="col-lg-12">
    <h1 class="page-header">{{ trans('label.category') }}
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
            <th>{{ trans('label.desciption') }}</th>
            <th>{{ trans('label.delete') }}</th>
            <th>{{ trans('label.edit') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr class="odd gradeX" align="center">
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td class="center">
                {{ Form::open(['action' => ['Admin\CategoryController@destroy', $category->id], 'method' =>'delete', 'class' => 'form-delete', 'onsubmit' => 'return ConfirmDelete()' ]) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ action('Admin\CategoryController@edit', $category->id) }}">{{ trans('label.edit') }}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
