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
					<a class="btn btn-primary" href="<?= base_url('request/data-request') ?>">Data request</a>
				</div>
			</div>
		</div>
	</div>

	<div class="kt-portlet__body">
		<div class="kt-grid kt-wizard-v3 kt-wizard-v3--white" id="kt_wizard_v3" data-ktwizard-state="step-first">
			<div class="kt-grid__item">
				<!--begin: Form Wizard Nav -->
				<div class="kt-wizard-v3__nav">
					<div class="kt-wizard-v3__nav-items gap-5">
						<!--doc: Replace A tag with SPAN tag to disable the step link click -->
						<a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step"
							data-ktwizard-state="current">
							<div class="kt-wizard-v3__nav-body">
								<div class="kt-wizard-v3__nav-label text-center">
									<span>1</span> <br> Basic Information
								</div>
								<div class="kt-wizard-v3__nav-bar"></div>
							</div>
						</a>
						<a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step">
							<div class="kt-wizard-v3__nav-body">
								<div class="kt-wizard-v3__nav-label text-center">
									<span>2</span> <br> Destination Details
								</div>
								<div class="kt-wizard-v3__nav-bar"></div>
							</div>
						</a>
						<a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step">
							<div class="kt-wizard-v3__nav-body">
								<div class="kt-wizard-v3__nav-label text-center">
									<span>3</span> <br> Review and Submit
								</div>
								<div class="kt-wizard-v3__nav-bar"></div>
							</div>
						</a>
					</div>
				</div>
				<!--end: Form Wizard Nav -->

			</div>
			<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v3__wrapper">
				<!--begin: Form Wizard Form-->
				<form style="width: 100% !important;" class="kt-form px-5 w-full" id="kt_form">
					<!--begin: Form Wizard Step 1-->
					<div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
						<div class="kt-heading kt-heading--md border-bottom pb-2">Basic Information</div>
						<div class="kt-form__section kt-form__section--first">
							<div class="kt-wizard-v3__form">
								<div class="form-group row">
									<label for="example-search-input" class="col-md-3 col-form-label">Internal
										TOR</label>
									<div class="col-md-9">
										<input required class="form-control" type="search" id="tor_number"
											name="tor_number">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Employment</label>
									<div class="col-md-9">
										<div class="kt-radio-inline">
											<label class="kt-radio">
												<input id="just_for_me" value="Just for me" type="radio"
													name="employment"> Just for me
												<span></span>
											</label>
											<label class="kt-radio">
												<input id="on_behalf" value="On behalf" type="radio" name="employment">
												On behalf
												<span></span>
											</label>
										</div>
									</div>
								</div>
								<div class="form-group row on-behalf-form d-none">
									<label class="col-md-3 col-form-label">Employment status</label>
									<div class="col-md-9">
										<div class="kt-radio-inline">
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
											<div class="row mb-2 participant-el">
												<div class="col-4">
													<input class="form-control" type="text" placeholder="Name"
														class="participant_name" name="participant_name">
												</div>
												<div class="col-4">
													<input class="form-control" type="text" placeholder="Email"
														class="participant_email" name="participant_email">
												</div>
												<div class="col-4">
													<input class="form-control" type="text" placeholder="Title"
														class="participant_title" name="participant_title">
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
													<input class="form-control" type="text" placeholder="Name Of Group"
														class="participant_group_name" name="participant_group_name">
												</div>
												<div class="col-6 mb-2">
													<input class="form-control" type="text" placeholder="Email"
														class="participant_group_email" name="participant_group_email">
												</div>
												<div class="col-6 mb-2">
													<input class="form-control" type="text" placeholder="Contact Person"
														class="contact_person" name="contanct_person">
												</div>
												<div class="col-6 mb-2">
													<input class="form-control" type="number"
														placeholder="Number of participants"
														class="number_of_participants" name="number_of_participants">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="example-search-input" class="col-md-3 col-form-label">Originating
										City</label>
									<div class="col-md-9">
										<select class="form-control" id="exampleSelect1">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
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
									<div class="col-md-6 row">
										<label class="col-6 col-form-label">Country Director Notified</label>
										<div class="col-6">
											<div class="kt-radio-inline">
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
									<div class="col-md-6 row">
										<label class="col-6 col-form-label">Travel advance</label>
										<div class="col-6">
											<div class="kt-radio-inline">
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
								</div>
								<div class="kt-heading kt-heading--md border-bottom pb-2 mt-5 mb-3">Special Requests
								</div>
								<div class="form-group mb-3 row border-bottom">
									<label class="col-md-7 col-form-label">Documents Needed more than 3 days prior to
										departure?</label>
									<div class="col-md-5">
										<div class="kt-radio-inline">
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
									<label class="col-md-7 col-form-label">Car Rental? If yes, attach approved per diem
										variance memo to Travel Manager</label>
									<div class="col-md-5">
										<div class="kt-radio-inline">
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
												<label class="custom-file-label" for="car_rental_memo">Choose
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
										<div class="kt-radio-inline">
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
												<input class="form-control" type="time" name="hotel_check_in"
													id="hotel_check_in">
											</div>
											<div class="col-6">
												<label for="hotel_check_out" class="form-label">
													Check out
												</label>
												<input class="form-control" type="time" name="hotel_check_out"
													id="hotel_check_out">
											</div>
											<div class="col-12 mt-3">
												<label for="preferred_hotel">Preferred Hotel</label>
												<textarea class="form-control" name="preferred_hotel"
													id="preferred_hotel" rows="1"></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group mb-3 row">
									<label class="col-md-7 col-form-label">Hotel transfer/taxi/other transportation
										needed
										(International Travel only)</label>
									<div class="col-md-5">
										<div class="kt-radio-inline">
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
							</div>
						</div>
					</div>
					<!--end: Form Wizard Step 1-->

					<!--begin: Form Wizard Step 2-->
					<div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
						<div class="kt-heading kt-heading--md">Enter the Details of your
							Delivery</div>
						<div class="kt-form__section kt-form__section--first">
							<div class="kt-wizard-v3__form">
								<div class="form-group">
									<label>Package Details</label>
									<input type="text" class="form-control" name="package" placeholder="Package Details"
										value="Complete Workstation (Monitor, Computer, Keyboard & Mouse)">
									<span class="form-text text-muted">Please enter your Pakcage
										Details.</span>
								</div>
								<div class="form-group">
									<label>Package Weight in KG</label>
									<input type="text" class="form-control" name="weight" placeholder="Package Weight"
										value="25">
									<span class="form-text text-muted">Please enter your Package
										Weight in KG.</span>
								</div>
								<div class="kt-wizard-v3__form-label">Package Dimensions</div>
								<div class="row">
									<div class="col-xl-4">
										<div class="form-group">
											<label>Package Width in CM</label>
											<input type="text" class="form-control" name="width"
												placeholder="Package Width" value="110">
											<span class="form-text text-muted">Please enter your
												Package Width in CM.</span>
										</div>
									</div>
									<div class="col-xl-4">
										<div class="form-group">
											<label>Package Height in CM</label>
											<input type="text" class="form-control" name="height"
												placeholder="Package Length" value="90">
											<span class="form-text text-muted">Please enter your
												Package Width in CM.</span>
										</div>
									</div>
									<div class="col-xl-4">
										<div class="form-group">
											<label>Package Length in CM</label>
											<input type="text" class="form-control" name="length"
												placeholder="Package Length" value="150">
											<span class="form-text text-muted">Please enter your
												Package Length in CM.</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end: Form Wizard Step 2-->

					<!--begin: Form Wizard Step 3-->
					<div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
						<div class="kt-heading kt-heading--md">Select your Services</div>
						<div class="kt-form__section kt-form__section--first">
							<div class="kt-wizard-v3__form">
								<div class="form-group">
									<label>Delivery Type</label>
									<select name="delivery" class="form-control">
										<option value="">Select a Service Type Option</option>
										<option value="overnight" selected>Overnight Delivery
											(within 48 hours)</option>
										<option value="express">Express Delivery (within 5
											working days)</option>
										<option value="basic">Basic Delivery (within 5 - 10
											working days)</option>
									</select>
								</div>
								<div class="form-group">
									<label>Packaging Type</label>
									<select name="packaging" class="form-control">
										<option value="">Select a Packaging Type Option</option>
										<option value="regular" selected>Regular Packaging
										</option>
										<option value="oversized">Oversized Packaging</option>
										<option value="fragile">Fragile Packaging</option>
										<option value="frozen">Frozen Packaging</option>
									</select>
								</div>
								<div class="form-group">
									<label>Preferred Delivery Window</label>
									<select name="preferreddelivery" class="form-control">
										<option value="">Select a Preferred Delivery Option
										</option>
										<option value="morning" selected>Morning Delivery
											(8:00AM - 11:00AM)</option>
										<option value="afternoon">Afternoon Delivery (11:00AM -
											3:00PM)</option>
										<option value="evening">Evening Delivery (3:00PM -
											7:00PM)</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<!--end: Form Wizard Step 3-->

					<!--begin: Form Actions -->
					<div class="kt-form__actions">
						<button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u"
							data-ktwizard-type="action-prev">
							Previous
						</button>
						<button class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u"
							data-ktwizard-type="action-submit">
							Submit
						</button>
						<button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u"
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
		$('input[name=employment]').change(function () {
			const value = $(this).val();
			if (value == 'On behalf') {
				$('.on-behalf-form').removeClass('d-none')
			} else {
				$('.on-behalf-form').addClass('d-none')
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
	});

</script>
