<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Faster EA | <?= (isset($page) ? $page : '') ?></title>
	<link rel="stylesheet" href="<?= site_url('assets/css/app.css?v=' . ASSETS_VERSION) ?>">
	<!--begin::Fonts -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
	<!--end::Fonts -->

	<!--begin::Page Custom Styles(used by this page) -->
	<!--end::Page Custom Styles -->

	<!--begin:: Global Mandatory Vendors -->
	<link href="<?= site_url('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css') ?>" rel="stylesheet"
		type="text/css" />
	<link href="<?= site_url('assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') ?>" rel="stylesheet"
		type="text/css" />
	<link href="<?= site_url('assets/vendors/general/sweetalert2/dist/sweetalert2.min.css') ?>" rel="stylesheet"
		type="text/css" />
	<!--end:: Global Mandatory Vendors -->

	<!--begin::Global Theme Styles(used by all pages) -->
	<link href="<?= site_url('assets/css/demo1/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles -->

	<!--begin::Layout Skins(used by all pages) -->
	<link href="<?= site_url('assets/css/demo1/skins/header/base/light.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= site_url('assets/css/demo1/skins/header/menu/light.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= site_url('assets/css/demo1/skins/brand/dark.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= site_url('assets/css/demo1/skins/aside/dark.css') ?>" rel="stylesheet" type="text/css" />

	<script src="<?= site_url('assets/js/app.js?v=' . ASSETS_VERSION) ?>"></script>

	<?php
	if (isset($assets_css)) {
		foreach ($assets_css as $asset_css) {
	?>
	<link rel="stylesheet" href="<?= $asset_css ?>">
	<?php
		}
	}
	?>

	<?php
	if (isset($assets_js)) {
		foreach ($assets_js as $js) {
			echo "\r\t" . script_tag($js) . "\r\n";
		}
	}
	?>

	<script>
		const base_url = "<?= base_url() ?>"

	</script>
</head>

