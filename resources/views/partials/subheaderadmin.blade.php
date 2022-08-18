<div class="subheader">
	<h1 class="subheader-title">
		<i class='subheader-icon fal fa-chart-area'></i> {{ $breadcrumb ?? '' }}
		<small>
		</small>
	</h1>
	@for ($i=3;$i<count($prData);$i++)
	<div class="subheader-block d-lg-flex align-items-center">
		<div class="d-inline-flex flex-column justify-content-center mr-3" data-toggle="tooltip" title data-original-title="Alokasi Pagu tahun {{ $prData[$i]->tahun }}">
			<span class="fw-300 fs-xs d-block opacity-50">
				<small>PAGU | {{ $prData[$i]->tahun }}</small>
			</span>
			<span class="fw-500 fs-xl d-block color-primary-500">
				Rp {{ number_format($prData[$i]->pagu,0,",",".") }}
		</div>
		<span class="sparklines hidden-xl-down" sparkType="bar" sparkBarColor="#886ab5" sparkHeight="32px" sparkBarWidth="5px" values="3,4,3,6,7,3,3,6,2,6,4"></span>
	</div>
	<div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
		<div class="d-inline-flex flex-column justify-content-center mr-3" data-toggle="tooltip" title data-original-title="Realisasi tahun {{ $prData[$i]->tahun }}">
			<span class="fw-300 fs-xs d-block opacity-50">
				<small>REALISASI | {{ $prData[$i]->tahun }}</small>
			</span>
			<span class="fw-500 fs-xl d-block color-danger-500">
				Rp {{ number_format($prData[$i]->realisasi,0,",",".") }}
			</span>
		</div>
		<span class="sparklines hidden-xl-down" sparkType="bar" sparkBarColor="#fe6bb0" sparkHeight="32px" sparkBarWidth="5px" values="1,4,3,6,5,3,9,6,5,9,7"></span>
	</div>
	@endfor
</div>