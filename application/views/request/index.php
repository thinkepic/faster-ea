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
				<?php foreach ($requests as $req):?>

				<tr>
					<td><?= $req->requestor_name ?></td>
					<td><?= $req->request_base ?></td>
					<td><?= $req->employment ?></td>
					<td><?= $req->originating_city ?></td>
					<td><?= $req->departure_date ?></td>
					<td><?= $req->return_date ?></td>
					<td>
						<button class="btn btn-sm btn-warning">Edit</button>
					</td>
				</tr>

				<?php endforeach;?>
			</tbody>
		</table>
	</div>
	<!-- <div class="kt-portlet__body kt-portlet__body--fit">

	</div> -->
</div>

<script>
	$('#table-requests').DataTable()
	// initDatatable('#table-requests', {
	// 	columnDefs: [{
	// 			targets: 'action-col',
	// 			orderable: false,
	// 			searchable: false,
	// 			render: function (data) {
	// 				return `
	//                    <div>
	//                         <a href="${base_url}request/data-request/edit/${data}" clas="btn btn-sm btn-danger">
	//                             <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
	//                                 <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
	//                             </svg>
	//                         </a>
	//                    </div>
	//                 `
	// 			}
	// 		},
	// 	]
	// })

</script>
