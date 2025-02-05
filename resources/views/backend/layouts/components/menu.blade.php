<!--begin::Sidebar Menu-->
<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">


    <li class="nav-item ">
        <a href="{{route('filemanager.index')}}" class="nav-link ">
        <i class="nav-icon bi bi-speedometer"></i>
        <p>
            File manger
        </p>
        </a>
    </li>



<!--User Management-->
    @can(['user-list', 'role-list', 'permission-list'])
        <li class="nav-item  {{ request()->is('permissions*') || request()->is('roles*') || request()->is('users*')   ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('permissions*') || request()->is('roles*') || request()->is('users*')   ? 'menu-open' : '' }}">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>
                User Management
                <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                @can('role-list')
                <li class="nav-item">
                    <a href="{{route('roles.index')}}" class="nav-link {{request()->is('roles*')  ? 'active' : '' }}">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Roles</p>
                    </a>
                </li>
                @endcan

            @can('permission-list')
                <li class="nav-item">
                    <a href="{{route('permissions.index')}}" class="nav-link {{request()->is('permissions*')  ? 'active' : '' }}">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Permissions</p>
                    </a>
                </li>
            @endcan
                @can('user-list')
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link {{request()->is('users*')  ? 'active' : '' }}">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Users</p>
                    </a>
                </li>
                @endcan

            </ul>
        </li>
    @endcan
<!--End user Management-->





    <li class="nav-item ">
        <a href="{{route('modules.index')}}" class="nav-link ">
        <i class="nav-icon bi bi-speedometer"></i>
        <p>
            Modules
        </p>
        </a>
    </li>

    <li class="nav-item ">
        <a href="{{route('settings.index')}}" class="nav-link ">
        <i class="nav-icon bi bi-speedometer"></i>
        <p>
            SETTING
        </p>
        </a>
    </li>
</ul>
<!--end::Sidebar Menu-->
