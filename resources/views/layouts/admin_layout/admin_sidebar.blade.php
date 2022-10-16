    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="@if(!empty(Auth::guard('admin')->user()->image)) {{ asset('/images/admin_images/admin_photos/' . Auth::guard('admin')->user()->image) }} @else /images/admin_images/user.png @endif" width="48" height="48" alt="User"/>
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ ucwords(Auth::guard('admin')->user()->name) }}</div>
                    <div class="email">{{ Auth::guard('admin')->user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/admin/logout') }}"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li @if(Session::get('page') == "dashboard") class="active" @endif>
                        <a href="{{ url('/admin/dashboard') }}">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li @if(Session::get('page') == "view-admins") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">admin_panel_settings</i>
                            <span>Admins</span>
                        </a>
                        <ul class="ml-menu">
                            {{-- <li>
                                <a href="">Add Users</a>
                            </li> --}}
                            <li @if(Session::get('page') == "view-admins") class="active" @endif>
                                <a href="{{ url('/admin/view-admins') }}">View Admins</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Session::get('page') == "add-users" || Session::get('page') == "view-users") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Users</span>
                        </a>
                        <ul class="ml-menu">
                            <li @if(Session::get('page') == "add-users") class="active" @endif>
                                <a href="{{ url('/admin/add-users') }}">Add Users</a>
                            </li>
                            <li @if(Session::get('page') == "view-users") class="active" @endif>
                                <a href="{{ url('/admin/view-users') }}">View Users</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Session::get('page') == "view-tags") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">important_devices</i>
                            <span>Tags</span>
                        </a>
                        <ul class="ml-menu">
                            {{-- <li>
                                <a href="">Add Devices</a>
                            </li> --}}
                            <li @if(Session::get('page') == "view-tags") class="active" @endif>
                                <a href="{{ url('/admin/view-tags') }}">View Tags</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Session::get('page') == "add-locations" || Session::get('page') == "view-locations") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">input</i>
                            <span>Location</span>
                        </a>
                        <ul class="ml-menu">
                            <li @if(Session::get('page') == "add-locations") class="active" @endif>
                                <a href="{{ url('/admin/add-locations') }}">Add Location</a>
                            </li>
                            <li @if(Session::get('page') == "view-locations") class="active" @endif>
                                <a href="{{ url('/admin/view-locations') }}">View Location</a>
                            </li>
                        </ul>
                    </li>
                    <li @if(Session::get('page') == "view-logs") class="active" @endif>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">fingerprint</i>
                            <span>Logs</span>
                        </a>
                        <ul class="ml-menu">
                            {{-- <li>
                                <a href="">Add Recipes</a>
                            </li> --}}
                            <li @if(Session::get('page') == "view-logs") class="active" @endif>
                                <a href="{{ url('/admin/view-logs') }}">View Logs</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->

            @include('layouts.admin_layout.admin_footer')

        </aside>
        <!-- #END# Left Sidebar -->
    </section>
