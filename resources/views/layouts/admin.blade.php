<!DOCTYPE html>
<!-- 
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.5.1
Author: Sunnyat A.
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0?ref=myorange
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            {{ trans('panel.site_title') }}
        </title>
        <meta name="description" content="Page Title">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- smartadmin base css -->
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/vendors.bundle.css') }}">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/app.bundle.css') }}">
        <link id="mytheme" rel="stylesheet" media="screen, print" href="#">
        <link id="myskin" rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/skins/skin-master.css') }}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/logo-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logo-icon.png') }}">
        <link rel="mask-icon" href="{{ asset('img/logo-icon.png') }}" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/miscellaneous/reactions/reactions.css') }}">
		
        <!-- You can add your own stylesheet here to override any styles that comes before it
		<link rel="stylesheet" media="screen, print" href="css/your_styles.css">-->
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/datagrid/datatables/datatables.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/formplugins/bootstrap-datepicker/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/formplugins/dropzone/dropzone.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/formplugins/select2/select2.bundle.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/formplugins/summernote/summernote.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/miscellaneous/nestable/nestable.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/miscellaneous/reactions/reactions.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/skins/skin-master.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/statistics/c3/c3.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/statistics/chartist/chartist.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/statistics/chartjs/chartjs.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-light.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-regular.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-solid.css') }}">
        <link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-brands.css') }}">
		
		<!-- coreui -->
		<link href="{{ asset('css/ajax/all.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/datatables/buttons.dataTables.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/datatables/select.dataTables.min.css') }}" rel="stylesheet" />
		
		
		<meta name="csrf-token" content="{{ csrf_token() }}">
		@yield('styles')
    </head>
	<!--
		ditambahkan class fixed footer "footer-function-fixed"
		pada body class sebagai default layout antisipasi
		saat tampil di android webview
	-->
	<body class="mod-bg-1 mod-nav-link footer-function-fixed">
		<script src="{{ asset('js/smartadmin/pagesetting.js') }}"></script>
		<!-- begin page wrapper -->
		<div class="page-wrapper">
            <div class="page-inner">
				<!-- begin sidebar -->
				@include('partials.menu')
				<!-- end sidebar -->
				<div class="page-content-wrapper">
					<!-- begin page header -->
					@include('partials.header')
					<!-- end page header -->
					<!-- begin page content -->
					<main id="js-page-content" role="main" class="page-content">
						<!-- start alert pesan -->
						@if(session('message'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fal fa-times-circle"></i></span>
							</button>
							<strong>INFO!</strong> {{ session('message') }}.
						</div>
						@endif
						<!-- end alert pesan -->
						<!-- start alert error -->
						@if($errors->count() > 0)
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fal fa-times-circle"></i></span>
							</button>
							<strong>PERHATIAN!</strong>
							<ul class="list-unstyled">
								@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
						<!-- end alert error -->
						@yield('content')
					</main>
					<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
					<!-- end page content -->
						
					<!-- begin page footer -->
					@include('partials.footer')
					<!-- end page footer -->
					<!-- begin shortcut -->
					@include('partials.shortcut')
					<!-- end shortcut -->
				</div>
			</div>
		</div>
		<form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
		<!-- end page wrapper -->
		<!-- begin quick menu -->
		@include('partials.quickmenu')
		<!-- end quick menu -->
		
		<!-- base vendor bundle: 
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations 
				+ pace.js (recommended)
				+ jquery.js (core)
				+ jquery-ui-cust.js (core)
				+ popper.js (core)
				+ bootstrap.js (core)
				+ slimscroll.js (extension)
				+ app.navigation.js (core)
				+ ba-throttle-debounce.js (core)
				+ waves.js (extension)
				+ smartpanels.js (extension)
				+ src/../jquery-snippets.js (core)
				{ { asset('js/vendors.bundle.js') }}
				{ { asset('js/app.bundle.js') }}
				{ { asset('js/smartadmin/datagrid/datatables/datatables.bundle.js') }}
		-->
		<!-- Smartadmin core -->
		<script src="{{ asset('js/vendors.bundle.js') }}"></script>
        <script src="{{ asset('js/app.bundle.js') }}"></script>
		<!-- Smartadmin plugin -->
		<script src="{{ asset('js/smartadmin/datagrid/datatables/datatables.bundle.js') }}"></script>
		<script src="{{ asset('js/moment/moment.min.js') }}"></script>
		<script src="{{ asset('js/smartadmin/formplugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
		<script src="{{ asset('js/smartadmin/formplugins/dropzone/dropzone.js') }}"></script>
		<script src="{{ asset('js/smartadmin/formplugins/select2/select2.bundle.js') }}"></script>
		<script src="{{ asset('js/smartadmin/formplugins/summernote/summernote.js') }}"></script>
		<!-- Smartadmin misc -->
		<script src="{{ asset('js/smartadmin/miscellaneous/nestable/nestable.js') }}"></script>
		<!-- smartadmin statistics -->
		<script src="{{ asset('js/smartadmin/statistics/c3/c3.js') }}"></script>
		<script src="{{ asset('js/smartadmin/statistics/chartist/chartist.js') }}"></script>
		<script src="{{ asset('js/smartadmin/statistics/chartjs/chartjs.bundle.js') }}"></script>
		<script src="{{ asset('js/smartadmin/statistics/d3/d3.js') }}"></script>
		<script src="{{ asset('js/smartadmin/statistics/echart/echarts.min.js') }}"></script>
		<script src="{{ asset('js/smartadmin/statistics/easypiechart/easypiechart.bundle.js') }}"></script>
		<script src="{{ asset('js/smartadmin/statistics/sparkline/sparkline.bundle.js') }}"></script>
		
		<!-- coreui -->
		
		<script src="{{ asset('js/pdfmake/pdfmake.min.js') }}"></script>
		<script src="{{ asset('js/pdfmake/vfs_fonts.js') }}"></script>
		<script src="{{ asset('js/jszip/jszip.min.js') }}"></script> 
		
		{{-- <script type="text/javascript">
            /* Activate smart panels */
            $('#js-page-content').smartPanel();
			
        </script> --}}
		<!-- search bar -->
		<script>
			console.log("Init Language");
			if (!$.i18n) {
				initApp.loadScript("/js/i18n/i18n.js", 
					function activateLang () {
						$.i18n.init({
							resGetPath: '/media/data/__lng__.json',
							load: 'unspecific',
							fallbackLng: false,
							lng: '{{ app()->getLocale() }}'
						}, function (t){
							$('[data-i18n]').i18n();
							$('[data-lang]').removeClass('active');
							$('[data-lang="{{ app()->getLocale() }}"]').addClass('active');
							console.log("Init language to: " + "{{ app()->getLocale() }}");
						});								
						
					}

				);
				
			} else {
				i18n.setLng('{{ app()->getLocale() }}', function(){
					$('[data-i18n]').i18n();
					$('[data-lang]').removeClass('active');
					$('[data-lang="{{ app()->getLocale() }}"]').addClass('active');	
					console.log("setting language to: " + "{{ app()->getLocale() }}");
				});
				
			}
			
			$(function() {
				let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
				let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
				let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
				let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
				let printButtonTrans = '{{ trans('global.datatables.print') }}'
				let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
				let selectAllButtonTrans = '{{ trans('global.select_all') }}'
				let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

				let languages = {
					'en': '{{ url("lang/English.json")  }}',
					'id': '{{ url("lang/Indonesian.json") }}'
				};

  				$.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
  				$.extend(true, $.fn.dataTable.defaults, {
					language: {
					url: languages['{{ app()->getLocale() }}']
					},
					columnDefs: [{
						orderable: false,
						className: 'select-checkbox',
						targets: 0
					}, {
						orderable: false,
						searchable: false,
						targets: -1
					}],
					select: {
					style:    'multi+shift',
					selector: 'td:first-child'
					},
					order: [],
					scrollX: true,
					pageLength: 100,
					dom: 
					"<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-8 d-flex'B><'col-sm-12 col-md-2 d-flex justify-content-end'f>>" +
					"<'row'<'col-sm-12 col-md-12'tr>>" +
					"<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>",
					/*dom: "<'row align-items-center mb-3 justify-content-start'<'col-sm-12 col-md-2  align-items-center justify-content-start'f><'col-sm-12 col-md-3 d-flex align-items-center justify-content-end 'l><'col-sm-12 col-md-7 d-flex align-items-center justify-content-end'B>>" +
		"<'row style="width:100%"'<'col-sm-12 col-md-12't>>" +
		"<'row align-items-center'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",*/
					buttons: [
					{
						extend: 'selectAll',
						className: 'btn-primary btn-sm mr-1',
						text: selectAllButtonTrans,
						exportOptions: {
						columns: ':visible'
						},
						action: function(e, dt) {
						e.preventDefault()
						dt.rows().deselect();
						dt.rows({ search: 'applied' }).select();
						}
					},
					{
						extend: 'selectNone',
						className: 'btn-outline-danger btn-sm mr-1',
						text: selectNoneButtonTrans,
						exportOptions: {
						columns: ':visible'
						}
					},
					/*{
						extend: 'copyHtml5',
						text: copyButtonTrans,
						titleAttr: 'Copy to clipboard',
						className: 'btn-outline-primary btn-sm mr-1',
						exportOptions: {
						columns: ':visible'
						}
					},*/
					{
						extend: 'csvHtml5',
						text: csvButtonTrans,
						titleAttr: 'Generate CSV',
						className: 'btn-outline-primary btn-sm mr-1',
						exportOptions: {
						columns: ':visible'
						}
					},
					{
						extend: 'excelHtml5',
						className: 'btn-outline-success btn-sm mr-1',
						text: excelButtonTrans,
						titleAttr: 'Generate Excel',
						exportOptions: {
						columns: ':visible'
						}
					},
					{
						extend: 'pdfHtml5',
						className: 'btn-outline-danger btn-sm mr-1',
						text: pdfButtonTrans,
						titleAttr: 'Generate PDF',
						exportOptions: {
						columns: ':visible'
						}
					},
					{
						extend: 'print',
						className: 'btn-outline-primary btn-sm',
						text: printButtonTrans,
						titleAttr: 'Print Table',
						exportOptions: {
						columns: ':visible'
						}
					},
					/*{
						extend: 'colvis',
						className: 'mr-sm-3',
						text: colvisButtonTrans,
						titleAttr: 'Col visibility',
						exportOptions: {
						columns: ':visible'
						}
					}*/
					]
				});

  				$.fn.dataTable.ext.classes.sPageButton = '';
			});
		$(document).ready(function() {
		  $('.searchable-field').select2({
			minimumInputLength: 3,
			ajax: {
			  url: '{{ route("admin.globalSearch") }}',
			  dataType: 'json',
			  type: 'GET',
			  delay: 200,
			  data: function(term) {
				return {
				  search: term
				};
			  },
			  results: function(data) {
				return {
				  data
				};
			  }
			},
			escapeMarkup: function(markup) {
			  return markup;
			},
			templateResult: formatItem,
			templateSelection: formatItemSelection,
			placeholder: "{{ trans('global.search') }} ...",
			language: {
			  inputTooShort: function(args) {
				var remainingChars = args.minimum - args.input.length;
				var translation = "{{ trans('global.search_input_too_short') }}";

				return translation.replace(':count', remainingChars);
			  },
			  errorLoading: function() {
				return "{{ trans('global.results_could_not_be_loaded') }}";
			  },
			  searching: function() {
				return "{{ trans('global.searching') }}";
			  },
			  noResults: function() {
				return "{{ trans('global.no_results') }}";
			  },
			}

		  });

		  function formatItem(item) {
			if (item.loading) {
			  return "{{ trans('global.searching') }}...";
			}
			var markup = "<div class='searchable-link' href='" + item.url + "'>";
			markup += "<div class='searchable-title'>" + item.model + "</div>";
			$.each(item.fields, function(key, field) {
			  markup += "<div class='searchable-fields'>" + item.fields_formated[field] + " : " + item[field] + "</div>";
			});
			markup += "</div>";

			return markup;
		  }

		  function formatItemSelection(item) {
			if (!item.model) {
			  return "{{ trans('global.search') }}...";
			}
			return item.model;
		  }
		  $(document).delegate('.searchable-link', 'click', function() {
			var url = $(this).attr('href');
			window.location = url;
		  });
		});
		</script>
		@yield('scripts')
	</body>
</html>