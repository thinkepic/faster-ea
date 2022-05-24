<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">
				Create request
				<!-- <small>initialized from remote json file</small> -->
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
					<a class="btn btn-primary" href="<?= base_url('ea_requests/outcoming-requests/pending') ?>">Data
						request</a>
				</div>
			</div>
		</div>
	</div>

	<div class="kt-portlet__body">
		<div class="kt-grid kt-wizard-v3 kt-wizard-v3--white" id="kt_wizard_v3" data-ktwizard-state="step-first">
			<div class="kt-grid__item">
				<!--begin: Form Wizard Nav -->
				<div class="kt-wizard-v3__nav">
					<div class="kt-wizard-v3__nav-items justify-content-between">
						<!--doc: Replace A tag with SPAN tag to disable the step link click -->
						<span class="kt-wizard-v3__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
							<div class="kt-wizard-v3__nav-body">
								<div class="kt-wizard-v3__nav-label text-center">
									<span>1</span> <br> Basic Information
								</div>
								<div class="kt-wizard-v3__nav-bar"></div>
							</div>
						</span>
						<span class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
							<div class="kt-wizard-v3__nav-body">
								<div class="kt-wizard-v3__nav-label text-center">
									<span>2</span> <br> Destination Details
								</div>
								<div class="kt-wizard-v3__nav-bar"></div>
							</div>
						</span>
						<span class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
							<div class="kt-wizard-v3__nav-body">
								<div class="kt-wizard-v3__nav-label text-center">
									<span>3</span> <br> Review
								</div>
								<div class="kt-wizard-v3__nav-bar"></div>
							</div>
						</span>
						<span class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
							<div class="kt-wizard-v3__nav-body">
								<div class="kt-wizard-v3__nav-label text-center">
									<span>4</span> <br> Submit
								</div>
								<div class="kt-wizard-v3__nav-bar"></div>
							</div>
						</span>
					</div>
				</div>
				<!--end: Form Wizard Nav -->

			</div>
			<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v3__wrapper">
				<!--begin: Form Wizard Form-->
				<form style="width: 100% !important; padding-top: 1.2rem !important;" enctype="multipart/form-data"
					method="POST" action="<?= base_url('ea_requests/outcoming-requests/store') ?>"
					class="kt-form px-5 w-full" id="kt_form">
					<!--begin: Form Wizard Step 1-->
					<div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
						<div class="kt-heading kt-heading--md border-bottom pb-2">Please enter basic information</div>
						<div id="step-1-form" class="kt-form__section kt-form__section--first">
							<div class="kt-wizard-v3__form">
								<div class="form-group row">
									<label for="example-search-input" class="col-md-3 col-form-label">Request Base
										on</label>
									<div class="col-md-9">
										<div id="request_base" class="kt-radio-inline">
											<label class="kt-radio">
												<input value="Internal TOR" type="radio" name="request_base">
												Internal
												TOR
												<span></span>
											</label>
											<label class="kt-radio">
												<input value="Exteral Invitation" type="radio" name="request_base">
												Exteral Invitation
												<span></span>
											</label>

										</div>
									</div>
								</div>
								<input type="text" value="<?= $requestor_data['id'] ?>" id="requestor_id" class="d-none"
									name="requestor_id">
								<div class="form-group row tor-form d-none">
									<label for="example-search-input" class="col-md-3 col-form-label">TOR Number</label>
									<div class="col-md-9">
										<input type="text" placeholder="Enter tor number" id="tor_number"
											class="form-control" name="tor_number">
									</div>
								</div>
								<div class="form-group row exteral-form d-none">
									<label for="example-search-input" class="col-md-3 col-form-label">Supporting
										document</label>
									<div class="col-md-9">
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="exteral_invitation"
												id="exteral_invitation">
											<label class="custom-file-label" for="exteral_invitation">Choose
												file</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="ea_online_number" class="col-md-3 col-form-label">EA Online Number <small>(if known)</small></label>
									<div class="col-md-9">
										<input type="text" placeholder="Enter EA online number" id="ea_online_number"
											class="form-control" name="ea_online_number">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Employment</label>
									<div class="col-md-9">
										<div id="employment" class="kt-radio-inline">
											<label class="kt-radio">
												<input value="Just for me" type="radio" name="employment"> Just for me
												<span></span>
											</label>
											<label class="kt-radio">
												<input value="On behalf" type="radio" name="employment">
												On behalf
												<span></span>
											</label>
										</div>
									</div>
								</div>
								<div class="form-group row on-behalf-form d-none">
									<label class="col-md-3 col-form-label">Employment status</label>
									<div class="col-md-9">
										<div id="employment_status" class="kt-radio-inline">
											<label class="kt-radio">
												<input id="consultant" value="Consultant" type="radio"
													name="employment_status"> Consultant
												<span></span>
											</label>
											<label class="kt-radio">
												<input id="other" value="Other" type="radio" name="employment_status">
												Other
												<span></span>
											</label>
											<label class="kt-radio">
												<input id="group" value="Group" type="radio" name="employment_status">
												Group
												<span></span>
											</label>
										</div>
									</div>
								</div>
								<div id="participants-el" class="form-group row d-none">
									<label for="participants" class="col-md-3 col-form-label">Participants</label>
									<div class="col-md-9">
										<div class="participants-lists mb-3">
											<div class="row mb-2 participant-form">
												<div class="col-4">
													<input class="form-control participant_name" type="text"
														placeholder="Name" name="participant_name[]">
												</div>
												<div class="col-4">
													<input class="form-control participant_email" type="text"
														placeholder="Email" name="participant_email[]">
												</div>
												<div class="col-4">
													<input class="form-control participant_title" type="text"
														placeholder="Title" name="participant_title[]">
												</div>
											</div>
										</div>
										<div class="d-flex justify-content-end">
											<button id="btn-more-participant"
												class="btn btn-success btn-sm btn-icon-sm">
												<i class="la la-plus"></i>
												Add more participant
											</button>
										</div>
									</div>
								</div>
								<div id="participants-group-el" class="form-group row d-none">
									<label for="participants_groups"
										class="col-md-3 col-form-label">Participants</label>
									<div class="col-md-9">
										<div class="participants-group-lists mb-3">
											<div class="row mb-2">
												<div class="col-6 mb-2">
													<input class="form-control participant_group_name" type="text"
														placeholder="Name Of Group" id="participant_group_name"
														name="participant_group_name">
												</div>
												<div class="col-6 mb-2">
													<input class="form-control participant_group_email" type="text"
														placeholder="Email" id="participant_group_email"
														name="participant_group_email">
												</div>
												<div class="col-6 mb-2">
													<input class="form-control contact_person" type="text"
														placeholder="Contact Person"
														id="participant_group_contact_person"
														name="participant_group_contact_person">
												</div>
												<div class="col-6 mb-2">
													<input class="form-control number_of_participants" type="number"
														placeholder="Number of participants" id="number_of_participants"
														name="number_of_participants">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="example-search-input" class="col-md-3 col-form-label">Originating
										City</label>
									<div class="col-md-9">
										<select data-url="<?= site_url('api/cities') ?>" class="form-control"
											name="originating_city" id="originating_city">
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="example-date-input" class="col-md-3 col-form-label">Date</label>
									<div class="col-md-4">
										<label for="departure_date" class="form-label">
											Departure date
										</label>
										<input class="form-control" type="date" id="departure_date"
											name="departure_date">
									</div>
									<div class="col-md-1">
									</div>
									<div class="col-md-4">
										<label for="departure_date" class="form-label">
											Return date
										</label>
										<input class="form-control" type="date" id="return_date" name="return_date">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-3 col-form-label">Country Director Notified</label>
									<div class="col-9">
										<div id="country_director_notified" class="kt-radio-inline">
											<label class="kt-radio">
												<input type="radio" value="Yes" name="country_director_notified">
												Yes
												<span></span>
											</label>
											<label class="kt-radio">
												<input type="radio" value="No" name="country_director_notified"> No
												<span></span>
											</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-3 col-form-label">Travel advance</label>
									<div class="col-9">
										<div id="travel_advance" class="kt-radio-inline">
											<label class="kt-radio">
												<input type="radio" value="Yes" name="travel_advance"> Yes
												<span></span>
											</label>
											<label class="kt-radio">
												<input type="radio" value="No" name="travel_advance"> No
												<span></span>
											</label>
										</div>
									</div>
								</div>
								<div class="kt-heading kt-heading--md border-bottom pb-2 mt-5 mb-3">Special Requests
								</div>
								<div class="special-request-el">
									<div class="form-group mb-3 row border-bottom">
										<label class="col-md-7 col-form-label">Documents Needed more than 3 days prior
											to
											departure?</label>
										<div class="col-md-5">
											<div id="need_documents" class="kt-radio-inline">
												<label class="kt-radio">
													<input value="Yes" type="radio" name="need_documents">
													Yes
													<span></span>
												</label>
												<label class="kt-radio">
													<input value="No" type="radio" name="need_documents">
													No
													<span></span>
												</label>
											</div>
											<div class="form-group mt-4 documents-description-el d-none">
												<label for="document_description">What document do you need?</label>
												<textarea class="form-control" name="document_description"
													id="document_description" rows="2"></textarea>
											</div>
										</div>
									</div>
									<div class="form-group mb-3 row border-bottom">
										<label class="col-md-7 col-form-label">Car Rental? If yes, attach approved per
											diem
											variance memo to Travel Manager</label>
										<div class="col-md-5">
											<div id="car_rental" class="kt-radio-inline">
												<label class="kt-radio">
													<input value="Yes" type="radio" name="car_rental">
													Yes
													<span></span>
												</label>
												<label class="kt-radio">
													<input value="No" type="radio" name="car_rental">
													No
													<span></span>
												</label>
											</div>
											<div class="form-group mt-4 car-rental-memo-el d-none">
												<label for="car_rental_memo">Please upload memo</label>
												<div class="custom-file">
													<input type="file" class="custom-file-input" name="car_rental_memo"
														id="car_rental_memo">
													<label class="custom-file-label" for="customFile">Choose
														file</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group mb-3 row border-bottom">
										<label class="col-md-7 col-form-label">Hotel Reservations? If yes, specify dates
											in/out
											and hotel(s) if known.</label>
										<div class="col-md-5">
											<div id="hotel_reservations" class="kt-radio-inline">
												<label class="kt-radio">
													<input value="Yes" type="radio" name="hotel_reservations">
													Yes
													<span></span>
												</label>
												<label class="kt-radio">
													<input value="No" type="radio" name="hotel_reservations">
													No
													<span></span>
												</label>
											</div>
											<div class="form-group row mt-4 hotel-reservations-el d-none">
												<div class="col-6">
													<label for="hotel_check_in" class="form-label">
														Check in
													</label>
													<input class="form-control" type="date" name="hotel_check_in"
														id="hotel_check_in">
												</div>
												<div class="col-6">
													<label for="hotel_check_out" class="form-label">
														Check out
													</label>
													<input class="form-control" type="date" name="hotel_check_out"
														id="hotel_check_out">
												</div>
												<div class="col-12 mt-3">
													<label for="preferred_hotel">Preferred Hotel</label>
													<textarea class="form-control" name="preferred_hotel"
														id="preferred_hotel" rows="2"></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group mb-3 row">
										<label class="col-md-7 col-form-label">Hotel transfer/taxi/other transportation
											needed
											(International Travel only)</label>
										<div class="col-md-5">
											<div id="other_transportation" class="kt-radio-inline">
												<label class="kt-radio">
													<input value="Yes" type="radio" name="other_transportation">
													Yes
													<span></span>
												</label>
												<label class="kt-radio">
													<input value="No" type="radio" name="other_transportation">
													No
													<span></span>
												</label>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-search-input" class="col-md-3 col-form-label">
											Special Instruction
										</label>
										<div class="col-md-9">
											<textarea class="form-control" name="special_instructions"
												id="special_instructions" rows="2"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end: Form Wizard Step 1-->

					<!--begin: Form Wizard Step 2-->
					<div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
						<div class="kt-heading kt-heading--md border-bottom pb-2">Please enter destination details</div>
						<div id="step-2-form" class="kt-form__section kt-form__section--first">
							<div class="kt-wizard-v3__form">
								<div class="destinations-lists">
									<div class="destination pb-2 mb-5 border-bottom">
										<h5 class="mb-3"><span>1st</span> Destination</h5>
										<input type="text" class="d-none destination_order" value="1st"
											name="destination_order[]">
										<div class="form-group row">
											<label for="example-search-input"
												class="col-md-3 col-form-label">City/country</label>
											<div class="col-md-9">
												<input placeholder="Enter city/country"
													class="form-control destination_city" type="text"
													name="destination_city[]">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-date-input" class="col-md-3 col-form-label">Date</label>
											<div class="col-md-4">
												<label for="departure_date" class="form-label">
													Arrival date
												</label>

												<input class="form-control destination_arrival_date" type="date"
													name="destination_arrival_date[]">
											</div>
											<div class="col-md-1">
											</div>
											<div class="col-md-4">
												<label for="departure_date" class="form-label">
													Departure date
												</label>
												<input class="form-control destination_departure_date" type="date"
													name="destination_departure_date[]">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-search-input" class="col-md-3 col-form-label">Project
												Number</label>
											<div class="col-md-9">
												<input maxlength="9" placeholder="1297.0446"
													class="form-control project_number" type="text"
													name="project_number[]">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-search-input" class="col-md-3 col-form-label">Budget
												Monitor</label>
											<div class="col-md-9">
												<input value="Nico Hardiyanto"
													class="form-control destination_budget_monitor" type="text"
													name="destination_budget_monitor[]">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-search-input"
												class="col-md-3 col-form-label">Lodging</label>
											<div class="col-md-9">
												<input placeholder="Estimate lodging cost" class="form-control lodging"
													type="text" name="lodging[]">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-search-input"
												class="col-md-3 col-form-label">Meals</label>
											<div class="col-md-9">
												<input placeholder="Input M&IE standard cost" class="form-control meals"
													type="text" name="meals[]">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-search-input" class="col-md-3 col-form-label">Total
												(lodging + meals)</label>
											<div class="col-md-9">
												<input readonly class="form-control meals_lodging_total readonly-form"
													type="text" name="meals_lodging_total[]">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-search-input"
												class="col-md-3 col-form-label">Night</label>
											<div class="col-md-9">
												<input placeholder="# of nights" class="form-control night"
													type="number" name="night[]">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-search-input"
												class="col-md-3 col-form-label">Total</label>
											<div class="col-md-9">
												<input readonly class="form-control total readonly-form" type="text"
													name="total[]">
											</div>
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-end mt-3">
									<button id="btn-more-destination" class="btn btn-success btn-sm btn-icon-sm">
										<i class="la la-plus"></i>
										Add more destination
									</button>
								</div>
							</div>
						</div>
					</div>
					<!--end: Form Wizard Step 2-->

					<!--begin: Form Wizard Step 3-->
					<div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
						<div class="kt-heading kt-heading--md pb-2 border-bottom">Please review the data</div>
						<div class="kt-form__section kt-form__section--first">
							<div class="text-dark">
								<div class="step-1-review pb-3 border-bottom">
									<!--  Data dari session -->
									<h5 class="mb-3">Basic information :</h5>
									<div class="pb-2 mb-2 border-bottom">
										<p class="mb-1"><?= $requestor_data['username'] ?></p>
										<p class="mb-1">Email: <?= $requestor_data['email'] ?></p>
										<p class="mb-1">Division: <?= $requestor_data['project_name'] ?></p>
										<p class="mb-1">Purpose: <?= $requestor_data['unit_name'] ?></p>
									</div>
									<div class="pt-2 mb-2 pb-2">
										<p class="mb-1">Request base: <span class="review-request-base-val"></span>
											<span class="review-tor-number d-none"></span></p>
										<p class="mb-1">Employment: <span class="review-employment-val"></span>
										</p>
										<p class="mb-1">Originating city: <span class="review-originating-city"></span>
										</p>
										<div class="mb-1 d-flex">
											<p class="mr-5 mb-0">Departure date: <span
													class="review-departure-date"></span></p>
											<p class="mb-0">Return date: <span class="review-return-date"></span></p>
										</div>
									</div>
									<div class="special-request-review mt-2">
										<table class="table table-bordered">
											<tbody>
												<tr>
													<td>
														Country director notified?
													</td>
													<td class="text-center review-director-notif-val"> - </td>
												</tr>
												<tr>
													<td>
														Travel Advance?
													</td>
													<td class="text-center review-travel-advance-val">-</td>
												</tr>
												<tr>
													<td>Documents Needed more than 3 days prior to departure?</td>
													<td class="text-center review-need-documents-val">-</td>
												</tr>
												<tr>
													<td>Car Rental?</td>
													<td class="text-center review-car-rental-val">-</td>
												</tr>
												<tr>
													<td>Hotel Reservations?</td>
													<td class="text-center review-hotel-res-val">-</td>
												</tr>
												<tr>
													<td>Hotel transfer/taxi/other transportation needed (International
														Travel only)</td>
													<td class="text-center review-other-trasnport-val">-</td>
												</tr>
											</tbody>
										</table>
										<div class="pl-3">
											<p class="mt-2 mb-0 font-weight-bold">Special instructions: </p>
											<p class="review-special-instrc"></p>
										</div>
									</div>
								</div>
								<div class="step-2-review py-3 border-bottom">
									<h5 class="mb-3">Destination details :</h5>
									<div id="destinations-review-lists" class="row destinations-review-lists">

									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end: Form Wizard Step 3-->

					<!--begin: Form Wizard Step 4-->
					<div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
						<div class="kt-heading kt-heading--md pb-2 border-bottom">Final step, select head of units and
							submit
						</div>
						<div class="kt-form__section kt-form__section--first">
							<div class="d-flex justify-content-center align-items-center py-5">
								<div class="mr-5">
									<img style="width: 10rem; height: auto;"
										src="<?= site_url('assets/images/undraw_mail_re_duel.svg') ?>" alt="">
								</div>
								<div>
									<div class="form-group">
										<label class="d-block">Please select head of units</label>
										<select name="head_of_units_id" class="form-control" id="head_of_units_id">
											<?php foreach ($head_of_units as $item): ?>
											<option value="<?= $item['id'] ?>"><?= $item['username'] ?>
												(<?= $item['email'] ?>)</option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end: Form Wizard Step 4-->

					<!--begin: Form Actions -->
					<div class="kt-form__actions">
						<button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u"
							data-ktwizard-type="action-prev">
							Previous
						</button>
						<button id="btn-submit" type="submit"
							class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u"
							data-ktwizard-type="action-submit">
							Submit
						</button>
						<button id="btn-next-step"
							class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u"
							data-ktwizard-type="action-next">
							Next Step
						</button>
					</div>
					<!--end: Form Actions -->
				</form>
				<!--end: Form Wizard Form-->
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {

		// Wizard
		// Class definition
		var KTWizard3 = function () {
			// Base elements
			var wizardEl;
			var formEl;
			var validator;
			var wizard;

			// Private functions
			var initWizard = function () {
				// Initialize form wizard
				wizard = new KTWizard('kt_wizard_v3', {
					startStep: 1,
				});

				// Validation before going to next page
				wizard.on('beforeNext', function (wizardObj) {
					updateStepReview()
					const step = wizardObj.currentStep
					$('p.error').remove();
					if (step == 1) {
						if (!validateStep1()) {
							wizardObj.stop();
							swal.fire({
								"title": "",
								"text": "Please fill all required fields",
								"type": "error",
								"confirmButtonClass": "btn btn-dark"
							});
						}
					}
					if (step == 2) {
						if (!validateStep2()) {
							wizardObj.stop();
							swal.fire({
								"title": "",
								"text": "Please fill all required fields",
								"type": "error",
								"confirmButtonClass": "btn btn-dark"
							});
						}
					}
				});

				// Change event
				wizard.on('change', function (wizard) {
					KTUtil.scrollTop();
				});
			}

			return {
				// public functions
				init: function () {
					wizardEl = KTUtil.get('kt_wizard_v3');
					formEl = $('#kt_form');
					initWizard();
				}
			};
		}();

		wizard = new KTWizard('kt_wizard_v3', {
			startStep: 1,
		});

		KTWizard3.init();

		$('#originating_city').select2({
			placeholder: 'Select originating city',
			ajax: {
				'url': `${base_url}api/cities`,
				data: function (params) {
					return {
						q: params.term,
						select2: true,
					}
				},
				processResults: function (response) {
					return {
						results: response.result
					}
				}
			}
		})

		$('#head_of_units_id').select2({
			placeholder: 'Select head of units',
		})

		$('input[name=employment]').change(function () {
			const value = $(this).val();
			if (value == 'On behalf') {
				$('.on-behalf-form').removeClass('d-none')
				$('input[name=employment_status]').prop('checked', false);
			} else {
				$('.on-behalf-form').addClass('d-none')
				$('#participants-el').addClass('d-none')
				$('#participants-group-el').addClass('d-none')
			}
		});

		$('input[name=request_base]').change(function () {
			const value = $(this).val();
			if (value == 'Internal TOR') {
				$('.tor-form').removeClass('d-none')
				$('.exteral-form').addClass('d-none')
			} else {
				$('.exteral-form').removeClass('d-none')
				$('.tor-form').addClass('d-none')
			}
		});

		$('input[name=employment_status]').change(function () {
			const value = $(this).val();
			if (value == 'Consultant' || value == 'Other') {
				$('#participants-el').removeClass('d-none')
				$('#participants-group-el').addClass('d-none')
			} else {
				$('#participants-el').addClass('d-none')
				$('#participants-group-el').removeClass('d-none')
			}
		});

		$('input[name=need_documents]').change(function () {
			const value = $(this).val();
			if (value == 'Yes') {
				$('.documents-description-el').removeClass('d-none')
			} else {
				$('.documents-description-el').addClass('d-none')
			}
		});

		$('input[name=car_rental]').change(function () {
			const value = $(this).val();
			if (value == 'Yes') {
				$('.car-rental-memo-el').removeClass('d-none')
			} else {
				$('.car-rental-memo-el').addClass('d-none')
			}
		});

		$('input[name=hotel_reservations]').change(function () {
			const value = $(this).val();
			if (value == 'Yes') {
				$('.hotel-reservations-el').removeClass('d-none')
			} else {
				$('.hotel-reservations-el').addClass('d-none')
			}
		});

		$('.lodging').number(true, 0, '', '.');
		$('.meals').number(true, 0, '', '.');
		$('.meals_lodging_total').number(true, 0, '', '.');
		$('.total').number(true, 0, '', '.');
		$('.destination-lodging-val').number(true, 0, '', '.');

		const updateCosts = (el) => {
			const parent = el.parent().parent().parent()
			const lodging = parent.find('.lodging').val()
			const meals = parent.find('.meals').val()
			const night = parent.find('.night').val()
			const mealsLodgingEl = parent.find('.meals_lodging_total')
			const mealsLodging = Number(lodging) + Number(meals)
			mealsLodgingEl.val(mealsLodging)
			const totalEl = parent.find('.total')
			const total = Number(night) * mealsLodging
			totalEl.val(total)
		}

		const validateStep1 = () => {
			const requestBase = $('input[name=request_base]:checked').val()
			const employment = $('input[name=employment]:checked').val()
			const city = $('select[name=originating_city]').val()
			const departureDate = $('input[name=departure_date]').val()
			const returnDate = $('input[name=return_date]').val()
			const directorNotified = $('input[name=country_director_notified]:checked').val()
			const travelAdvance = $('input[name=travel_advance]:checked').val()
			const needDocuments = $('input[name=need_documents]:checked').val()
			const carRental = $('input[name=car_rental]:checked').val()
			const hotelRes = $('input[name=hotel_reservations]:checked').val()
			const otherTran = $('input[name=other_transportation]:checked').val()
			const specialInstr = $('#special_instructions').val()
			const errors = []

			if (requestBase) {
				if (requestBase == 'Internal TOR') {
					const torNumber = $('input[name=tor_number]').val()
					if (!torNumber) {
						errors.push({
							type: 1,
							field: 'tor_number'
						})
					}
				} else {
					if ($('#exteral_invitation').get(0).files.length === 0) {
						errors.push({
							type: 1,
							field: 'exteral_invitation'
						})
					}
				}
			} else {
				errors.push({
					type: 1,
					field: 'request_base'
				})
			}

			if (employment) {
				if (employment == 'On behalf') {
					const employmentStatus = $('input[name=employment_status]:checked').val()
					if (!employmentStatus) {
						errors.push({
							type: 1,
							field: 'employment_status'
						})
					} else {
						if (employmentStatus == 'Group') {
							const groupName = $('input[name=participant_group_name]').val()
							if (!groupName) {
								errors.push({
									type: 1,
									field: 'participant_group_name'
								})
							}
							const groupEmail = $('input[name=participant_group_email]').val()
							if (!groupEmail) {
								errors.push({
									type: 1,
									field: 'participant_group_email'
								})
							}
							const groupCP = $('input[name=participant_group_contact_person]').val()
							if (!groupCP) {
								errors.push({
									type: 1,
									field: 'participant_group_contact_person'
								})
							}
							const groupParticipants = $('input[name=number_of_participants]').val()
							if (!groupParticipants) {
								errors.push({
									type: 1,
									field: 'number_of_participants'
								})
							}
						} else {
							$('.participant_name').each(function () {
								let value = $(this).val()
								if (!value) {
									$('<p class="error mt-1 mb-0">This is field required</p>')
										.insertAfter($(this))
								}
							});

							$('.participant_email').each(function () {
								let value = $(this).val()
								if (!value) {
									$('<p class="error mt-1 mb-0">This is field required</p>')
										.insertAfter($(this))
								}
							});

							$('.participant_title').each(function () {
								let value = $(this).val()
								if (!value) {
									$('<p class="error mt-1 mb-0">This is field required</p>')
										.insertAfter($(this))
								}
							});

						}
					}
				}
			} else {
				errors.push({
					type: 1,
					field: 'employment'
				})
			}

			if (!departureDate) {
				errors.push({
					type: 1,
					field: 'departure_date'
				})
			}

			if (!returnDate) {
				errors.push({
					type: 1,
					field: 'return_date'
				})
			}

			if (!city) {
				errors.push({
					type: 1,
					field: 'originating_city'
				})
			}

			if (!directorNotified) {
				errors.push({
					type: 1,
					field: 'country_director_notified'
				})
			}

			if (!travelAdvance) {
				errors.push({
					type: 1,
					field: 'travel_advance'
				})
			}

			if (!needDocuments) {
				errors.push({
					type: 2,
					field: 'need_documents'
				})
			} else {
				if (needDocuments == 'Yes') {
					const documentDescriptions = $('#document_description').val()
					if (!documentDescriptions) {
						errors.push({
							type: 1,
							field: 'document_description'
						})
					}
				}
			}

			if (!carRental) {
				errors.push({
					type: 2,
					field: 'car_rental'
				})
			} else {
				if (carRental == 'Yes') {
					if ($('#car_rental_memo').get(0).files.length === 0) {
						errors.push({
							type: 1,
							field: 'car_rental_memo'
						})
					}
				}
			}
			if (!hotelRes) {
				errors.push({
					type: 2,
					field: 'hotel_reservations'
				})
			} else {
				if (hotelRes == 'Yes') {
					const checkIn = $('input[name=hotel_check_in]').val()
					const checkOut = $('input[name=hotel_check_out]').val()
					const preferredHotel = $('#preferred_hotel').val()
					// if (!checkIn) {
					// 	errors.push({
					// 		type: 2,
					// 		field: 'hotel_check_in'
					// 	})
					// }
					// if (!checkOut) {
					// 	errors.push({
					// 		type: 2,
					// 		field: 'hotel_check_out'
					// 	})
					// }
					// if (!preferredHotel) {
					// 	errors.push({
					// 		type: 1,
					// 		field: 'preferred_hotel'
					// 	})
					// }
				}
			}

			if (!otherTran) {
				errors.push({
					type: 2,
					field: 'other_transportation'
				})
			}

			// if (!specialInstr) {
			// 	errors.push({
			// 		type: 2,
			// 		field: 'special_instructions'
			// 	})
			// }

			if (errors.length > 0) {
				showErrors(errors)
				return false
			} else {
				return true
			}
		}

		const validateStep2 = () => {
			let valid = true
			$('#step-2-form input:not([readonly])').each(function () {
				let value = $(this).val()
				if (!value) {
					valid = false
					$(this).parent().append(
						'<p class="error mt-1 mb-0">This field is required</p>')
				}
			});
			return valid
		}

		const showErrors = (errors) => {
			errors.forEach(err => {
				if (err.type == 1) {
					$(`#${err.field}`).parent().append(
						'<p class="error mt-1 mb-0">This field is required</p>')
				} else if (err.type == 2) {
					$('<p class="error mt-1 mb-0">This field is required</p>').insertAfter($(
						`#${err.field}`))
				}
			})
		}

		const updateDestinationsReview = () => {
			let data = []
			$('.destinations-review-lists').html('');
			$('.destination').each(function () {
				const order = $(this).find('.destination_order').val()
				const city = $(this).find('.destination_city').val()
				let arrival = $(this).find('.destination_arrival_date').val()
				let departure = $(this).find('.destination_departure_date').val()
				arrival = dayjs(arrival).format('DD MMMM YYYY')
				departure = dayjs(departure).format('DD MMMM YYYY')
				const budgetMonitor = $(this).find('.destination_budget_monitor').val()
				const projectNumber = $(this).find('.project_number').val()
				const lodging = $(this).find('.lodging').val()
				const meals = $(this).find('.meals').val()
				const mealsLodging = $(this).find('.meals_lodging_total').val()
				const night = $(this).find('.night').val()
				const total = $(this).find('.total').val()

				const html = `<div class="col-md-6 destination-review border p-3">
								<h6 class="pb-2 border-bottom font-weight-bold">${order} destination </h6>
								<p class="mb-1">City/country: <span class="destination-city-val">${city}</span> </p>
								<div class="mb-1 d-flex">
									<p class="mr-3 mb-0">Departure date: ${departure},</p>
									<p class="mb-0">Arrival date: ${arrival}</p>
								</div>
								<p class="mb-1">Project number: <span
										class="destination-project-number-val">${projectNumber}</span> </p>
								<p class="mb-1">Budget monitor: <span
										class="destination-project-number-val">${budgetMonitor}</span> </p>
								<p class="mb-1">Lodging: Rp. <span class="destination-lodging-val">${lodging}</span>
								</p>
								<p class="mb-1">Meals: Rp. <span class="destination-meals-val">${meals}</span> </p>
								<p class="mb-1">Total (lodging+meals): Rp. <span
										class="destination-meals-lodging-total-val">${mealsLodging}</span> </p>
								<p class="mb-1">Number of nights: <span
										class="destination-night-val">${night}</span> </p>
								<p class="mb-1">Total: Rp. <span class="destination-total-val">${total}</span>
								</p>
								</div>`;
				$('.destinations-review-lists').append(html);
			});
			$('.destination-lodging-val, .destination-meals-val, .destination-meals-lodging-total-val, .destination-total-val').number(true, 0, '', '.');
		}

		const updateStepReview = () => {
			// Basic Information
			const requestBaseValue = $('input[name=request_base]:checked').val()
			$('.review-request-base-val').text(requestBaseValue)
			if (requestBaseValue == 'Internal TOR') {
				$('.review-tor-number').removeClass('d-none')
				const torNumber = $('input[name=tor_number]').val()
				$('.review-tor-number').text(`(${torNumber})`)
			} else {
				$('.review-tor-number').addClass('d-none')
			}
			$('.review-employment-val').text($('input[name=employment]:checked').val())
			$('.review-originating-city').text($('#originating_city').val())
			const departureDate = dayjs($('input[name=departure_date]').val()).format('DD MMMM YYYY')
			const returnDate = dayjs($('input[name=return_date]').val()).format('DD MMMM YYYY')
			$('.review-departure-date').text(departureDate)
			$('.review-return-date').text(returnDate)

			// Special requests
			$('.review-director-notif-val').text($('input[name=country_director_notified]:checked').val())
			$('.review-travel-advance-val').text($('input[name=travel_advance]:checked').val())
			$('.review-need-documents-val').text($('input[name=need_documents]:checked').val())
			$('.review-car-rental-val').text($('input[name=car_rental]:checked').val())
			$('.review-hotel-res-val').text($('input[name=hotel_reservations]:checked').val())
			$('.review-other-trasnport-val').text($('input[name=other_transportation]:checked').val())
			$('.review-special-instrc').text($('#special_instructions').val())

			// Destinations 
			updateDestinationsReview()
		}

		$(document).on('keyup', '.lodging, .meals, .night', function () {
			updateCosts($(this))
		});

		$(document).on('click', '#btn-more-participant', function (e) {
			e.preventDefault()
			const html = `
                <div class="row mb-2 participant-form">
                        <div class="col-4">
                            <input class="form-control participant_name" type="text" placeholder="Name"
                                 name="participant_name[]">
                        </div>
                        <div class="col-4">
                            <input class="form-control participant_email" type="text" placeholder="Email"
                                 name="participant_email[]">
                        </div>
                        <div class="col-4">
                            <input class="form-control participant_title" type="text" placeholder="Title"
                             name="participant_title[]">
                        </div>
                    </div>`;
			$('.participants-lists').append(html);
		})

		$(document).on('click', '#btn-more-destination', function (e) {
			e.preventDefault()
			var list = $('.destination').length + 1
			let order
			if (list == 2) {
				order = '2nd'
			} else if (list == 3) {
				order = '3rd'
				$(this).addClass('d-none')
			}
			// else if (list == 4) {
			// 	order = '4th'
			// } else if (list == 5) {
			// 	order = '5th'
			// 	$(this).addClass('d-none')
			// }

			const html = `<div class="destination pb-2 mb-5 border-bottom">
										<h5 class="mb-3"><span>${order}</span> Destination</h5>
										<input type="text" class="d-none destination_order" value="${order}" name="destination_order[]">
										<div class="form-group row">
											<label for="example-search-input"
												class="col-md-3 col-form-label">City/country</label>
											<div class="col-md-9">
												<input placeholder="Enter city/country" class="form-control destination_city" type="text"
													name="destination_city[]">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-date-input" class="col-md-3 col-form-label">Date</label>
											<div class="col-md-4">
												<label for="departure_date" class="form-label">
													Arrival date
												</label>

												<input class="form-control destination_arrival_date" type="date"
													name="destination_arrival_date[]">
											</div>
											<div class="col-md-1">
											</div>
											<div class="col-md-4">
												<label for="departure_date" class="form-label">
													Departure date
												</label>
												<input class="form-control destination_departure_date" type="date"
													name="destination_departure_date[]">
											</div>						
										</div>
										<div class="form-group row">
											<label for="example-search-input" class="col-md-3 col-form-label">Project
												Number</label>
											<div class="col-md-9">
												<input maxlength="9" placeholder="1297.0446" class="form-control project_number"
													type="text" name="project_number[]">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-search-input" class="col-md-3 col-form-label">Budget
												Monitor</label>
											<div class="col-md-9">
												<input value="Nico Hardiyanto" class="form-control destination_budget_monitor" type="text"
													name="destination_budget_monitor[]">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-search-input"
												class="col-md-3 col-form-label">Lodging</label>
											<div class="col-md-9">
												<input placeholder="Estimate lodging cost" class="form-control lodging"
													type="text" name="lodging[]">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-search-input"
												class="col-md-3 col-form-label">Meals</label>
											<div class="col-md-9">
												<input placeholder="Input M&IE standard cost" class="form-control meals"
													type="text" name="meals[]">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-search-input" class="col-md-3 col-form-label">Total
												(lodging + meals)</label>
											<div class="col-md-9">
												<input readonly class="form-control meals_lodging_total readonly-form" type="text"
													name="meals_lodging_total[]">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-search-input"
												class="col-md-3 col-form-label">Night</label>
											<div class="col-md-9">
												<input placeholder="# of nights" class="form-control night"
													type="number" name="night[]">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-search-input"
												class="col-md-3 col-form-label">Total</label>
											<div class="col-md-9">
												<input readonly class="form-control total readonly-form" type="text" name="total[]">
											</div>
										</div>
									</div>`;
			$('.destinations-lists').append(html);
			$('.lodging').number(true, 0, '', '.');
			$('.meals').number(true, 0, '', '.');
			$('.meals_lodging_total').number(true, 0, '', '.');
			$('.total').number(true, 0, '', '.');
		})

		$("#kt_form").submit(function (e) {
			e.preventDefault();
			$('p.error').remove();
			const headOfUnits = $('#head_of_units_id').val()
			if (!headOfUnits) {
				swal.fire({
					"title": "Please select head of units!",
					"type": "error",
					"confirmButtonClass": "btn btn-dark"
				});
				$('<p class="error mt-1 mb-0">Please select head of units</p>').insertAfter($(
					'#head_of_units_email'))
			} else {
				const formData = new FormData(this);
				const loader = `<div style="width: 5rem; height: 5rem;" class="spinner-border mb-5" role="status"></div>
				<h5 class="mt-2">Please wait</h5>
				<p>Submit data and sending email...</p>`
				$.ajax({
					url: $(this).attr("action"),
					type: 'POST',
					data: formData,
					beforeSend: function () {
						$('p.error').remove();
						Swal.fire({
									html: loader,
									showConfirmButton: false,
									allowEscapeKey: false,
									allowOutsideClick: false,
								});
						KTApp.progress($('#btn-submit'))
					},
					error: function (xhr) {
						KTApp.unprogress($('#btn-submit'))
						const response = xhr.responseJSON;
						console.log(response)
						swal.fire({
							"title": "Something went wrong!",
							"text": response.message,
							"type": "error",
							"confirmButtonClass": "btn btn-dark"
						});
					},
					success: function (response) {
						console.log(response)
						KTApp.unprogress($('#btn-submit'))
						swal.fire({
							"title": "Saved!",
							"text": response.message,
							"type": "success",
							"confirmButtonClass": "btn btn-dark"
						}).then((result) => {
							console.log(result)
							if (result.value) {
								window.location = base_url +
									'ea_requests/outcoming-requests/pending'
							}
						})
					},
					cache: false,
					contentType: false,
					processData: false
				});
			}
		});
	});

</script>
