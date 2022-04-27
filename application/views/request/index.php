<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">
				Data Request
				<!-- <small>initialized from remote json file</small> -->
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					<a href="<?= base_url('request/data-request/create') ?>" class="btn btn-primary btn-icon-sm">
						<i class="la la-plus"></i>
						Create Request
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="kt-portlet__body">
	</div>
	<div class="kt-portlet__body kt-portlet__body--fit">
		<!--begin: Datatable -->
		<div class="kt-datatable" id="json_data"></div>
		<!--end: Datatable -->
	</div>
</div>
