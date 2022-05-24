<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Edit items</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form enctype="multipart/form-data" method="POST"
			action="<?= base_url('ea_requests/report/update_other_items') ?>/<?= $detail['id'] ?>" id="other-items-form">
			<div class="modal-body">
				<input type="text" class="d-none" id="method_" value="PUT">
				<div class="form-group">
					<label for="cost" class="d-block">Item</label>
					<select name="item" id="item">
						<option value="">Select items</option>
						<option <?= ($detail['item'] == 'Ticket Cost' ? 'selected' : '') ?> value="Ticket Cost">Ticket Cost (if purchased by traveler</option>
						<option <?= ($detail['item'] == 'Mileage' ? 'selected' : '') ?> value="Mileage">Mileage (# of miles)</option>
						<option <?= ($detail['item'] == 'Parking' ? 'selected' : '') ?> value="Parking">Parking</option>
						<option <?= ($detail['item'] == 'Airport Tax' ? 'selected' : '') ?> value="Airport Tax">Airport Tax</option>
						<option <?= ($detail['item'] == 'Communication' ? 'selected' : '') ?> value="Communication">Communication (phone)</option>
						<option <?= ($detail['item'] == 'Registration' ? 'selected' : '') ?> value="Registration">Registration (if paid by traveler)</option>
						<option <?= ($detail['item'] == 'Visa Fee' ? 'selected' : '') ?> value="Visa Fee">Visa Fee</option>
						<option <?= ($detail['item'] == 'Auto Rental' ? 'selected' : '') ?> value="Auto Rental">Auto Rental</option>
						<option <?= ($detail['item'] == 'Internet Charges' ? 'selected' : '') ?> value="Internet Charges">Internet Charges</option>
						<option <?= ($detail['item'] == 'Taxi (Home to hotel)' ? 'selected' : '') ?> value="Taxi (Home to hotel)">Taxi (Home to hotel)</option>
						<option <?= ($detail['item'] == 'Taxi (Hotel to home)' ? 'selected' : '') ?> value="Taxi (Hotel to home)">Taxi (Hotel to home)</option>
						<option <?= ($detail['item'] == 'Other' ? 'selected' : '') ?> value="Other">Other</option>
					</select>
				</div>
				<div class="form-group">
					<label for="cost">Cost</label>
					<input value="<?= $detail['clean_cost'] ?>" type="text" class="form-control" name="cost" id="cost">
				</div>
				<div class="form-group">
					<label for="receipt">Receipt<small class="text-danger">*(pdf|jpg|png|jpeg)</small></label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="receipt" id="receipt">
						<label class="custom-file-label" for="receipt">Choose file</label>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
	</div>
</div>

<script type="application/javascript">
	$('input[type="file"]').change(function (e) {
		var fileName = e.target.files[0].name;
		$('.custom-file-label').html(fileName);
	});

    $('#item').select2({
			placeholder: 'Select items',
		})

</script>
