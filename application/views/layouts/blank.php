<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Faster EA<?= $page ?></title>
	<link rel="stylesheet" href="<?= site_url('assets/compiled/css/app.css?v=' . ASSETS_VERSION) ?>">
	<!--begin::Fonts -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
	<!--end::Fonts -->

	<!--begin::Page Custom Styles(used by this page) -->
	<link href="./assets/css/demo1/pages/wizard/wizard-1.css" rel="stylesheet" type="text/css" />
	<!--end::Page Custom Styles -->

	<!--begin:: Global Mandatory Vendors -->
	<link href="<?= site_url('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css') ?>" rel="stylesheet"
		type="text/css" />
	<link href="<?= site_url('assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') ?>" rel="stylesheet"
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
	<script src="./assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
	<script src="./assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
	<script src="./assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="./assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
	<script src="./assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
	<script src="./assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
	<script src="./assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
	<script src="./assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
	<!--end:: Global Mandatory Vendors -->

	<!--begin::Global Theme Bundle(used by all pages) -->

	<script src="./assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
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
