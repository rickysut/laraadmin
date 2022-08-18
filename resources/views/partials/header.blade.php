<!-- BEGIN Page Header -->
<header class="page-header" role="banner">
	<!-- we need this logo when user switches to nav-function-top -->
	<div class="page-logo">
		<a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
			<img src="{{ asset('img/logo-icon.png') }}" alt="{{ trans('panel.site_title') }} WebApp" aria-roledescription="logo">
			<span class="page-logo-text mr-1">{{ trans('panel.site_title') }} WebApp</span>
			<span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
			<i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
		</a>
	</div>
	<!-- DOC: nav menu layout change shortcut -->
	<div class="hidden-md-down dropdown-icon-menu position-relative">
		<a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
			<i class="ni ni-menu"></i>
		</a>
		<ul>
			<li>
				<a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
					<i class="ni ni-minify-nav"></i>
				</a>
			</li>
			<li>
				<a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
					<i class="ni ni-lock-nav"></i>
				</a>
			</li>
		</ul>
	</div>
	<!-- DOC: mobile button appears during mobile width -->
	<div class="hidden-lg-up">
		<a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
			<i class="ni ni-menu"></i>
		</a>
	</div>
	<div class="search">
		<select class="searchable-field form-control"></select>
	</div>
	<div class="ml-auto d-flex">
		<!-- activate app search icon (mobile) -->
		<div class="hidden-sm-up">
			<a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Search">
				<i class="fal fa-search"></i>
			</a>
		</div>
		<!-- app settings -->
		<div class="hidden-md-down">
			<a href="#" class="header-icon" data-toggle="modal" title="Penyesuaian" data-target=".js-modal-settings">
				<i class="fal fa-cog"></i>
			</a>
		</div>
		<!-- app shortcuts -->
		<div>
			<a href="#" class="header-icon" data-toggle="dropdown" title="Fitur Lainnya">
				<i class="fal fa-cube"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-animated w-auto h-auto">
				<div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center rounded-top">
					<h4 class="m-0 text-center color-white">
						Pintasan Cepat
						<small class="mb-0 opacity-80">Aplikasi & Addons</small>
					</h4>
				</div>
				<div class="custom-scroll h-100">
					<ul class="app-list">
						<li>
							<a href="#" class="app-list-item hover-white">
								<span class="icon-stack">
									<i class="base-2 icon-stack-3x color-primary-600"></i>
									<i class="base-3 icon-stack-2x color-primary-700"></i>
									<i class="ni ni-settings icon-stack-1x text-white fs-lg"></i>
								</span>
								<span class="app-list-name">
									Segera Hadir!
								</span>
							</a>
						</li>
						<li>
							<a href="#" class="app-list-item hover-white">
								<span class="icon-stack">
									<i class="base-2 icon-stack-3x color-primary-400"></i>
									<i class="base-10 text-white icon-stack-1x"></i>
									<i class="ni md-profile color-primary-800 icon-stack-2x"></i>
								</span>
								<span class="app-list-name">
									Segera Hadir!
								</span>
							</a>
						</li>
						<li>
							<a href="#" class="app-list-item hover-white">
								<span class="icon-stack">
									<i class="base-9 icon-stack-3x color-success-400"></i>
									<i class="base-2 icon-stack-2x color-success-500"></i>
									<i class="ni ni-shield icon-stack-1x text-white"></i>
								</span>
								<span class="app-list-name">
									Segera Hadir!
								</span>
							</a>
						</li>
						<li>
							<a href="#" class="app-list-item hover-white">
								<span class="icon-stack">
									<i class="base-18 icon-stack-3x color-info-700"></i>
									<span class="position-absolute pos-top pos-left pos-right color-white fs-md mt-2 fw-400"><script>document.write(new Date().getFullYear())</script></span>
								</span>
								<span class="app-list-name">
									Segera Hadir!
								</span>
							</a>
						</li>
						<li>
							<a href="#" class="app-list-item hover-white">
								<span class="icon-stack">
									<i class="base-7 icon-stack-3x color-info-500"></i>
									<i class="base-7 icon-stack-2x color-info-700"></i>
									<i class="ni ni-graph icon-stack-1x text-white"></i>
								</span>
								<span class="app-list-name">
									Segera Hadir!
								</span>
							</a>
						</li>
						<li>
							<a href="#" class="app-list-item hover-white">
								<span class="icon-stack">
									<i class="base-4 icon-stack-3x color-danger-500"></i>
									<i class="base-4 icon-stack-1x color-danger-400"></i>
									<i class="ni ni-envelope icon-stack-1x text-white"></i>
								</span>
								<span class="app-list-name">
									Segera Hadir!
								</span>
							</a>
						</li>
						<li>
							<a href="#" class="app-list-item hover-white">
								<span class="icon-stack">
									<i class="base-4 icon-stack-3x color-fusion-400"></i>
									<i class="base-5 icon-stack-2x color-fusion-200"></i>
									<i class="base-5 icon-stack-1x color-fusion-100"></i>
									<i class="fal fa-keyboard icon-stack-1x color-info-50"></i>
								</span>
								<span class="app-list-name">
									Segera Hadir!
								</span>
							</a>
						</li>
						<li>
							<a href="#" class="app-list-item hover-white">
								<span class="icon-stack">
									<i class="base-16 icon-stack-3x color-fusion-500"></i>
									<i class="base-10 icon-stack-1x color-primary-50 opacity-30"></i>
									<i class="base-10 icon-stack-1x fs-xl color-primary-50 opacity-20"></i>
									<i class="fal fa-dot-circle icon-stack-1x text-white opacity-85"></i>
								</span>
								<span class="app-list-name">
									Segera Hadir!
								</span>
							</a>
						</li>
						<li>
							<a href="#" class="app-list-item hover-white">
								<span class="icon-stack">
									<i class="base-19 icon-stack-3x color-primary-400"></i>
									<i class="base-7 icon-stack-2x color-primary-300"></i>
									<i class="base-7 icon-stack-1x fs-xxl color-primary-200"></i>
									<i class="base-7 icon-stack-1x color-primary-500"></i>
									<i class="fal fa-globe icon-stack-1x text-white opacity-85"></i>
								</span>
								<span class="app-list-name">
									Segera Hadir!
								</span>
							</a>
						</li>
						<li>
							<a href="#" class="app-list-item hover-white">
								<span class="icon-stack">
									<i class="base-5 icon-stack-3x color-success-700 opacity-80"></i>
									<i class="base-12 icon-stack-2x color-success-700 opacity-30"></i>
									<i class="fal fa-comment-alt icon-stack-1x text-white"></i>
								</span>
								<span class="app-list-name">
									Segera Hadir!
								</span>
							</a>
						</li>
						<li>
							<a href="#" class="app-list-item hover-white">
								<span class="icon-stack">
									<i class="base-5 icon-stack-3x color-warning-600"></i>
									<i class="base-7 icon-stack-2x color-warning-800 opacity-50"></i>
									<i class="fal fa-phone icon-stack-1x text-white"></i>
								</span>
								<span class="app-list-name">
									Segera Hadir!
								</span>
							</a>
						</li>
						<li>
							<a href="#" class="app-list-item hover-white">
								<span class="icon-stack">
									<i class="base-6 icon-stack-3x color-danger-600"></i>
									<i class="fal fa-chart-line icon-stack-1x text-white"></i>
								</span>
								<span class="app-list-name">
									Segera Hadir!
								</span>
							</a>
						</li>
						<li class="w-100">
							<a href="#" data-toggle="tooltip" title data-original-title="coming soon" data-placement="auto" class="btn btn-default mt-4 mb-2 pr-5 pl-5"> tampil semua... </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- app user menu -->
		<div>
			<a href="#" data-toggle="dropdown" title="{{ Auth::user()->name }}" class="header-icon d-flex align-items-center justify-content-center ml-2">
				<img src="{{ asset('img/favicon.png') }}" class="profile-image rounded-circle" alt="{{ Auth::user()->name }}">
				<!-- you can also add username next to the avatar with the codes below:
				<span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">{{ Auth::user()->name }}</span>
				<i class="ni ni-chevron-down hidden-xs-down"></i> -->
			</a>
			<div class="dropdown-menu dropdown-menu-animated dropdown-lg">
				<div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
					<div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
						<span class="mr-2">
							<img src="{{ asset('img/favicon.png') }}" class="rounded-circle profile-image" alt="Dr. Codex Lantern">
						</span>
						<div class="info-card-text">
							<div class="fs-lg text-truncate text-truncate-lg">{{ Auth::user()->name }}</div>
							<span class="text-truncate text-truncate-md opacity-80">{{ Auth::user()->email }}</span>
						</div>
					</div>
				</div>
				<div class="dropdown-divider m-0"></div>
				<a href="#" class="dropdown-item" data-action="app-reset">
					<span data-i18n="drpdwn.reset_layout">Ulang Tataletak</span>
				</a>
				<a href="#" class="dropdown-item" data-toggle="modal" data-target=".js-modal-settings">
					<span data-i18n="drpdwn.settings">Penyesuaian</span>
				</a>
				<div class="dropdown-divider m-0"></div>
				<a href="#" class="dropdown-item" data-action="app-fullscreen">
					<span data-i18n="drpdwn.fullscreen">Layar Penuh</span>
					<i class="float-right text-muted fw-n">F11</i>
				</a>
				<a href="#" class="dropdown-item" data-action="app-print">
					<span data-i18n="drpdwn.print">Cetak</span>
					<i class="float-right text-muted fw-n">Ctrl + P</i>
				</a>
				<div class="dropdown-multilevel dropdown-multilevel-left">
					<div class="dropdown-item" data-i18n="drpdwn.lang">
						Bahasa
					</div>
					<div class="dropdown-menu">
						<a href="#?lang=id" class="dropdown-item {{ app()->getLocale() == 'id' ? "active" : "" }}" data-action="lang" data-lang="id">Bahasa (ID)</a>
						<a href="#?lang=en" class="dropdown-item {{ app()->getLocale() == 'en' ? "active" : "" }}" data-action="lang" data-lang="en">English (US)</a>
					</div>
				</div>
				<div class="dropdown-divider m-0"></div>
				<a class="dropdown-item fw-500 pt-3 pb-3" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" href="{{ trans('global.logout') }}">
					<span data-i18n="drpdwn.page-logout">Keluar</span>
					<span class="float-right fw-n">&commat;{{ Auth::user()->name }}</span>
				</a>
			</div>
		</div>
	</div>
</header>