<body
	class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">


	<!-- begin:: Page -->
	<!-- begin:: Header Mobile -->
	<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
		<div class="kt-header-mobile__logo">
			<a href="<?= base_url('dashboard') ?>">
				<!-- <img style="height: 3rem; width: auto;" alt="Logo" src="<?= site_url('assets/images/faster.png') ?>" /> -->
				<h3 class="text-light">Faster EA</h3>
			</a>
		</div>
		<div class="kt-header-mobile__toolbar">
			<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left"
				id="kt_aside_mobile_toggler"><span></span></button>

			<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="#6c757d"
					class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
					<path
						d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
				</svg>
			</button>
		</div>
	</div>
	<!-- end:: Header Mobile -->
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
			<!-- begin:: Aside -->
			<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>

			<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
				id="kt_aside">
				<!-- begin:: Aside -->
				<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
					<div class="kt-aside__brand-logo">
						<a href="<?= base_url('dashboard') ?>">
							<!-- <img style="height: 3rem; width: auto;" alt="Logo" src="<?= site_url('assets/images/faster.png') ?>" /> -->
							<h3 class="text-light">Faster EA</h3>
						</a>
					</div>

					<div class="kt-aside__brand-tools">
						<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
							<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
									width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
										<path
											d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
											id="Path-94" fill="#000000" fill-rule="nonzero"
											transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
										<path
											d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
											id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3"
											transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
									</g>
								</svg></span>
							<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
									width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
										<path
											d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
											id="Path-94" fill="#000000" fill-rule="nonzero" />
										<path
											d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
											id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3"
											transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
									</g>
								</svg></span>
						</button>
					</div>
				</div>
				<!-- end:: Aside -->
				<!-- begin:: Aside Menu -->
				<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">

					<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
						data-ktmenu-dropdown-timeout="500">

						<ul class="kt-menu__nav ">
							<li class="kt-menu__item " aria-haspopup="true"><a href="<?= base_url('dashboard') ?>"
									class="kt-menu__link "><span class="kt-menu__link-icon"><svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon id="Bound" points="0 0 24 0 24 24 0 24" />
												<path
													d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
													id="Shape" fill="#000000" fill-rule="nonzero" />
												<path
													d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
													id="Path" fill="#000000" opacity="0.3" />
											</g>
										</svg></span><span class="kt-menu__link-text">Dashboard</span></a></li>
							<li class="kt-menu__section ">
								<h4 class="kt-menu__section-text">Expense Authorization</h4>
								<i class="kt-menu__section-icon flaticon-more-v2"></i>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--open" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
									class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg
											xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect id="bound" x="0" y="0" width="24" height="24" />
												<path
													d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
													id="Combined-Shape" fill="#000000" opacity="0.3" />
												<path
													d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
													id="Combined-Shape" fill="#000000" />
											</g>
										</svg></span><span class="kt-menu__link-text">Request</span><i
										class="kt-menu__ver-arrow la la-angle-right"></i></a>
								<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
									<ul class="kt-menu__subnav">
										<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
												class="kt-menu__link"><span
													class="kt-menu__link-text">Subheaders</span></span></li>
										<li class="kt-menu__item" aria-haspopup="true">
											<a href="<?= base_url('request/data-request') ?>" class="kt-menu__link"><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">
													Data Request</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
								data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
									class="kt-menu__link kt-menu__toggle">
									<span class="kt-menu__link-icon">
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect id="bound" x="0" y="0" width="24" height="24"></rect>
												<path
													d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z"
													id="Combined-Shape" fill="#000000"></path>
												<path
													d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z"
													id="Path-41-Copy" fill="#000000" opacity="0.3"></path>
											</g>
										</svg>
									</span>
									<span class="kt-menu__link-text">Report</span><i
										class="kt-menu__ver-arrow la la-angle-right"></i></a>
								<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
									<ul class="kt-menu__subnav">
										<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
												class="kt-menu__link"><span
													class="kt-menu__link-text">Subheaders</span></span></li>
										<li class="kt-menu__item " aria-haspopup="true">
											<a href="demo1/layout/subheader/toolbar.html" class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">
													Request Report</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- end:: Aside Menu -->
			</div>
			<!-- end:: Aside -->
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
				<!-- begin:: Header -->
				<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

					<!-- begin:: Header Menu -->
					<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i
							class="la la-close"></i></button>
					<div class="kt-header-menu-wrapper d-flex" id="kt_header_menu_wrapper">
						<h3 class="fw-bolder ml-1 pl-4 mt-4 text-dark">Expense Authorization
							<!-- <small class="text-muted fs-6 pl-t mt-4">
								- Inventory Management System 
							</small>  -->
						</h3>
					</div>
					<!-- end:: Header Menu -->
					<!-- begin:: Header Topbar -->
					<div class="kt-header__topbar">
						<!--begin: User Bar -->
						<div class="d-flex align-items-center justify-content-center fw-bold text-dark">
							<span class="mx-2">
								Hi, Fadel Al Fayed
							</span>
						</div>
						<div class="d-flex align-items-center justify-content-center ml-2">
							<a class="btn btn-dark" href="">Logout</a>
						</div>
						<!--end: User Bar -->
					</div>
					<!-- end:: Header Topbar -->
				</div>
				<!-- end:: Header -->
				<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
					<div class="kt-subheader   kt-grid__item" id="kt_subheader">
						<div class="kt-container  kt-container--fluid ">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
									<?= (isset($pageParent) ? $pageParent : '') ?>
								</h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<svg xmlns="http://www.w3.org/2000/svg" width="16px" height="24" viewBox="0 0 24 24"
										fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
										stroke-linejoin="round" class="feather feather-chevrons-right text-muted">
										<polyline points="13 17 18 12 13 7"></polyline>
										<polyline points="6 17 11 12 6 7"></polyline>
									</svg>
									<a href="" class="kt-subheader__breadcrumbs-link ml-2">
										<?= (isset($page) ? $page : '') ?>
									</a>
									<!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
								</div>
							</div>
							<div class="kt-subheader__toolbar">
								<div class="kt-subheader__wrapper">

								</div>
							</div>
						</div>
					</div>

					<!-- begin:: Content -->
					<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

						<?= $content ?>

					</div>
					<!-- end:: Content -->
				</div>

				<!-- begin:: Footer -->
				<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
					<div class="kt-container  kt-container--fluid ">
						<div class="kt-footer__copyright">
							2022&nbsp;&copy;&nbsp; Faster EA
						</div>
					</div>
				</div>
				<!-- end:: Footer -->
			</div>
		</div>
	</div>

	<!-- end:: Page -->

	<!-- begin::Scrolltop -->
	<div id="kt_scrolltop" class="kt-scrolltop text-white">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-up"
			viewBox="0 0 16 16">
			<path fill-rule="evenodd"
				d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
		</svg>
	</div>
	<!-- end::Scrolltop -->

	<!-- begin::Global Config(global config for global JS sciprts) -->
	<script>
		var KTAppOptions = {
			"colors": {
				"state": {
					"brand": "#5d78ff",
					"dark": "#282a3c",
					"light": "#ffffff",
					"primary": "#5867dd",
					"success": "#34bfa3",
					"info": "#36a3f7",
					"warning": "#ffb822",
					"danger": "#fd3995"
				},
				"base": {
					"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
					"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
				}
			}
		};

	</script>
	<!-- end::Global Config -->

	<!--begin:: Global Mandatory Vendors -->
	<script src="<?= site_url('assets/vendors/general/js-cookie/src/js.cookie.js') ?>" type="text/javascript"></script>
	<script src="<?= site_url('assets/vendors/general/sweetalert2/dist/sweetalert2.min.js') ?>" type="text/javascript"></script>
	<script src="<?= site_url('assets/vendors/general/sticky-js/dist/sticky.min.js') ?>" type="text/javascript">
	</script>
	<script src="<?= site_url('assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js') ?>"
		type="text/javascript"></script>
	<script src="<?= site_url('assets/vendors/general/jquery-validation/dist/jquery.validate.js') ?>"
		type="text/javascript"></script>

	<!--end:: Global Mandatory Vendors -->

	<!--begin::Global Theme Bundle(used by all pages) -->
	<script src="<?= site_url('assets/js/demo1/scripts.bundle.js') ?>" type="text/javascript"></script>
	<!--end::Global Theme Bundle -->

	<script>
		const toast = new bootstrap.Toast(document.getElementById('liveToast'))

		function showToast(title, message, indicator = 'success') {
			$('#liveToast #toast-indicator').removeClass().addClass(`bg-${indicator}`)
			$('#liveToast .toast-header strong').text(title)
			$('#liveToast .toast-body').text(message)

			toast.show()
		}

		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
			return new bootstrap.Tooltip(tooltipTriggerEl)
		})

	</script>

</body>
