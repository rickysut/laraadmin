<!-- BEGIN Quick Menu -->
<!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
<nav class="shortcut-menu d-none d-sm-block">
	<input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
	<label for="menu_open" class="menu-open-button ">
		<span class="app-shortcut-icon d-block"></span>
	</label>
	<a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="kembali ke atas">
		<i class="fal fa-arrow-up"></i>
	</a>
	<a onclick="event.preventDefault(); document.getElementById('logoutform').submit();" href="{{ trans('global.logout') }}" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Keluar">
		<i class="fal fa-sign-out"></i>
	</a>
	<a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="layar penuh">
		<i class="fal fa-expand"></i>
	</a>
	<a href="#" class="menu-item btn" data-action="app-print" data-toggle="tooltip" data-placement="left" title="Cetak halaman">
		<i class="fal fa-print"></i>
	</a>
	<a hidden href="#" class="menu-item btn" data-action="app-voice" data-toggle="tooltip" data-placement="left" title="Voice command">
		<i class="fal fa-microphone"></i>
	</a>
</nav>
<!-- END Quick Menu -->
<!-- BEGIN Messenger -->
<div class="modal fade js-modal-messenger modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-right">
		<div class="modal-content h-100">
			<div class="dropdown-header bg-trans-gradient d-flex align-items-center w-100">
				<div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
					<span class="mr-2">
						<span class="rounded-circle profile-image d-block" style="background-image:url('img/demo/avatars/avatar-d.png'); background-size: cover;"></span>
					</span>
					<div class="info-card-text">
						<a href="javascript:void(0);" class="fs-lg text-truncate text-truncate-lg text-white" data-toggle="dropdown" aria-expanded="false">
							Tracey Chang
							<i class="fal fa-angle-down d-inline-block ml-1 text-white fs-md"></i>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#">Send Email</a>
							<a class="dropdown-item" href="#">Create Appointment</a>
							<a class="dropdown-item" href="#">Block User</a>
						</div>
						<span class="text-truncate text-truncate-md opacity-80">IT Director</span>
					</div>
				</div>
				<button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fal fa-times"></i></span>
				</button>
			</div>
			<div class="modal-body p-0 h-100 d-flex">
				<!-- BEGIN msgr-list -->
				<div class="msgr-list d-flex flex-column bg-faded border-faded border-top-0 border-right-0 border-bottom-0 position-absolute pos-top pos-bottom">
					<div>
						<div class="height-4 width-3 h3 m-0 d-flex justify-content-center flex-column color-primary-500 pl-3 mt-2">
							<i class="fal fa-search"></i>
						</div>
						<input type="text" class="form-control bg-white" id="msgr_listfilter_input" placeholder="Filter contacts" aria-label="FriendSearch" data-listfilter="#js-msgr-listfilter">
					</div>
					<div class="flex-1 h-100 custom-scroll">
						<div class="w-100">
							<ul id="js-msgr-listfilter" class="list-unstyled m-0">
								<li>
									<a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="tracey chang online">
										<div class="d-table-cell align-middle status status-success status-sm ">
											<span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-d.png'); background-size: cover;"></span>
										</div>
										<div class="d-table-cell w-100 align-middle pl-2 pr-2">
											<div class="text-truncate text-truncate-md">
												Tracey Chang
												<small class="d-block font-italic text-success fs-xs">
													Online
												</small>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="oliver kopyuv online">
										<div class="d-table-cell align-middle status status-success status-sm ">
											<span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-b.png'); background-size: cover;"></span>
										</div>
										<div class="d-table-cell w-100 align-middle pl-2 pr-2">
											<div class="text-truncate text-truncate-md">
												Oliver Kopyuv
												<small class="d-block font-italic text-success fs-xs">
													Online
												</small>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="dr john cook phd away">
										<div class="d-table-cell align-middle status status-warning status-sm ">
											<span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-e.png'); background-size: cover;"></span>
										</div>
										<div class="d-table-cell w-100 align-middle pl-2 pr-2">
											<div class="text-truncate text-truncate-md">
												Dr. John Cook PhD
												<small class="d-block font-italic fs-xs">
													Away
												</small>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney online">
										<div class="d-table-cell align-middle status status-success status-sm ">
											<span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-g.png'); background-size: cover;"></span>
										</div>
										<div class="d-table-cell w-100 align-middle pl-2 pr-2">
											<div class="text-truncate text-truncate-md">
												Ali Amdaney
												<small class="d-block font-italic fs-xs text-success">
													Online
												</small>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="sarah mcbrook online">
										<div class="d-table-cell align-middle status status-success status-sm">
											<span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-h.png'); background-size: cover;"></span>
										</div>
										<div class="d-table-cell w-100 align-middle pl-2 pr-2">
											<div class="text-truncate text-truncate-md">
												Sarah McBrook
												<small class="d-block font-italic fs-xs text-success">
													Online
												</small>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney offline">
										<div class="d-table-cell align-middle status status-sm">
											<span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-a.png'); background-size: cover;"></span>
										</div>
										<div class="d-table-cell w-100 align-middle pl-2 pr-2">
											<div class="text-truncate text-truncate-md">
												oliver.kopyuv@gotbootstrap.com
												<small class="d-block font-italic fs-xs">
													Offline
												</small>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney busy">
										<div class="d-table-cell align-middle status status-danger status-sm">
											<span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-j.png'); background-size: cover;"></span>
										</div>
										<div class="d-table-cell w-100 align-middle pl-2 pr-2">
											<div class="text-truncate text-truncate-md">
												oliver.kopyuv@gotbootstrap.com
												<small class="d-block font-italic fs-xs text-danger">
													Busy
												</small>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney offline">
										<div class="d-table-cell align-middle status status-sm">
											<span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-c.png'); background-size: cover;"></span>
										</div>
										<div class="d-table-cell w-100 align-middle pl-2 pr-2">
											<div class="text-truncate text-truncate-md">
												oliver.kopyuv@gotbootstrap.com
												<small class="d-block font-italic fs-xs">
													Offline
												</small>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney inactive">
										<div class="d-table-cell align-middle">
											<span class="profile-image-md rounded-circle d-block" style="background-image:url('img/demo/avatars/avatar-m.png'); background-size: cover;"></span>
										</div>
										<div class="d-table-cell w-100 align-middle pl-2 pr-2">
											<div class="text-truncate text-truncate-md">
												+714651347790
												<small class="d-block font-italic fs-xs opacity-50">
													Missed Call
												</small>
											</div>
										</div>
									</a>
								</li>
							</ul>
							<div class="filter-message js-filter-message"></div>
						</div>
					</div>
					<div>
						<a class="fs-xl d-flex align-items-center p-3">
							<i class="fal fa-cogs"></i>
						</a>
					</div>
				</div>
				<!-- END msgr-list -->
				<!-- BEGIN msgr -->
				<div class="msgr d-flex h-100 flex-column bg-white">
					<!-- BEGIN custom-scroll -->
					<div class="custom-scroll flex-1 h-100">
						<div id="chat_container" class="w-100 p-4">
							<!-- start .chat-segment -->
							<div class="chat-segment">
								<div class="time-stamp text-center mb-2 fw-400">
									Jun 19
								</div>
							</div>
							<!--  end .chat-segment -->
							<!-- start .chat-segment -->
							<div class="chat-segment chat-segment-sent">
								<div class="chat-message">
									<p>
										Hey Tracey, did you get my files?
									</p>
								</div>
								<div class="text-right fw-300 text-muted mt-1 fs-xs">
									3:00 pm
								</div>
							</div>
							<!--  end .chat-segment -->
							<!-- start .chat-segment -->
							<div class="chat-segment chat-segment-get">
								<div class="chat-message">
									<p>
										Hi
									</p>
									<p>
										Sorry going through a busy time in office. Yes I analyzed the solution.
									</p>
									<p>
										It will require some resource, which I could not manage.
									</p>
								</div>
								<div class="fw-300 text-muted mt-1 fs-xs">
									3:24 pm
								</div>
							</div>
							<!--  end .chat-segment -->
							<!-- start .chat-segment -->
							<div class="chat-segment chat-segment-sent chat-start">
								<div class="chat-message">
									<p>
										Okay
									</p>
								</div>
							</div>
							<!--  end .chat-segment -->
							<!-- start .chat-segment -->
							<div class="chat-segment chat-segment-sent chat-end">
								<div class="chat-message">
									<p>
										Sending you some dough today, you can allocate the resources to this project.
									</p>
								</div>
								<div class="text-right fw-300 text-muted mt-1 fs-xs">
									3:26 pm
								</div>
							</div>
							<!--  end .chat-segment -->
							<!-- start .chat-segment -->
							<div class="chat-segment chat-segment-get chat-start">
								<div class="chat-message">
									<p>
										Perfect. Thanks a lot!
									</p>
								</div>
							</div>
							<!--  end .chat-segment -->
							<!-- start .chat-segment -->
							<div class="chat-segment chat-segment-get">
								<div class="chat-message">
									<p>
										I will have them ready by tonight.
									</p>
								</div>
							</div>
							<!--  end .chat-segment -->
							<!-- start .chat-segment -->
							<div class="chat-segment chat-segment-get chat-end">
								<div class="chat-message">
									<p>
										Cheers
									</p>
								</div>
							</div>
							<!--  end .chat-segment -->
							<!-- start .chat-segment for timestamp -->
							<div class="chat-segment">
								<div class="time-stamp text-center mb-2 fw-400">
									Jun 20
								</div>
							</div>
							<!--  end .chat-segment for timestamp -->
						</div>
					</div>
					<!-- END custom-scroll  -->
					<!-- BEGIN msgr__chatinput -->
					<div class="d-flex flex-column">
						<div class="border-faded border-right-0 border-bottom-0 border-left-0 flex-1 mr-3 ml-3 position-relative shadow-top">
							<div class="pt-3 pb-1 pr-0 pl-0 rounded-0" tabindex="-1">
								<div id="msgr_input" contenteditable="true" data-placeholder="Type your message here..." class="height-10 form-content-editable"></div>
							</div>
						</div>
						<div class="height-8 px-3 d-flex flex-row align-items-center flex-wrap flex-shrink-0">
							<a href="javascript:void(0);" class="btn btn-icon fs-xl width-1 mr-1" data-toggle="tooltip" data-original-title="More options" data-placement="top">
								<i class="fal fa-ellipsis-v-alt color-fusion-300"></i>
							</a>
							<a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Attach files" data-placement="top">
								<i class="fal fa-paperclip color-fusion-300"></i>
							</a>
							<a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Insert photo" data-placement="top">
								<i class="fal fa-camera color-fusion-300"></i>
							</a>
							<div class="ml-auto">
								<a href="javascript:void(0);" class="btn btn-info">Send</a>
							</div>
						</div>
					</div>
					<!-- END msgr__chatinput -->
				</div>
				<!-- END msgr -->
			</div>
		</div>
	</div>
