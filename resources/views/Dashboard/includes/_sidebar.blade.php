@php
    $segment = Request::segment(3);
    $route = Route::currentRouteName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left">
          <img src="{{ asset(adminurl()->avatar) }}" style="width:40px;height:40px;border-radius:50%" class="" alt="User Image">
        </div>
        <div class="pull-left info" style="margin-top:10px">
          <p> {{ adminurl()->first_name }} {{ adminurl()->last_name }}</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

        <!--<li class="header">MAIN NAVIGATION</li>-->
        <li class="{{ $route == 'admin.index' ? 'active' : '' }}">
            <a href="{{ route('admin.index') }}"><i class="fa fa-dashboard text-aqua"></i> <span> {{ trans('backend.dashboard') }}</span></a>
        </li>
      
        <!-- Admins -->
        <li class="{{ $segment == 'admins' ? 'active' : '' }} users-active-li roles-list-active-li role-active-li treeview">
            <a href="users.html">
                <i class="fa fa-star"></i> <span>{{ trans('backend.admins') }}</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route == 'admins.index' ? 'active' : '' }}">
                    <a href="{{ route('admins.index') }}">
                        <i class="fa fa-angle-double-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i>
                        <span>{{ trans('backend.admins') }}</span>
                    </a>
                </li>
                <li class="{{ $route == 'admins.create' ? 'active' : '' }}">
                    <a href="{{ route('admins.create') }}">
                        <i class="fa fa-angle-double-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i>
                        <span>{{ trans('backend.create_new') }}</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Categories -->
        <li class="{{ $segment == 'categories' ? 'active' : '' }} users-active-li roles-list-active-li role-active-li treeview">
            <a href="users.html">
                <i class="fa fa-tags"></i> <span>{{ trans('backend.contact_categories') }}</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route == 'categories.index' ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}">
                        <i class="fa fa-angle-double-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i>
                        <span>{{ trans('backend.categories') }}</span>
                    </a>
                </li>
                <li class="{{ $route == 'categories.create' ? 'active' : '' }}">
                    <a href="{{ route('categories.create') }}">
                        <i class="fa fa-angle-double-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i>
                        <span>{{ trans('backend.create_new') }}</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Contacts -->
        <li class="{{ $segment == 'contacts' ? 'active' : '' }} users-active-li roles-list-active-li role-active-li treeview">
            <a href="users.html">
                <i class="fa fa-phone-square"></i> <span>{{ trans('backend.contacts') }}</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ $route == 'contacts.index' ? 'active' : '' }}">
                    <a href="{{ route('contacts.index') }}">
                        <i class="fa fa-angle-double-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i>
                        <span>{{ trans('backend.contacts') }}</span>
                    </a>
                </li>
                <li class="{{ $route == 'contacts.create' ? 'active' : '' }}">
                    <a href="{{ route('contacts.create') }}">
                        <i class="fa fa-angle-double-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i>
                        <span>{{ trans('backend.create_new') }}</span>
                    </a>
                </li>
            </ul>
        </li>

        
        
        
           
                
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>