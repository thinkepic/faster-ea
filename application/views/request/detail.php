	<div class="details-container">
		<div class="kt-portlet">
			<div class="kt-portlet__body">
				<div class="kt-infobox">
					<div class="kt-infobox__header border-bottom pb-1">
						<h4 class="text-dark fw-600">Basic Information</h4>
					</div>
					<div class="kt-infobox__body">
						<div class="row">
							<label class="col-3 col-form-label fw-bold">Requestor name</label>
							<div class="col-9">
								<span style="font-size: 1rem;" class="badge badge-light fw-bold">Fadel Al Fayed</span>
							</div>
						</div>
						<div class="row">
							<label class="col-3 col-form-label fw-bold">Division</label>
							<div class="col-9">
								<span class="badge badge-dark fw-bold">Epic</span>
							</div>
						</div>
						<div class="row">
							<label class="col-3 col-form-label fw-bold">Employee status</label>
							<div class="col-9">
								<span class="badge badge-info fw-bold">Procurement Officer</span>
							</div>
						</div>
						<div class="p-2 mb-2 border-bottom"></div>
						<div class="row">
							<label class="col-3 col-form-label fw-bold">Request base</label>
							<div class="col-9">
								<span class="badge badge-light fw-bold"><?= $detail['request_base'] ?></span>
							</div>
						</div>
						<div class="row">
							<label class="col-3 col-form-label fw-bold">Request date</label>
							<div class="col-9">
								<span class="badge badge-light fw-bold"><?= $detail['request_date'] ?></span>
							</div>
						</div>
						<?php if ($detail['request_base'] === 'Internal TOR'): ?>
						<div class="row">
							<label class="col-3 col-form-label fw-bold">TOR number</label>
							<div class="col-9">
								<span class="badge badge-light fw-bold"><?= $detail['tor_number'] ?></span>
							</div>
						</div>
						<?php endif; ?>
						<div class="row">
							<label class="col-3 col-form-label fw-bold">Employment</label>
							<div class="col-9">
								<span class="badge badge-light fw-bold"><?= $detail['employment'] ?></span>
							</div>
						</div>
						<?php if ($detail['employment'] === 'On behalf'): ?>
						<div class="row">
							<label class="col-3 col-form-label fw-bold">Employment status</label>
							<div class="col-9">
								<span class="badge badge-light fw-bold"><?= $detail['employment_status'] ?></span>
							</div>
						</div>

						<?php if ($detail['employment_status'] === 'Group'): ?>

						<!-- If employment status = Group -->
						<div class="group-info row my-2 pt-1 pb-3 border-bottom border-top">
							<label class="col-3 col-form-label fw-bold">Group Info</label>
							<div class="col-md-4 mt-2">
								<small class="col-form-label">
									Group name
								</small>
								<input readonly value="<?= $detail['participant_group_name'] ?>" class="form-control mt-2"
									type="text">
							</div>
							<div class="col-md-1">
							</div>
							<div class="col-md-4 mt-3 my-2">
								<small class="col-form-label">
									Email
								</small>
								<input readonly value="<?= $detail['participant_group_email'] ?>" class="form-control mt-2"
									type="text">
							</div>
							<label class="col-3 col-form-label fw-bold"></label>
							<div class="col-md-4 mt-3 mt-2">
								<small class="col-form-label">
									Contact Person
								</small>
								<input readonly value="<?= $detail['participant_group_contact_person'] ?>"
									class="form-control mt-2" type="text">
							</div>
							<div class="col-md-1">
							</div>
							<div class="col-md-4 my-2">
								<small class="col-form-label">
									Number of participants
								</small>
								<input readonly value="<?= $detail['number_of_participants'] ?>" class="form-control mt-2"
									type="text">
							</div>
						</div>

						<?php else: ?>

						<!-- If employment status = Consultant / other -->
						<div class="group-info row my-2 pt-1 pb-2 border-bottom border-top">
							<label class="col-3 col-form-label fw-bold mt-3">Participants</label>
							<div class="col-9">
								<div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded">
									<table class="kt-datatable__table" width="100%" style="display: block;">
										<thead class="kt-datatable__head">
											<tr class="kt-datatable__row" style="left: 0px;">

												<th class="kt-datatable__cell kt-datatable__cell--sort"><span
														style="width: 30px;"></span>#</th>
												<th class="kt-datatable__cell kt-datatable__cell--sort"><span
														style="width: 180px;">Name</span></th>
												<th class="kt-datatable__cell kt-datatable__cell--sort"><span
														style="width: 180px;">Email</span></th>
												<th class="kt-datatable__cell kt-datatable__cell--sort"><span
														style="width: 110px;">Title</span></th>
											</tr>
										</thead>
										<tbody class="kt-datatable__body">
											<?php $no = 1 ?>
											<?php foreach ($detail['participants'] as $par): ?>
											<tr class="kt-datatable__row" style="left: 0px;">
												<td class="kt-datatable__cell"><span class="text-dark"
														style="width: 30px;"><?= $no++ ?></span></td>
												<td class="kt-datatable__cell">
													<span class="text-dark"
														style="width: 180px;"><?= $par['name'] ?></span>
												</td>
												<td class="kt-datatable__cell">
													<span class="text-dark"
														style="width: 180px;"><?= $par['email'] ?></span>
												<td class="kt-datatable__cell"><span class="text-dark"
														style="width: 110px;"><?= $par['title'] ?></span></td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<?php endif; ?>

						<?php endif; ?>

						<div class="row">
							<label class="col-3 col-form-label fw-bold">Originating city</label>
							<div class="col-9">
								<span class="badge badge-light fw-bold"><?= $detail['originating_city'] ?></span>
							</div>
						</div>
						<div class="row mb-2">
							<label class="col-3 col-form-label fw-bold">Date</label>
							<div class="col-md-4 mt-2">
								<small for="departure_date" class="col-form-label">
									Departure date
								</small>
								<input readonly value="<?= $detail['d_date'] ?>" class="form-control mt-2" type="text"
									id="departure_date" name="departure_date">
							</div>
							<div class="col-md-1">
							</div>
							<div class="col-md-4 mt-2">
								<small for="departure_date" class="col-form-label">
									Return date
								</small>
								<input readonly value="<?= $detail['r_date'] ?>" class="form-control mt-2" type="text"
									id="return_date" name="return_date">
							</div>
						</div>
						<div class="row">
							<label class="col-3 col-form-label fw-bold">Country director notified</label>
							<div class="col-9">
								<span class="badge badge-light fw-bold"><?= $detail['country_director_notified'] ?></span>
							</div>
						</div>
						<div class="row">
							<label class="col-3 col-form-label fw-bold">Travel advance</label>
							<div class="col-9">
								<span class="badge badge-light fw-bold"><?= $detail['travel_advance'] ?></span>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="kt-portlet">
			<div class="kt-portlet__body">
				<div class="kt-infobox">
					<div class="kt-infobox__header border-bottom pb-1">
						<h4 class="text-dark fw-600">Special Requests</h4>
					</div>
					<div class="kt-infobox__body">
						<div class="details-special-requests mt-2">
							<div class="special-request-el">
								<div class="form-group mb-3 row border-bottom pb-3">
									<label class="col-md-7 col-form-label">Documents Needed more than 3 days prior
										to
										departure?</label>
									<div class="col-md-5">
										<div class="kt-radio-inline">
											<span class="badge badge-light fw-bold">
												<?= $detail['need_documents'] ?>
											</span>
										</div>
										<?php if ($detail['need_documents'] === 'Yes'): ?>
										<div class="form-group mt-4 documents-description-el">
											<label for="document_description">Document description</label>
											<textarea class="form-control" readonly name="document_description"
												id="document_description" rows="3"><?= $detail['document_description'] ?>
											</textarea>
										</div>
										<?php endif; ?>
									</div>
								</div>
								<div class="form-group mb-3 row border-bottom pb-3">
									<label class="col-md-7 col-form-label">Car Rental? If yes, attach approved per
										diem
										variance memo to Travel Manager</label>
									<div class="col-md-5">
										<div class="kt-radio-inline">
											<span class="badge badge-light fw-bold">
												<?= $detail['car_rental'] ?>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group mb-3 row border-bottom pb-3">
									<label class="col-md-7 col-form-label">Hotel Reservations? If yes, specify dates
										in/out
										and hotel(s) if known.</label>
									<div class="col-md-5">
										<div class="kt-radio-inline">
											<span class="badge badge-light fw-bold">
												<?= $detail['hotel_reservations'] ?>
											</span>
										</div>
										<?php if ($detail['hotel_reservations'] === 'Yes'): ?>
										<div class="form-group row mt-4 hotel-reservations-el">
											<div class="col-6">
												<label for="hotel_check_in" class="form-label">
													Check in
												</label>
												<input readonly class="form-control" type="text"
													value="<?= $detail['hotel_check_in'] ?>" name="hotel_check_in"
													id="hotel_check_in">
											</div>
											<div class="col-6">
												<label for="hotel_check_out" class="form-label">
													Check out
												</label>
												<input readonly class="form-control" type="text"
													value="<?= $detail['hotel_check_out'] ?>" name="hotel_check_out"
													id="hotel_check_out">
											</div>
											<div class="col-12 mt-3">
												<label for="preferred_hotel">Preferred Hotel</label>
												<textarea readonly class="form-control" name="preferred_hotel"
													id="preferred_hotel" rows="2"><?= $detail['preferred_hotel'] ?>
												</textarea>
											</div>
										</div>
										<?php endif; ?>
									</div>
								</div>
								<div class="form-group mb-3 row border-bottom pb-3">
									<label class="col-md-7 col-form-label">Hotel transfer/taxi/other transportation
										needed
										(International Travel only)</label>
									<div class="col-md-5">
										<div class="kt-radio-inline">
											<span class="badge badge-light fw-bold">
												<?= $detail['other_transportation'] ?>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div>
								<label class="mt-3 mb-2 fw-bold">Special instructions: </label>
								<p> <?= $detail['special_instructions'] ?> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="kt-portlet">
			<div class="kt-portlet__body">
				<div class="kt-infobox">
					<div class="kt-infobox__header border-bottom pb-1">
						<h4 class="text-dark fw-600">Destination details</h4>
					</div>
					<div class="kt-infobox__body">
						<div id="destinations-review-lists" class="row destinations-review-lists">
							<?php foreach ($detail['destinations'] as $dest): ?>
							<div class="col-md-6 destination-review border p-3">
								<h6 class="pb-2 border-bottom font-weight-bold"><?= $dest['order'] ?> destination </h6>
								<div class="text-dark">
									<p class="mb-1">City/country: <span
											class="destination-city-val"><?= $dest['city'] ?></span> </p>
									<div class="mb-1 d-flex">
										<p class="mb-0">Arrival date: <?= $dest['arriv_date'] ?></p>
										<p class="ml-3 mb-0">Departure date: <?= $dest['depar_date'] ?>,</p>
									</div>
									<p class="mb-1">Project number: <span
											class="destination-project-number-val"><?= $dest['project_number'] ?></span>
									</p>
									<p class="mb-1">Budget monitor: <span class="destination-project-number-val">
											<?= $dest['budget_monitor'] ?></span> </p>
									<p class="mb-1">Lodging: <span class="destination-lodging-val">Rp.
											<?= $dest['d_lodging'] ?></span>
									</p>
									<p class="mb-1">Meals: <span class="destination-meals-val">Rp.
											<?= $dest['d_meals'] ?></span> </p>
									<p class="mb-1">Total (lodging+meals): <span
											class="destination-meals-lodging-total-val">Rp.
											<?= $dest['d_total_lodging_and_meals'] ?></span> </p>
									<p class="mb-1">Number of nights: <span
											class="destination-night-val"><?= $dest['night'] ?></span> </p>
									<p class="mb-1">Total: <span class="destination-total-val">Rp.
											<?= $dest['d_total'] ?></span>
									</p>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
						<div class="row mt-3">
							<h5 class="col-md-2">Total all costs</h5>
							<h5 class="col-md-10">: Rp.
								<?= number_format($detail['total_destinations_cost'], 2, ",", ".") ?></h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="kt-portlet">
			<div class="kt-portlet__body">
				<div class="kt-infobox">
					<div class="kt-infobox__header border-bottom pb-1">
						<h4 class="text-dark fw-600">Documents</h4>
					</div>
					<div class="kt-infobox__body">
						<div class="row">
							<div class="div col-md-3 col-6">
								<div class="p-3">
									<div class="d-flex">
										<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
											class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
											<path
												d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
											<path
												d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
										</svg>
									</div>
									<div class="mt-3">
										<h6 class="fw-bold">EA requests form</h6>
										<a href="#" class="badge badge-primary"><span class="mr-1"><svg
													xmlns="http://www.w3.org/2000/svg" width="10" height="10"
													fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
													<path
														d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
													<path
														d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
												</svg></span> Download</a>
									</div>
								</div>
							</div>
							<?php if ($detail['request_base'] === 'Exteral Invitation'): ?>
							<div class="div col-md-3 col-6">
								<div class="p-3">
									<div class="d-flex">
										<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
											class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
											<path
												d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
											<path
												d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
										</svg>
									</div>
									<div class="mt-3">
										<h6 class="fw-bold">Exteral invitation</h6>
										<a target="_blank" href="<?= base_url('uploads/exteral_invitation/') ?><?= $detail['exteral_invitation_file'] ?>" class="badge badge-primary"><span class="mr-1"><svg
													xmlns="http://www.w3.org/2000/svg" width="10" height="10"
													fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
													<path
														d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
													<path
														d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
												</svg></span> Download</a>
									</div>
								</div>
							</div>
							<?php endif; ?>
							<?php if ($detail['car_rental'] === 'Yes'): ?>
							<div class="div col-md-3 col-6">
								<div class="p-3">
									<div class="d-flex">
										<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
											class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
											<path
												d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
											<path
												d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
										</svg>
									</div>
									<div class="mt-3">
										<h6 class="fw-bold">Car rental memo</h6>
										<a target="_blank" href="<?= base_url('uploads/car_rental_memo/') ?><?= $detail['car_rental_memo'] ?>" class="badge badge-primary"><span class="mr-1"><svg
													xmlns="http://www.w3.org/2000/svg" width="10" height="10"
													fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
													<path
														d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
													<path
														d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
												</svg></span> Download</a>
									</div>
								</div>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="kt-portlet">
			<div class="kt-portlet__body">
				<div class="kt-infobox">
					<div class="kt-infobox__header border-bottom pb-1">
						<h4 class="text-dark fw-600">Signature Status</h4>
					</div>
					<div class="kt-infobox__body">
						<div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded">
							<table class="kt-datatable__table" id="html_table" width="100%" style="display: block;">
								<thead class="kt-datatable__head">
									<tr class="kt-datatable__row" style="left: 0px;">
										<th data-field="Order ID" class="kt-datatable__cell kt-datatable__cell--sort"><span
												style="width: 180px;">Name</span></th>
										<th data-field="Car Make" class="kt-datatable__cell kt-datatable__cell--sort"><span
												style="width: 110px;">Role</span></th>
										<th data-field="Car Make" class="kt-datatable__cell kt-datatable__cell--sort"><span
												style="width: 110px;">Unit</span></th>
										<th data-field="Car Model" class="kt-datatable__cell kt-datatable__cell--sort">
											<span style="width: 110px;">Status</span></th>
										<th data-field="Car Model" class="kt-datatable__cell kt-datatable__cell--sort">
											<span style="width: 110px;">Approved on</span></th>
									</tr>
								</thead>
								<tbody class="kt-datatable__body">
									<tr data-row="0" class="kt-datatable__row" style="left: 0px;">
										<td data-field="Order ID" class="kt-datatable__cell fw-bold"><span
												style="width: 180px;">Yoga
												Altariz</span></td>
										<td data-field="Status" data-autohide-disabled="false" class="kt-datatable__cell">
											<span style="width: 110px;"><span
													class="kt-badge kt-badge--dark kt-badge--inline kt-badge--pill">Head Of
													Units</span></span>
										<td data-field="Car Model" class="kt-datatable__cell"><span
												style="width: 110px;">Epic</span></td>
										<td data-field="Status" data-autohide-disabled="false" class="kt-datatable__cell">
											<span style="width: 110px;"><span
													class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill">Pending</span></span>
										</td>
										<td data-field="Car Model" class="kt-datatable__cell"><span
												style="width: 110px;">22
												Jan 2022, 14.30</span></td>
									</tr>
									<tr data-row="1" class="kt-datatable__row" style="left: 0px;">
										<td data-field="Order ID" class="kt-datatable__cell fw-bold"><span
												style="width: 180px;">Mulqan
												Megaman</span></td>
										<td data-field="Status" data-autohide-disabled="false" class="kt-datatable__cell">
											<span style="width: 110px;"><span
													class="kt-badge kt-badge--dark kt-badge--inline kt-badge--pill">EA
													Assosiate</span></span>
										<td data-field="Car Model" class="kt-datatable__cell"><span
												style="width: 110px;">Eclipse</span></td>
										<td data-field="Status" data-autohide-disabled="false" class="kt-datatable__cell">
											<span style="width: 110px;"><span
													class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">Approved</span></span>
										</td>
										<td data-field="Car Model" class="kt-datatable__cell"><span
												style="width: 110px;">22
												Jan 2022, 14.30</span></td>
									</tr>
									<tr data-row="2" class="kt-datatable__row" style="left: 0px;">
										<td data-field="Order ID" class="kt-datatable__cell fw-bold"><span
												style="width: 180px;">Furqan
												hermawan</span></td>
										<td data-field="Status" data-autohide-disabled="false" class="kt-datatable__cell">
											<span style="width: 110px;"><span
													class="kt-badge kt-badge--dark kt-badge--inline kt-badge--pill">FCO
													Monitor</span></span>

										<td data-field="Car Model" class="kt-datatable__cell"><span
												style="width: 110px;">Epic</span></td>
										<td data-field="Status" data-autohide-disabled="false" class="kt-datatable__cell">
											<span style="width: 110px;"><span
													class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill">Rejected</span></span>
										</td>
										<td data-field="Car Model" class="kt-datatable__cell"><span
												style="width: 110px;">22
												Jan 2022, 14.30</span></td>
									</tr>
									<tr data-row="3" class="kt-datatable__row" style="left: 0px;">
										<td data-field="Order ID" class="kt-datatable__cell fw-bold"><span
												style="width: 180px;">Muhammad Fadhil</span></td>
										<td data-field="Status" data-autohide-disabled="false" class="kt-datatable__cell">
											<span style="width: 110px;"><span
													class="kt-badge kt-badge--dark kt-badge--inline kt-badge--pill">Finance
													teams</span></span>
										<td data-field="Car Model" class="kt-datatable__cell"><span
												style="width: 110px;">ICT4</span></td>
										<td data-field="Status" data-autohide-disabled="false" class="kt-datatable__cell">
											<span style="width: 110px;"><span
													class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill">Pending</span></span>
										</td>
										<td data-field="Car Model" class="kt-datatable__cell"><span
												style="width: 110px;">22
												Jan 2022, 14.30</span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
