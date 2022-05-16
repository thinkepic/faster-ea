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
							<label class="col-3 col-form-label fw-bold">Name</label>
							<div class="col-9">
								<span style="font-size: 1rem;"
									class="badge badge-light fw-bold"><?= $requestor_data['username'] ?></span>
							</div>
						</div>
						<div class="row">
							<label class="col-3 col-form-label fw-bold">Division</label>
							<div class="col-9">
								<span class="badge badge-dark fw-bold"><?= $requestor_data['project_name'] ?></span>
							</div>
						</div>
						<div class="row">
							<label class="col-3 col-form-label fw-bold">Purpose</label>
							<div class="col-9">
								<span class="badge badge-info fw-bold"><?= $requestor_data['unit_name'] ?></span>
							</div>
						</div>
						<div class="row">
							<label class="col-3 col-form-label fw-bold">Total cost</label>
							<div class="col-9">
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
							<span>(<?= $dest['city'] ?>)</span></h4>
					</div>
					<div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded">
						<table class="kt-datatable__table" id="html_table" width="100%" style="display: block;">
							<thead class="kt-datatable__head">
								<tr class="kt-datatable__row" style="left: 0px;">
									<th class="kt-datatable__cell kt-datatable__cell--sort"><span
											style="width: 100px;">Item</span></th>
									<th class="kt-datatable__cell kt-datatable__cell--sort"><span
											style="width: 110px;">Cost</span></th>
									<th class="kt-datatable__cell kt-datatable__cell--sort">
										<span style="width: 250px;">Actual cost</span></th>
									<th class="kt-datatable__cell kt-datatable__cell--sort">
										<span style="width: 150px;">Submitted at</span></th>

								</tr>
							</thead>
							<tbody class="kt-datatable__body">
								<tr data-row="0" class="kt-datatable__row" style="left: 0px;">
									<td class="kt-datatable__cell fw-bold">
										<span style="width: 100px;">
											Lodging
										</span>
									</td>
									<td data-field="Status" data-autohide-disabled="false" class="kt-datatable__cell">
										<span style="width: 110px;">
											<span class="badge badge-pill badge-secondary fw-bold">
												<?= $dest['d_lodging'] ?>
											</span>
										</span>
									<td class="kt-datatable__cell">
										<div class="input-group ">
											<input type="text" class="form-control" placeholder="Enter actual lodging">
											<div class="input-group-append">
												<button class="btn btn-success" id="basic-addon2">Submit</button>
											</div>
										</div>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 150px;">
											12 May 2022, 18.14
										</span>
									</td>

								</tr>
								<tr data-row="1" class="kt-datatable__row" style="left: 0px;">
									<td class="kt-datatable__cell fw-bold"><span style="width: 100px;">Meals</span></td>
									<td data-field="Status" data-autohide-disabled="false" class="kt-datatable__cell">
										<span style="width: 110px;">
											<span class="badge badge-pill badge-secondary fw-bold">
												<?= $dest['d_meals'] ?>
											</span>
										</span>
									<td class="kt-datatable__cell">
										<div>
											<div class="input-group ">
												<input type="text" class="form-control" placeholder="Enter actual meals"
													aria-label="Recipient's username" aria-describedby="basic-addon2">
												<div class="input-group-append">
													<button class="btn btn-success" id="basic-addon2">Submit</button>
												</div>
											</div>
										</div>
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 150px;">
											12 May 2022, 18.14
										</span>
									</td>
								</tr>
								<tr data-row="1" class="kt-datatable__row" style="left: 0px;">
									<td class="kt-datatable__cell fw-bold"><span style="width: 80px;">Total: </td>
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
										<span style="width: 150px;">
											
										</span>
									</td>
								</tr>
								<tr data-row="1" class="kt-datatable__row" style="left: 0px;">
									<td class="kt-datatable__cell fw-bold"><span style="width: 80px;">Total costs:</td>
									<td data-field="Status" data-autohide-disabled="false" class="kt-datatable__cell">
										<span style="width: 280px;">
										 <span class="badge badge-pill badge-secondary fw-bold">
										 <?= $dest['d_total'] ?>
										</span>
									<td class="kt-datatable__cell">
										
									</td>
									<td class="kt-datatable__cell">
										<span style="width: 150px;">
											
										</span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {

	});

</script>
