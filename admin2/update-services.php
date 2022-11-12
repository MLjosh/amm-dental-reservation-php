<div class="modal hide" id="update_modal<?php echo $row['ID']?>" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST">
				<div class="modal-header">
					<h3 class="modal-title">Update Services</h3>
				</div>

				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Update Service</label>

							<input type="hidden" name="user_id" value="<?php echo $row['ID']?>"/>
							<input type="text" name="firstname" value="<?php echo $row['ServiceName']?>" style="text-transform:uppercase;" class="form-control" required="required"/>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Update Cost</label>
							<input type="number" name="cost" value="<?php echo $row['Cost']?>" class="form-control" required="required"/>
						</div>
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button name="update" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span>Update</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>

