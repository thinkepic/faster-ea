<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Add other items</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form enctype="multipart/form-data" method="POST"
			action="<?= base_url('ea_requests/report/insert_other_items') ?>" id="other-items-form">
			<div class="modal-body">
				<input type="text" class="d-none" name="dest_id" id="dest_id" value="<?= $dest_id ?>">
				<div class="form-group">
					<label for="cost" class="d-block">Item</label>
					<select name="item" id="item">
						<option value="">Select items</option>
						<option value="Ticket Cost">Ticket Cost (if purchased by traveler)</option>
						<option value="Mileage">"Mileage (# of miles)</option>
						<option value="Parking">Parking</option>
						<option value="Airport Tax">Airport Tax</option>
						<option value="Registration">Registration (if paid by traveler)</option>
						<option value="Communication">Communication (phone)</option>
						<option value="Visa Fee">Visa Fee</option>
						<option value="Auto Rental">Auto Rental</option>
						<option value="Internet Charges">Internet Charges</option>
						<option value="Taxi (Home to hotel)">Taxi (Home to hotel)</option>
						<option value="Taxi (Hotel to home)">Taxi (Hotel to home)</option>
						<option value="Other">Other</option>
					</select>
				</div>
				<div class="form-group">
					<label for="cost">Cost</label>
					<input value="" type="text" class="form-control" name="cost" id="cost">
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
				<button type="submit" class="btn btn-primary">Submit</button>
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
