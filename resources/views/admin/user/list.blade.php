@extends('templates.admin.template')
@section('main')
<div class="col-lg-12">
    <h1 class="page-header">{{ trans('label.user') }}</span>
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
            <th>{{ trans('label.fullname') }}</th>
            <th>{{ trans('label.email') }}</th>
            <th>{{ trans('label.avatar') }}</th>
            <th>{{ trans('label.delete') }}</th>
            <th>{{ trans('label.edit') }}</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr class="odd gradeX" align="center">
            <td>{{ $user->name }}</td>
            <td>{{ $user->fullname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->avatar }}</td>
            <td class="center">
                {{ Form::open(['action' => ['Admin\UserController@destroy', $user->id], 'method' =>'delete', 'class' => 'form-delete', 'onsubmit' => 'return ConfirmDelete()' ]) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ action('Admin\UserController@edit', $user->id) }}">{{ trans('label.edit') }}</a></td>
        </tr>
    @endforeach    
    </tbody>
</table>
@endsection
