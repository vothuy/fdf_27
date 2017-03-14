<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <li class="sidebar-search">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </li>
        <li>
            <a href="#"><i class="fa fa-dashboard fa-fw"></i> {{ trans('label.dashboard') }}</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> {{ trans('label.category') }}<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="#">{{ trans('label.list category') }}</a>
                </li>
                <li>
                    <a href="#">{{ trans('label.category add') }}</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-cube fa-fw"></i> {{ trans('label.product') }}<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="#">{{ trans('label.list product') }}</a>
                </li>
                <li>
                    <a href="#">{{ trans('label.product add') }}</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-users fa-fw"></i> {{ trans('label.user') }}<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ action('Admin\UserController@index') }}">{{ trans('label.list user') }}</a>
                </li>
                <li>
                    <a href="{{ action('Admin\UserController@create') }}">{{ trans('label.user add') }}</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
