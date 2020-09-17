<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link active"><i class="fas fa-home"></i>&nbsp Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="dropdown"><i class="fas fa-address-book"></i>&nbsp Sample Menu Item</a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            @can('setup_view')
                                <a href="#" class="dropdown-item">Sub Menu1</a>
                            @endcan
                            @can('setup_view')
                                <a href="#" class="dropdown-item">Sub Menu2</a>
                            @endcan
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="dropdown"><i class="fas fa-users"></i>&nbsp Users</a>
                        <div class="dropdown-menu dropdown-menu-arrow">
                            @can('permissions_manage')
                                <a href="{{ route('admin.permissions.index') }}" class="dropdown-item ">Permissions</a>
                            @endcan

                            @can('roles_manage')
                                <a href="{{ route('admin.roles.index') }}" class="dropdown-item ">Roles</a>
                            @endcan

                            @can('users_manage')
                                <a href="{{ route('admin.users.index') }}" class="dropdown-item ">Users</a>
                            @endcan
                        </div>
                    </li>
                    @can('setup_view')
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="dropdown"><i class="fas fa-cogs"></i>&nbsp Setup</a>
                            <div class="dropdown-menu dropdown-menu-arrow">

                            </div>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
</div>
