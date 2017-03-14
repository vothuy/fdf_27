<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('label.admin') }}</title>
    {{ Html::style('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('/bower_components/metisMenu/dist/metisMenu.min.css') }}
    {{ Html::style('/bower_components/bootstrap/dist/css/sb-admin-2.css') }}
    {{ Html::style('/bower_components/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}
    {{ Html::style('/bower_components/datatables-responsive/css/dataTables.responsive.css') }}
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">{{ trans('label.toggle navigation') }}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><span style="color:blue">{{ trans('label.admin') }}</span></a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> {{ trans('label.user profile') }} </a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>{{ trans('label.settings') }}</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('auth.login') }}"><i class="fa fa-sign-out fa-fw"></i> {{ trans('label.logout') }}</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="navbar-default sidebar" role="navigation">
                @include('templates.admin.left_bar')
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
