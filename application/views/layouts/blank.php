<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Faster | <?= (isset($page) ? $page : '') ?></title>
	<!--begin::Global Theme Styles(used by all pages) -->
	<!--end::Global Theme Styles -->
	<link rel="stylesheet" href="<?= site_url('assets/compiled/css/app.css?v=' . ASSETS_VERSION) ?>">
	<link href="<?= site_url('assets/css/demo1/style.bundle.css') ?>" rel="stylesheet" type="text/css" />
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

	<script src="<?= site_url('assets/compiled/js/app.js?v=' . ASSETS_VERSION) ?>"></script>

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

    <?= $content ?>
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
	<script src="<?= site_url('assets/vendors/general/jquery-number/jquery.number.min.js') ?>" type="text/javascript"></script>
	<script src="<?= site_url('assets/vendors/general/sweetalert2/dist/sweetalert2.min.js') ?>" type="text/javascript">
	</script>
	<script src="<?= site_url('assets/vendors/general/sticky-js/dist/sticky.min.js') ?>" type="text/javascript">
	</script>
	<script src="<?= site_url('assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js') ?>"
		type="text/javascript"></script>

	<!--end:: Global Mandatory Vendors -->

	<!--begin::Global Theme Bundle(used by all pages) -->
	<script src="<?= site_url('assets/js/demo1/scripts.bundle.js') ?>" type="text/javascript"></script>
	<!--end::Global Theme Bundle -->

	<script>
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
			return new bootstrap.Tooltip(tooltipTriggerEl)
		})

	</script>

</body>
