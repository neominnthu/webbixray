<!--begin::Sidebar Menu-->
<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
<!--User Management-->
    @can(['user-list', 'role-list', 'permission-list'])
        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>
                User Management
                <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                @can('role-list')
                <li class="nav-item">
                    <a href="{{route('roles.index')}}" class="nav-link active">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Roles</p>
                    </a>
                </li>
                @endcan

            @can('permission-list')
                <li class="nav-item">
                    <a href="{{route('permissions.index')}}" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Permissions</p>
                    </a>
                </li>
            @endcan
                @can('user-list')
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Users</p>
                    </a>
                </li>
                @endcan

            </ul>
        </li>
    @endcan
<!--End user Management-->
<!--Wallet Management-->
    @can('')
        <li class="nav-item ">
            <a href="#" class="nav-link ">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>
                Wallet Management
                <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">


                <li class="nav-item">
                    <a href="#" class="nav-link ">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Transaction Lists</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>My Wallet</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>My Transaction</p>
                    </a>
                </li>


            </ul>
        </li>
    @endcan
<!--End Wallet Management-->

@can('')
<li class="nav-item ">
    <a href="#" class="nav-link ">
    <i class="nav-icon bi bi-speedometer"></i>
    <p>
        Tasks Management
        <i class="nav-arrow bi bi-chevron-right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">


        <li class="nav-item">
            <a href="#" class="nav-link ">
            <i class="nav-icon bi bi-circle"></i>
            <p>Transaction Lists</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link ">
            <i class="nav-icon bi bi-circle"></i>
            <p>My Wallet</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link ">
            <i class="nav-icon bi bi-circle"></i>
            <p>My Transaction</p>
            </a>
        </li>


    </ul>
</li>
@endcan

</ul>
<!--end::Sidebar Menu-->