</div>
<!-- END Messenger -->
<!-- BEGIN Page Settings -->
<div class="modal fade js-modal-settings modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-right modal-md">
		<div class="modal-content">
			<div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100">
				<h4 class="m-0 text-center color-white">
					Tataletak
					<small class="mb-0 opacity-80">Penyesuaian Antarmuka</small>
				</h4>
				<button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fal fa-times"></i></span>
				</button>
			</div>
			<div class="modal-body p-0">
				<div class="settings-panel">
					<div class="mt-4 d-table w-100 px-5">
						<div class="d-table-cell align-middle">
							<h5 class="p-0">
								Tataletak App
							</h5>
						</div>
					</div>
					<div class="list" id="fh">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="header-function-fixed"></a>
						<span class="onoffswitch-title">Header Tetap</span>
						<span class="onoffswitch-title-desc">header tetap setiap saat</span>
					</div>
					<div class="list" id="nff">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-fixed"></a>
						<span class="onoffswitch-title">Navigasi Tetap</span>
						<span class="onoffswitch-title-desc">Panel kiri tetap setiap saat</span>
					</div>
					<div class="list" id="nfm">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-minify"></a>
						<span class="onoffswitch-title">Perkecil Navigasi</span>
						<span class="onoffswitch-title-desc">untuk ruang tampilan lebih luas</span>
					</div>
					<div class="list" id="nfh">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-hidden"></a>
						<span class="onoffswitch-title">Navigasi Tersembunyi</span>
						<span class="onoffswitch-title-desc">sentuh bagian kiri layar untuk menampilkan</span>
					</div>
					<div class="list" id="nft">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-top"></a>
						<span class="onoffswitch-title">Navigasi di atas</span>
						<span class="onoffswitch-title-desc">panel navigasi pindah ke atas</span>
					</div>
					<div class="list" id="fff">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="footer-function-fixed"></a>
						<span class="onoffswitch-title">Footer Tetap</span>
						<span class="onoffswitch-title-desc">Footer tidak bergerak</span>
					</div>
					<div class="list" id="mmb">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-main-boxed"></a>
						<span class="onoffswitch-title">Pengkotakan Tataletak</span>
						<span class="onoffswitch-title-desc">bungkus tataletak ke dalam sebuah wadah</span>
					</div>
					<div class="expanded">
						<ul class="mb-3 mt-1">
							<li>
								<div class="bg-fusion-50" data-action="toggle" data-class="mod-bg-1"></div>
							</li>
							<li>
								<div class="bg-warning-200" data-action="toggle" data-class="mod-bg-2"></div>
							</li>
							<li>
								<div class="bg-primary-200" data-action="toggle" data-class="mod-bg-3"></div>
							</li>
							<li>
								<div class="bg-success-300" data-action="toggle" data-class="mod-bg-4"></div>
							</li>
							<li>
								<div class="bg-white border" data-action="toggle" data-class="mod-bg-none"></div>
							</li>
						</ul>
						<div class="list" id="mbgf">
							<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-fixed-bg"></a>
							<span class="onoffswitch-title">Latarbelakang Tetap</span>
						</div>
					</div>
					<div hidden class="mt-4 d-table w-100 px-5">
						<div hidden class="d-table-cell align-middle">
							<h5 hidden class="p-0">
								Menu untuk Mobile
							</h5>
						</div>
					</div>
					<div hidden class="list" id="nmp">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-push"></a>
						<span class="onoffswitch-title">Push Content</span>
						<span class="onoffswitch-title-desc">Content pushed on menu reveal</span>
					</div>
					<div hidden class="list" id="nmno">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-no-overlay"></a>
						<span class="onoffswitch-title">No Overlay</span>
						<span class="onoffswitch-title-desc">Removes mesh on menu reveal</span>
					</div>
					<div hidden class="list" id="sldo">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-slide-out"></a>
						<span class="onoffswitch-title">Off-Canvas <sup>(beta)</sup></span>
						<span class="onoffswitch-title-desc">Content overlaps menu</span>
					</div>
					<div class="mt-4 d-table w-100 px-5">
						<div class="d-table-cell align-middle">
							<h5 class="p-0">
								Aksesibilitas
							</h5>
						</div>
					</div>
					<div class="list" id="mbf">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-bigger-font"></a>
						<span class="onoffswitch-title">Font lebih besar</span>
						<span class="onoffswitch-title-desc">ukuran font konten lebih mudah dibaca</span>
					</div>
					<div class="list" id="mhc">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-high-contrast"></a>
						<span class="onoffswitch-title">Kontras Tinggi (WCAG 2 AA)</span>
						<span class="onoffswitch-title-desc">ubah rasio kontras teks</span>
					</div>
					<div class="list" id="mcb">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-color-blind"></a>
						<span class="onoffswitch-title">Daltonism <sup>(uji)</sup> </span>
						<span class="onoffswitch-title-desc">defisiensi penglihatan warna</span>
					</div>
					<div class="list" id="mpc">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-pace-custom"></a>
						<span class="onoffswitch-title">Preloader di dalam</span>
						<span class="onoffswitch-title-desc">preloader berada di dalam konten</span>
					</div>
					<div class="list" id="mpi" hidden>
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-panel-icon"></a>
						<span class="onoffswitch-title">SmartPanel Icons (not Panels)</span>
						<span class="onoffswitch-title-desc">smartpanel buttons will appear as icons</span>
					</div>
					<div class="mt-4 d-table w-100 px-5">
						<div class="d-table-cell align-middle">
							<h5 class="p-0">
								Modifikasi Global
							</h5>
						</div>
					</div>
					<div class="list" id="mcbg">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-clean-page-bg"></a>
						<span class="onoffswitch-title">Bersihkan latarbelakang halaman</span>
						<span class="onoffswitch-title-desc">latar belakang menjadi putih</span>
					</div>
					<div class="list" id="mhni">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-nav-icons"></a>
						<span class="onoffswitch-title">Ikon Navigasi Tersembunyi</span>
						<span class="onoffswitch-title-desc">ikon navigasi tidak terlihat</span>
					</div>
					<div class="list" id="dan">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-disable-animation"></a>
						<span class="onoffswitch-title">Nonaktifkan Animasi CSS</span>
						<span class="onoffswitch-title-desc">animasi berbasis CSS nonaktif</span>
					</div>
					<div class="list" id="mhic">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-info-card"></a>
						<span class="onoffswitch-title">Sembunyikan Info Card</span>
						<span class="onoffswitch-title-desc">menyembunyikan info card di panel kiri</span>
					</div>
					<div class="list" id="mlph">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-lean-subheader"></a>
						<span class="onoffswitch-title">Surutkan Subjudul</span>
						<span class="onoffswitch-title-desc">judul halaman lebih jelas</span>
					</div>
					<div class="list" id="mnl">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-nav-link"></a>
						<span class="onoffswitch-title">Navigasi Hirarkis</span>
						<span class="onoffswitch-title-desc">tampilkan garis hirarki pada navigasi</span>
					</div>
					<div class="list" id="mdn">
						<a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-nav-dark"></a>
						<span class="onoffswitch-title">Navigasi Gelap</span>
						<span class="onoffswitch-title-desc">latar belakang navigasi lebih gelap</span>
					</div>
					<hr class="mb-0 mt-4">
					<div class="mt-4 d-table w-100 pl-5 pr-3">
						<div class="d-table-cell align-middle">
							<h5 class="p-0">
								Ukuran Font Global
							</h5>
						</div>
					</div>
					<div class="list mt-1">
						<div class="btn-group btn-group-sm btn-group-toggle my-2" data-toggle="buttons">
							<label class="btn btn-default btn-sm" data-toggle="tooltip" title data-original-title="Kecil" data-action="toggle-swap" data-class="root-text-sm" data-target="html">
								<input type="radio" name="changeFrontSize"> SM
							</label>
							<label class="btn btn-default btn-sm" data-toggle="tooltip" title data-original-title="sedang" data-action="toggle-swap" data-class="root-text" data-target="html">
								<input type="radio" name="changeFrontSize" checked=""> MD
							</label>
							<label class="btn btn-default btn-sm" data-toggle="tooltip" title data-original-title="besar" data-action="toggle-swap" data-class="root-text-lg" data-target="html">
								<input type="radio" name="changeFrontSize"> LG
							</label>
							<label class="btn btn-default btn-sm" data-toggle="tooltip" title data-original-title="ekstra" data-action="toggle-swap" data-class="root-text-xl" data-target="html">
								<input type="radio" name="changeFrontSize"> XL
							</label>
						</div>
						<span class="onoffswitch-title-desc d-block mb-0">mengganti ukuran huruf. ukuran kembali ke semula saat halaman di segarkan ulang.</span>
					</div>
					<hr class="mb-0 mt-4">
					<div class="mt-4 d-table w-100 pl-5 pr-3">
						<div class="d-table-cell align-middle">
							<h5 class="p-0 pr-2 d-flex">
								Warna Tema
								<a href="#" class="ml-auto fw-400 fs-xs" data-toggle="popover" data-trigger="focus" data-placement="top" title="" data-html="true" data-content="Layar Anda mungkin mengalami <code>kedipan singkat</code> saat halaman dimuat." data-original-title="<span class='text-primary'><i class='fal fa-exclamation-triangle mr-1'></i> Heads up!</span>" data-template="<div class=&quot;popover bg-white border-white&quot; role=&quot;tooltip&quot;><div class=&quot;arrow&quot;></div><h3 class=&quot;popover-header bg-transparent&quot;></h3><div class=&quot;popover-body fs-xs&quot;></div></div>"><i class="fal fa-info-circle mr-1"></i> Perhatian</a>
							</h5>
						</div>
					</div>
					<div class="expanded theme-colors pl-5 pr-3">
						<ul class="m-0">
							<li>
								<a href="#" id="myapp-0" data-action="theme-update" data-themesave data-theme="" data-toggle="tooltip" data-placement="top" title="Wisteria (base css)" data-original-title="Wisteria (base css)"></a>
							</li>
							<li>
								<a href="#" id="myapp-1" data-action="theme-update" data-themesave data-theme="{{ url('css/smartadmin/themes/cust-theme-1.css') }}" data-toggle="tooltip" data-placement="top" title="Tapestry" data-original-title="Tapestry"></a>
							</li>
							<li>
								<a href="#" id="myapp-2" data-action="theme-update" data-themesave data-theme="{{ url('css/smartadmin/themes/cust-theme-2.css') }}" data-toggle="tooltip" data-placement="top" title="Atlantis" data-original-title="Atlantis"></a>
							</li>
							<li>
								<a href="#" id="myapp-3" data-action="theme-update" data-themesave data-theme="{{ url('css/smartadmin/themes/cust-theme-3.css') }}" data-toggle="tooltip" data-placement="top" title="Indigo" data-original-title="Indigo"></a>
							</li>
							<li>
								<a href="#" id="myapp-4" data-action="theme-update" data-themesave data-theme="{{ url('css/smartadmin/themes/cust-theme-4.css') }}" data-toggle="tooltip" data-placement="top" title="Dodger Blue" data-original-title="Dodger Blue"></a>
							</li>
							<li>
								<a href="#" id="myapp-5" data-action="theme-update" data-themesave data-theme="{{ url('css/smartadmin/themes/cust-theme-5.css') }}" data-toggle="tooltip" data-placement="top" title="Tradewind" data-original-title="Tradewind"></a>
							</li>
							<li>
								<a href="#" id="myapp-6" data-action="theme-update" data-themesave data-theme="{{ url('css/smartadmin/themes/cust-theme-6.css') }}" data-toggle="tooltip" data-placement="top" title="Cranberry" data-original-title="Cranberry"></a>
							</li>
							<li>
								<a href="#" id="myapp-7" data-action="theme-update" data-themesave data-theme="{{ url('css/smartadmin/themes/cust-theme-7.css') }}" data-toggle="tooltip" data-placement="top" title="Oslo Gray" data-original-title="Oslo Gray"></a>
							</li>
							<li>
								<a href="#" id="myapp-8" data-action="theme-update" data-themesave data-theme="{{ url('css/smartadmin/themes/cust-theme-8.css') }}" data-toggle="tooltip" data-placement="top" title="Chetwode Blue" data-original-title="Chetwode Blue"></a>
							</li>
							<li>
								<a href="#" id="myapp-9" data-action="theme-update" data-themesave data-theme="{{ url('css/smartadmin/themes/cust-theme-9.css') }}" data-toggle="tooltip" data-placement="top" title="Apricot" data-original-title="Apricot"></a>
							</li>
							<li>
								<a href="#" id="myapp-10" data-action="theme-update" data-themesave data-theme="{{ url('css/smartadmin/themes/cust-theme-10.css') }}" data-toggle="tooltip" data-placement="top" title="Blue Smoke" data-original-title="Blue Smoke"></a>
							</li>
							<li>
								<a href="#" id="myapp-11" data-action="theme-update" data-themesave data-theme="{{ url('css/smartadmin/themes/cust-theme-11.css') }}" data-toggle="tooltip" data-placement="top" title="Green Smoke" data-original-title="Green Smoke"></a>
							</li>
							<li>
								<a href="#" id="myapp-12" data-action="theme-update" data-themesave data-theme="{{ url('css/smartadmin/themes/cust-theme-12.css') }}" data-toggle="tooltip" data-placement="top" title="Wild Blue Yonder" data-original-title="Wild Blue Yonder"></a>
							</li>
							<li>
								<a href="#" id="myapp-13" data-action="theme-update" data-themesave data-theme="{{ url('css/smartadmin/themes/cust-theme-13.css') }}" data-toggle="tooltip" data-placement="top" title="Emerald" data-original-title="Emerald"></a>
							</li>
							<li>
								<a href="#" id="myapp-14" data-action="theme-update" data-themesave data-theme="{{ url('css/smartadmin/themes/cust-theme-14.css') }}" data-toggle="tooltip" data-placement="top" title="Supernova" data-original-title="Supernova"></a>
							</li>
							<li>
								<a href="#" id="myapp-15" data-action="theme-update" data-themesave data-theme="{{ url('css/smartadmin/themes/cust-theme-15.css') }}" data-toggle="tooltip" data-placement="top" title="Hoki" data-original-title="Hoki"></a>
							</li>
						</ul>
					</div>
					<hr class="mb-0 mt-4">
					<div class="mt-4 d-table w-100 pl-5 pr-3">
						<div class="d-table-cell align-middle">
							<h5 class="p-0 pr-2 d-flex">
								Mode Tema (uji)
								<a href="#" class="ml-auto fw-400 fs-xs" data-toggle="popover" data-trigger="focus" data-placement="top" title="" data-html="true" data-content="Anda mungkin akan menemui kendala saat melakukan infiltrasi tema pada peramban <code>Internet Explorer (IE)</code>. Gunakan peramban lain saat kendala tersebut muncul." data-original-title="<span class='text-primary'><i class='fal fa-question-circle mr-1'></i> Why beta?</span>" data-template="<div class=&quot;popover bg-white border-white&quot; role=&quot;tooltip&quot;><div class=&quot;arrow&quot;></div><h3 class=&quot;popover-header bg-transparent&quot;></h3><div class=&quot;popover-body fs-xs&quot;></div></div>"><i class="fal fa-info-circle mr-1"></i> Perhatian</a>
							</h5>
						</div>
					</div>
					<div class="pl-5 pr-3 py-3">
						<div class="ie-only alert alert-warning d-none">
							<h6>Internet Explorer Issue</h6>
							This particular component may not work as expected in Internet Explorer. Please use with caution.
						</div>
						<div class="row no-gutters">
							<div class="col-4 pr-2 text-center">
								<div id="skin-default" data-action="toggle-replace" data-replaceclass="mod-skin-light mod-skin-dark" data-class="" data-toggle="tooltip" data-placement="top" title="" class="d-flex bg-white border border-primary rounded overflow-hidden text-success js-waves-on" data-original-title="Mode Utama" style="height: 80px">
									<div class="bg-primary-600 bg-primary-gradient px-2 pt-0 border-right border-primary"></div>
									<div class="d-flex flex-column flex-1">
										<div class="bg-white border-bottom border-primary py-1"></div>
										<div class="bg-faded flex-1 pt-3 pb-3 px-2">
											<div class="py-3" style="background:url('img/demo/s-1.png') top left no-repeat;background-size: 100%;"></div>
										</div>
									</div>
								</div>
								Utama
							</div>
							<div class="col-4 px-1 text-center">
								<div id="skin-light" data-action="toggle-replace" data-replaceclass="mod-skin-dark" data-class="mod-skin-light" data-toggle="tooltip" data-placement="top" title="" class="d-flex bg-white border border-secondary rounded overflow-hidden text-success js-waves-on" data-original-title="Mode Cerah" style="height: 80px">
									<div class="bg-white px-2 pt-0 border-right border-"></div>
									<div class="d-flex flex-column flex-1">
										<div class="bg-white border-bottom border- py-1"></div>
										<div class="bg-white flex-1 pt-3 pb-3 px-2">
											<div class="py-3" style="background:url('img/demo/s-1.png') top left no-repeat;background-size: 100%;"></div>
										</div>
									</div>
								</div>
								Cerah
							</div>
							<div class="col-4 pl-2 text-center">
								<div id="skin-dark" data-action="toggle-replace" data-replaceclass="mod-skin-light" data-class="mod-skin-dark" data-toggle="tooltip" data-placement="top" title="" class="d-flex bg-white border border-dark rounded overflow-hidden text-success js-waves-on" data-original-title="Mode Gelap" style="height: 80px">
									<div class="bg-fusion-500 px-2 pt-0 border-right"></div>
									<div class="d-flex flex-column flex-1">
										<div class="bg-fusion-600 border-bottom py-1"></div>
										<div class="bg-fusion-300 flex-1 pt-3 pb-3 px-2">
											<div class="py-3 opacity-30" style="background:url('img/demo/s-1.png') top left no-repeat;background-size: 100%;"></div>
										</div>
									</div>
								</div>
								Gelap
							</div>
						</div>
					</div>
					<hr class="mb-0 mt-4">
					<div class="pl-5 pr-3 py-3 bg-faded">
						<div class="row no-gutters">
							<div class="col-6 pr-1">
								<a href="#" class="btn btn-outline-danger fw-500 btn-block" data-action="app-reset">Reset Penyesuaian</a>
							</div>
							<div class="col-6 pl-1">
								<a href="#" class="btn btn-danger fw-500 btn-block" data-action="factory-reset">Reset Pabrik</a>
							</div>
						</div>
					</div>
				</div> <span id="saving"></span>
			</div>
		</div>
	</div>
</div>
<!-- END Page Settings -->