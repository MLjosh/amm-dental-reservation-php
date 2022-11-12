<div class="modal hide" id="update_modal<?php echo $row['ID']?>" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST">
				<div class="modal-header">
					<h3 class="modal-title">Doctor's Name</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Doctor's Name</label>

							<input type="hidden" name="user_id" value="<?php echo $row['ID']?>"/>
							<input type="text" name="firstname" value="<?php echo $row['doctors']?>" style="text-transform:uppercase;" class="form-control" required="required"/>
						</div>
						<div class="row">
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Contact No.</label>
                        <input class="form-control" value="<?php echo $row['MobileNumber']?>" name="num" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "11"  required="true">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Specialization</label>
                        <input type="text" class="form-control" name="specialty" value="<?php echo $row['Specialization']?>" name="name" style="text-transform:uppercase;"  required="true">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Address</label>
                         <textarea class="form-control" name="address" rows="3" style="text-transform:uppercase;" required="true"><?php echo $row['Address']?></textarea>
                      </div>
                    </div>
                  </div>
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button name="update2" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Update</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>

