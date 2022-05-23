<div class="details-container">
	<div class="kt-portlet">
		<div class="kt-portlet__body">
			<div class="kt-infobox">
				<div class="kt-infobox__header border-bottom ml-4 pb-1">
					<h3 class="text-dark fw-600">Reporting EA request <span
							class="badge badge-success fw-bold ml-3">#<?= $detail['ea_number'] ?></span></h3>
				</div>

				<div class="kt-infobox">
					<div class="kt-infobox__header border-bottom pb-1">
						<h4 class="text-dark fw-600">Requestor information</h4>
					</div>
					<div class="kt-infobox__body">
						<div class="row">
							<label class="col-5 mb-2 col-form-label fw-bold">Name</label>
							<div class="col-7">
								<span style="font-size: 1rem;"
									class="badge badge-light fw-bold"><?= $requestor_data['username'] ?></span>
							</div>
						</div>
						<div class="row">
							<label class="col-5 mb-2 col-form-label fw-bold">Division</label>
							<div class="col-7">
								<span class="badge badge-dark fw-bold"><?= $requestor_data['project_name'] ?></span>
							</div>
						</div>
						<div class="row">
							<label class="col-5 mb-2 col-form-label fw-bold">Purpose</label>
							<div class="col-7">
								<span class="badge badge-info fw-bold"><?= $requestor_data['unit_name'] ?></span>
							</div>
						</div>
						<div class="row">
							<label class="col-5 mb-2 col-form-label fw-bold">Total cost (meals and lodging x
								night)</label>
							<div class="col-7">
								<span class="badge badge-pill badge-secondary fw-bold">IDR
									<?= number_format($detail['total_destinations_cost'],2,',','.') ?></span>
							</div>
						</div>
						<div class="p-2 mb-2 border-bottom"></div>
					</div>
				</div>

				<?php foreach ($detail['destinations'] as $dest): ?>
				<div class="kt-infobox">
					<div class="kt-infobox__header border-bottom pb-1">
						<h4 class="text-dark fw-600"><?= $dest['order'] ?> destination
							<span>(<?= $dest['city'] ?>, <?= $dest['night'] ?> night)</span></h4>
					</div>
					<div class="kt-infobox__body">
						<div class="row mb-2">
							<div class="col-md-6 mt-2">
								<small for="arriv_date" class="col-form-label">
									Arrival date
								</small>
								<input readonly value="<?= $dest['arriv_date'] ?>" class="form-control mt-2" type="text"
									id="arriv_date" name="arriv_date">
							</div>
							<div class="col-md-6 mt-2">
								<small for="departure_date" class="col-form-label">
									Departure date
								</small>
								<input readonly value="<?= $dest['depar_date'] ?>" class="form-control mt-2" type="text"
									id="depar_date" name="depar_date">
							</div>
						</div>
						<div class="p-2 mb-2 border-bottom"></div>
					</div>
					<div
						class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded border-bottom">
						<table class="kt-datatable__table" id="html_table" width="100%" style="display: block;">
							<thead class="kt-datatable__head">
								<tr class="kt-datatable__row" style="left: 0px;">
									<th class="kt-datatable__cell kt-datatable__cell--sort"><span
											style="width: 100px;">Item</span></th>
									<th class="kt-datatable__cell kt-datatable__cell--sort"><span
											style="width: 110px;">Cost</span></th>
									<th class="kt-datatable__cell kt-datatable__cell--sort">
										<span style="width: 110px;">Actual cost</span></th>
									<th class="kt-datatable__cell kt-datatable__cell--sort">
										<span style="width: 90px;">Receipt</span></th>
									<th class="kt-datatable__cell kt-datatable__cell--sort">
										<span style="width: 90px;">Action</span></th>

								</tr>
							</thead>
							<tbody class="kt-datatable__body">
								<tr data-row="0" class="kt-datatable__row" style="left: 0px;">
									<td class="kt-datatable__cell fw-bold">
										<span style="width: 100px;">
											Lodging
										</span>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 110px;">
											<span class="badge badge-pill badge-secondary fw-bold">
												<?= $dest['d_lodging'] ?>
											</span>
										</span>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 110px;">
											<span class="badge badge-pill badge-secondary fw-bold">
												<?= ($dest['d_actual_lodging'] == '' ? '-' : $dest['d_actual_lodging']) ?>
											</span>
										</span>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 90px;">
											<?php if ($dest['lodging_receipt'] == null): ?>
											<span class="badge badge-pill badge-secondary fw-bold">
												-
											</span>
											<?php else : ?>
											<a target="_blank" class="badge badge-warning text-light"
												href="<?= base_url('uploads/ea_items_receipt/') ?><?= $dest['lodging_receipt'] ?>">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
													fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
													<path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
													<path
														d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z" />
												</svg>
											</a>
											<?php endif; ?>
										</span>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 90px;">
											<button data-field="lodging" data-dest-id="<?= $dest['id'] ?>"
												class="btn btn-meals-lodging btn-sm btn-info">
												<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
													fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
													<path
														d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
													<path fill-rule="evenodd"
														d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
												</svg>
												<span class="ml-1">Edit</span>
											</button>
										</span>
									</td>
								</tr>
								<tr data-row="0" class="kt-datatable__row" style="left: 0px;">
									<td class="kt-datatable__cell fw-bold">
										<span style="width: 100px;">
											Meals
										</span>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 110px;">
											<span class="badge badge-pill badge-secondary fw-bold">
												<?= $dest['d_meals'] ?>
											</span>
										</span>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 110px;">
											<span class="badge badge-pill badge-secondary fw-bold">
												<?= ($dest['d_actual_meals'] == '' ? '-' : $dest['d_actual_meals']) ?>
											</span>
										</span>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 90px;">
											<?php if ($dest['meals_receipt'] == null): ?>
											<span class="badge badge-pill badge-secondary fw-bold">
												-
											</span>
											<?php else : ?>
											<a target="_blank" class="badge badge-warning text-light"
												href="<?= base_url('uploads/ea_items_receipt/') ?><?= $dest['meals_receipt'] ?>">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
													fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
													<path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
													<path
														d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z" />
												</svg>
											</a>
											<?php endif; ?>
										</span>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 90px;">
											<button data-field="meals" data-dest-id="<?= $dest['id'] ?>"
												class="btn btn-meals-lodging btn-sm btn-info">
												<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
													fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
													<path
														d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
													<path fill-rule="evenodd"
														d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
												</svg>
												<span class="ml-1">Edit</span>
											</button>
										</span>
									</td>
								</tr>
								<?php foreach ($dest['other_items'] as $item): ?>
								<tr class="kt-datatable__row" style="left: 0px;">
									<td class="kt-datatable__cell fw-bold">
										<span style="width: 100px;">
											<?= $item['item'] ?>
										</span>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 110px;">
											<span class="badge badge-pill badge-secondary fw-bold">
												<?= $item['text_cost'] ?>
											</span>
										</span>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 110px;">
											<span class="badge badge-pill badge-secondary fw-bold">
												<?= $item['text_cost'] ?>
											</span>
										</span>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 90px;">
											<?php if ($item['receipt'] == null): ?>
											<span class="badge badge-pill badge-secondary fw-bold">
												-
											</span>
											<?php else : ?>
											<a target="_blank" class="badge badge-warning text-light"
												href="<?= base_url('uploads/ea_items_receipt/') ?><?= $item['receipt'] ?>">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
													fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
													<path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
													<path
														d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z" />
												</svg>
											</a>
											<?php endif; ?>
										</span>
									</td>
									<td class="kt-datatable__cell">
										<span class="d-flex flex-column" style="width: 90px;">
											<button data-id="<?= $item['id'] ?>"
												class="btn btn-edit-other-items btn-sm btn-info">
												<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
													fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
													<path
														d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
													<path fill-rule="evenodd"
														d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
												</svg>
												<span class="ml-1">Edit</span>
											</button>
											<button data-id="<?= $item['id'] ?>"
												class="btn btn-delete-items btn-sm btn-danger mt-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
													fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
													<path
														d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
													<path fill-rule="evenodd"
														d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
												</svg>
												<span class="ml-1">Delete</span>
											</button>
										</span>
									</td>
								</tr>
								<?php endforeach; ?>
								<tr data-row="0" class="kt-datatable__row" style="left: 0px;">
									<td class="kt-datatable__cell fw-bold">
										<span style="width: 100px;">

										</span>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 110px;">
										</span>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 110px;">
										</span>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 90px;">

										</span>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 90px;">
											<button data-dest-id="<?= $dest['id'] ?>"
												class="btn btn-add-items btn-sm btn-success">
												Add items
											</button>
										</span>
									</td>
								</tr>
								<!-- <tr class="kt-datatable__row" style="left: 0px;">
									<td class="kt-datatable__cell fw-bold"><span style="width: 110px;">Total: </td>
									<td data-field="Status" data-autohide-disabled="false" class="kt-datatable__cell">
										<span style="width: 280px;">
											<span class="badge badge-pill badge-secondary fw-bold">
												<?= $dest['d_total_lodging_and_meals'] ?>
											</span>
											x <?= $dest['night'] ?> (number of nights)
										</span>
									<td class="kt-datatable__cell">

									</td>
									<td class="kt-datatable__cell">
										<span style="width: 170px;">

										</span>
									</td>
								</tr> -->
								<!-- <tr class="kt-datatable__row bg-dark" style="left: 0px;">
									<td class="kt-datatable__cell fw-bold "><span class="text-light"
											style="width: 110px;">Total costs:</td>
									<td data-field="Status" data-autohide-disabled="false" class="kt-datatable__cell">
										<span style="width: 280px;">
											<span class="badge badge-pill badge-secondary fw-bold">
												<?= $dest['d_total'] ?>
											</span>
									<td class="kt-datatable__cell">

									</td>
									<td class="kt-datatable__cell">
										<span style="width: 170px;">

										</span>
									</td>
								</tr> -->
							</tbody>
						</table>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="ml-5">
					<a target="_blank" href="<?= base_url('ea_requests/report/excel_report/') . $detail['r_id'] ?>"
						class="btn btn btn-success">
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
							class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
							<path
								d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z" />
						</svg>
						<span class="ml-1">
							Download Excel
						</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		$(document).on('click', '.btn-meals-lodging', function (e) {
			e.preventDefault()
			const dest_id = $(this).attr('data-dest-id')
			const field = $(this).attr('data-field')
			$.get(base_url + `ea_requests/report/meals_lodging_modal?dest_id=${dest_id}&field=${field}`,
				function (html) {
					$('#myModal').html(html)
					$('#actual_cost').number(true, 0, '', '.');
					$('#myModal').modal('show')
				});
		});
		$(document).on('click', '.btn-add-items', function (e) {
			e.preventDefault()
			const dest_id = $(this).attr('data-dest-id')
			$.get(base_url + `ea_requests/report/add_items_modal?dest_id=${dest_id}`,
				function (html) {
					$('#myModal').html(html)
					$('#cost').number(true, 0, '', '.');
					$('#myModal').modal('show')
				});
		});
		$(document).on('click', '.btn-edit-other-items', function (e) {
			e.preventDefault()
			const item_id = $(this).attr('data-id')
			$.get(base_url + `ea_requests/report/edit_items_modal?item_id=${item_id}`,
				function (html) {
					$('#myModal').html(html)
					$('#cost').number(true, 0, '', '.');
					$('#myModal').modal('show')
				});
		});
		$(document).on('click', '.btn-delete-items', function (e) {
			e.preventDefault()
			const id = $(this).attr('data-id')
			Swal.fire({
				title: 'Delete item?',
				text: "",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: `Yes!`
			}).then((result) => {
				if (result.value) {
					$.get(base_url + `ea_requests/report/delete_other_items/${id}`,
						function (response) {
							if (response.success) {
								Swal.fire({
									"title": "Success!",
									"text": response.message,
									"type": "success",
									"confirmButtonClass": "btn btn-dark"
								}).then((result) => {
									if (result.value) {
										location.reload();
									}
								})
							} else {
								Swal.fire({
									"title": response.message,
									"text": '',
									"type": "error",
									"confirmButtonClass": "btn btn-dark"
								});
							}
						});
				}
			})
		});

		const loader = `<div style="width: 5rem; height: 5rem;" class="spinner-border mb-5" role="status"></div>
			<h5 class="mt-2">Please wait</h5>
			<p>Saving data ...</p>`

		$(document).on("submit", '#meals-lodging-form', function (e) {
			e.preventDefault()
			const formData = new FormData(this);
			Swal.fire({
				title: 'Reporting actual costs?',
				text: "",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: `Yes!`
			}).then((result) => {
				if (result.value) {
					$.ajax({
						type: 'POST',
						url: $(this).attr("action"),
						data: formData,
						beforeSend: function () {
							$('p.error').remove();
							Swal.fire({
								html: loader,
								showConfirmButton: false,
								allowEscapeKey: false,
								allowOutsideClick: false,
							});
						},
						error: function (xhr) {
							const response = xhr.responseJSON;
							if (response.errors) {
								for (const err in response.errors) {
									$(`#${err}`).parent().append(
										`<p class="error mt-1 mb-0">This field is required</p>`
									)
								}
							}
							Swal.fire({
								"title": response.message,
								"text": '',
								"type": "error",
								"confirmButtonClass": "btn btn-dark"
							});
						},
						success: function (response) {
							Swal.fire({
								"title": "Success!",
								"text": response.message,
								"type": "success",
								"confirmButtonClass": "btn btn-dark"
							}).then((result) => {
								console.log(response)
								if (result.value) {
									location.reload();
								}
							})
						},
						cache: false,
						contentType: false,
						processData: false
					});
				}
			})
		});
		$(document).on("submit", '#other-items-form', function (e) {
			e.preventDefault()
			const formData = new FormData(this);
			let title = 'Add item?';
			if ($('#method_').val() == 'PUT') {
				title = 'Edit item ?'
			}
			Swal.fire({
				title: title,
				text: "",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: `Yes!`
			}).then((result) => {
				if (result.value) {
					$.ajax({
						type: 'POST',
						url: $(this).attr("action"),
						data: formData,
						beforeSend: function () {
							$('p.error').remove();
							Swal.fire({
								html: loader,
								showConfirmButton: false,
								allowEscapeKey: false,
								allowOutsideClick: false,
							});
						},
						error: function (xhr) {
							const response = xhr.responseJSON;
							if (response.errors) {
								for (const err in response.errors) {
									$(`#${err}`).parent().append(
										`<p class="error mt-1 mb-0">This field is required</p>`
									)
								}
							}
							Swal.fire({
								"title": response.message,
								"text": '',
								"type": "error",
								"confirmButtonClass": "btn btn-dark"
							});
						},
						success: function (response) {
							Swal.fire({
								"title": "Success!",
								"text": response.message,
								"type": "success",
								"confirmButtonClass": "btn btn-dark"
							}).then((result) => {
								if (result.value) {
									location.reload();
								}
							})
						},
						cache: false,
						contentType: false,
						processData: false
					});
				}
			})
		});
	});

</script>
