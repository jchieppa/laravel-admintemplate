 <div class="container">
        <div class="row align-items-center">
            <div class="col-lg order-lg-first">
                <nav class="navbar navbar-expand-sm ">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav nav-tabs mx-auto border-0 flex-column flex-lg-row">
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-home"></i>&nbsp Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="dropdown"><i class="fas fa-sms"></i>&nbsp Sms</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    @can('sms_send')
                                        <a href="{{ route('admin.sms.create' ) }}" class="dropdown-item">New sms to all parents</a>
                                    @endcan
                                    @can('sms_send')
                                        <a href="{{ route('admin.sms.teacher.create' ) }}" class="dropdown-item">New sms by teacher's class</a>
                                    @endcan
                                    @can('sms_send')
                                        <a href="{{ route('admin.sms.multi.create' ) }}" class="dropdown-item">New sms to specific parents</a>
                                    @endcan
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="dropdown"><i class="fas fa-address-book"></i>&nbsp Contacts</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    @can('parents_view')
                                        <a href="{{ route('admin.parents.index') }}" class="dropdown-item">Parents</a>
                                    @endcan
                                    @can('teachers_view')
                                        <a href="{{ route('admin.teachers.index' ) }}" class="dropdown-item">Teachers</a>
                                    @endcan
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}" class="nav-link" data-toggle="dropdown"><i class="fas fa-users"></i>&nbsp Users</a>
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
                            @can('sms_view')
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="dropdown"><i class="fas fa-cogs"></i>&nbsp Logs</a>
                                    <div class="dropdown-menu dropdown-menu-arrow">
                                            <a href="{{ route('admin.sms.index') }}" class="dropdown-item">View sms logs</a>
                                    </div>
                                </li>
                            @endcan
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </div>




