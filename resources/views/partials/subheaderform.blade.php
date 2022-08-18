<div class="subheader">
	<h1 class="subheader-title">
		<i class='subheader-icon fal fa-table'></i> {{ $breadcrumb ?? '' }}
		<small>
		</small>
	</h1>
	<div class="subheader-block d-lg-flex align-items-center">
		<div class="d-inline-flex flex-column justify-content-center mr-3 text-right" data-toggle="tooltip" title data-original-title="waktu terakhir data diperbaharusi">
			<span class="fw-300 fs-xs d-block opacity-50">
				<small>{{ trans('smartadmin.today') }}</small>
			</span>
			<span class="fw-500 fs-xl d-block color-danger-500">
				<span class="text-muted text-truncate text-truncate-sm js-get-date"></span>
		</div>
		<span class="sparklines hidden-lg-down" sparkType="bar" sparkBarColor="#886ab5" sparkHeight="32px" sparkBarWidth="5px" values="3,4,3,6,7,3,3,6,2,6,4"></span>
	</div>
</div>