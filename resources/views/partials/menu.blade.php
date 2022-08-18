<aside class="page-sidebar">
    <div class="page-logo">
		<a href="/" class="page-logo-link press-scale-down d-flex align-items-center position-relative">
			<img src="{{ asset('img/logo-icon.png') }}" alt="{{ trans('panel.site_title') }}" aria-roledescription="logo">
			<span class="page-logo-text mr-1">{{ trans('panel.site_title') }}</span>
			<!--span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
			<i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i--->
		</a>
	</div>
    <!-- BEGIN PRIMARY NAVIGATION -->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <div class="nav-filter">
			<div class="position-relative">
				<input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
				<a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
					<i class="fal fa-chevron-up"></i>
				</a>
			</div>
		</div>
        <div class="info-card">
			<img src="{{ asset('img/cover-8-lg.png') }}" class="cover" alt="cover" style="max-width: 100%;" >
			<a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input" >
				<i class="fal fa-angle-down"></i>
			</a>
		</div>
        <ul id="js-nav-menu" class="nav-menu">
            @can('dashboard_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
        @endcan
        
        
        @can('master_data_access')
        <li class="nav-title" data-i18n="nav.master_data">DATA INDUK (master)</li>
            <li>
                @can('partner_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route("admin.partners.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/partners") || request()->is("admin/partners/*") ? "c-active" : "" }}">
                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.partner.title') }}
                        </a>
                    </li>
                @endcan
                @can('coa_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route("admin.coas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/coas") || request()->is("admin/coas/*") ? "c-active" : "" }}">
                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.coa.title') }}
                        </a>
                    </li>
                @endcan
            </li>
        @endcan
        @can('user_management_access')
        <li class="nav-title" data-i18n="nav.administation">ADMINISTRATOR</li>
        <li class="{{ request()->is("admin/permissions*")  || request()->is("admin/roles*") || request()->is("admin/users*") || request()->is("admin/audit-logs*")  ? "active open" : "" }}">
            <a href="#" title="User Management" data-filter-tags="{{ strtolower(trans('cruds.userManagement.title')) }}">
                <i class="fal fal fa-users"></i>
                <span class="nav-link-text" data-i18n="nav.administation_sub1">{{ trans('cruds.userManagement.title') }}</span>
            </a>
            <ul>
                @can('permission_access')
                    <li class="c-sidebar-nav-item {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                        <a href="{{ route("admin.permissions.index") }}" title="Permission" data-filter-tags="{{ strtolower(trans('cruds.permission.title')) }}">
                            <i class="fa-fw fal fa-unlock-alt c-sidebar-nav-icon"></i>
                            <span class="nav-link-text" data-i18n="nav.administation_sub1_menu1">{{ trans('cruds.permission.title') }}</span>
                        </a>
                    </li>
                @endcan
                @can('role_access')
                    <li class="c-sidebar-nav-item {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                        <a href="{{ route("admin.roles.index") }}" title="Roles" data-filter-tags="{{ strtolower(trans('cruds.role.title')) }}">
                            <i class="fa-fw fal fa-briefcase c-sidebar-nav-icon"></i>
                            <span class="nav-link-text" data-i18n="nav.administation_sub1_menu2">{{ trans('cruds.role.title') }}</span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                    <li class="c-sidebar-nav-item {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                        <a href="{{ route("admin.users.index") }}" title="User" data-filter-tags="{{ strtolower(trans('cruds.user.title')) }}">
                            <i class="fa-fw fal fa-user c-sidebar-nav-icon"></i>
                            <span class="nav-link-text" data-i18n="nav.administation_sub1_menu3">{{ trans('cruds.user.title') }}</span>
                        </a>
                    </li>
                @endcan
                @can('audit_log_access')
                    <li class="c-sidebar-nav-item {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                        <a href="{{ route("admin.audit-logs.index") }}" title="Audit Log" data-filter-tags="{{ strtolower(trans('cruds.auditLog.title')) }}">
                            <i class="fa-fw fal fa-file-alt c-sidebar-nav-icon"></i>
                            <span class="nav-link-text" data-i18n="nav.administation_sub1_menu4">{{ trans('cruds.auditLog.title') }}</span>
                        </a>
                    </li>
                @endcan
                
            </ul>
        </li>
        @endcan
        
        @can('setting_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setting.title') }}
                </a>
            </li>
        @endcan
        
        
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>    
        </ul>
    </nav>
    <!-- END PRIMARY NAVIGATION -->
	<!-- NAV FOOTER -->
	<div class="nav-footer shadow-top">
		<a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
			<i class="ni ni-chevron-right"></i>
			<i class="ni ni-chevron-right"></i>
		</a>
		<ul class="list-table m-auto nav-footer-buttons">
			<li>
				<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat (coming soon)">
					<i class="fal fa-comments"></i>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="chat bantuan (coming soon)">
					<i class="fal fa-life-ring"></i>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="buat panggilan (coming soon)">
					<i class="fal fa-phone"></i>
				</a>
			</li>
		</ul>
	</div> <!-- END NAV FOOTER -->
</aside>


