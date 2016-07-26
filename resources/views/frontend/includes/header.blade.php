<header class="main-header">
    {{ link_to_route('frontend.user.dashboard', app_name(), [], ['class' => 'logo']) }}

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                @if (access()->guest())
                    <li>{{ link_to('login', trans('navs.frontend.login')) }}</li>
                    <li>{{ link_to('register', trans('navs.frontend.register')) }}</li>
                @else

              <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-default">0</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="header">{{ trans_choice('strings.backend.general.you_have.messages', 0, ['number' => 0]) }}</li>
                        <li class="footer">
                            {{ link_to('#', trans('strings.backend.general.see_all.messages')) }}
                        </li>
                    </ul>
                </li><!-- /.messages-menu -->

                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-default">0</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="header">{{ trans_choice('strings.backend.general.you_have.notifications', 0) }}</li>
                        <li class="footer">
                            {{ link_to('#', trans('strings.backend.general.see_all.notifications')) }}
                        </li>
                    </ul>
                </li><!-- /.notifications-menu -->

                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-default">0</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="header">{{ trans_choice('strings.backend.general.you_have.tasks', 0, ['number' => 0]) }}</li>
                        <li class="footer">
                            {{ link_to('#', trans('strings.backend.general.see_all.tasks')) }}
                        </li>
                    </ul>
                </li><!-- /.tasks-menu -->


                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ access()->user()->picture }}" class="user-image" alt="User Avatar"/>
                        <span class="hidden-xs">{{ access()->user()->name }}</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Avatar" />
                            <p>
                                {{ access()->user()->name }}
                            </p>
                        </li>

                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                {{ link_to('#', 'Link') }}
                            </div>
                            <div class="col-xs-4 text-center">
                                {{ link_to('#', 'Link') }}
                            </div>
                            <div class="col-xs-4 text-center">
                                {{ link_to('#', 'Link') }}
                            </div>
                        </li>

                        <!--

                            @if (access()->user()->canChangePassword())
                                <li>{{ link_to_route('auth.password.change', trans('navs.frontend.user.change_password')) }}</li>
                            @endif

                            @permission('view-backend')
                            <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                            @endauth
                        -->

                        <li class="user-footer">
                            <div class="pull-left">
                                {{ link_to_route('frontend.user.dashboard', trans('navs.general.home'), [], ['class' => 'btn btn-default btn-flat']) }}
                            </div>
                            <div class="pull-right">
                                {{ link_to_route('auth.logout', trans('navs.general.logout'), [], ['class' => 'btn btn-default btn-flat']) }}
                            </div>
                        </li>
                    </ul>
                </li>

                @endif

            </ul>
        </div><!-- /.navbar-custom-menu -->
    </nav>
</header>