<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Reporting actual <?= $field ?> cost</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form enctype="multipart/form-data" method="POST"
			action="<?= base_url('ea_requests/report/insert_actual_meals_lodging') ?>" id="meals-lodging-form">
			<div class="modal-body">
				<input type="text" class="d-none" name="dest_id" id="dest_id" value="<?= $dest_id ?>">
				<input type="text" class="d-none" name="field" id="field" value="<?= $field ?>">
				<div class="form-group">
					<label for="actual_">Actual cost</label>
					<input value="<?= $actual_cost ?>" type="text" class="form-control" name="actual_cost" id="actual_cost">
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
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>
