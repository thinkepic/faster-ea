<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Rejecting request</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form method="POST"
			action="<?= base_url('ea_requests/incoming_requests/set_status') ?>" id="reject-form">
			<input type="text" class="d-none" name="id" id="id" value="<?= $id ?>">
			<input type="text" class="d-none" name="status" id="status" value="<?= $status ?>">
			<input type="text" class="d-none" name="level" id="level" value="<?= $level ?>">

			<div class="modal-body">
				<div class="form-group">
					<label for="actual_">Reason</label>
					<textarea class="form-control" name="rejected_reason" id="rejected_reason" rows="2"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>