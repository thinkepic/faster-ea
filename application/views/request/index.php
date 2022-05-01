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
		<table id="table-requests" class="table table-striped"
			data-url="<?= base_url('request/data-request/datatable') ?>">
			<thead>
				<tr>
					<th>Requestor</th>
					<th>Request base</th>
					<th>Employment</th>
					<th>Originating City</th>
					<th>Departure date</th>
					<th>Returning date</th>
					<th class="action-col">#</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>

	<div class="kt-portlet__body">
		<div class="kt-invoice__body">
			<div class="kt-invoice__container">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>DESCRIPTION</th>
								<th>HOURS</th>
								<th>RATE</th>
								<th>AMOUNT</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Creative Design</td>
								<td>80</td>
								<td>$40.00</td>
								<td>$3200.00</td>
							</tr>
							<tr>
								<td>Front-End Development</td>
								<td>120</td>
								<td>$40.00</td>
								<td>$4800.00</td>
							</tr>
							<tr>
								<td>Back-End Development</td>
								<td>210</td>
								<td>$60.00</td>
								<td>$12600.00</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	initDatatable('#table-requests', {
		columnDefs: [{
			targets: 'action-col',
			orderable: false,
			searchable: false,
			render: function (data) {
				return `
	                   <div class="d-flex align-items-center">
	                        <a href="${base_url}request/data-request/edit/${data}" class="btn btn-sm btn-info">
	                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
	                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
	                            </svg>
	                        </a>
							<button data-id="${data}" class="btn btn-sm btn-danger btn-delete ml-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
							<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
							<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
							</svg>
	                        </button>
	                   </div>
	                `
			}
		}, ]
	})

</script>
