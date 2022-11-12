<div class="modal hide" id="view_modal22<?php echo $row['ID']?>" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST">
				<div class="modal-header">
					<div class="col-md-12 text-center">
						<h3 class="modal-title">View <?php echo $row['Name']?>'s Message</h3>
						<label>Here you can only view <?php echo $row['Name']?>'s message.</label>
					</div>

				</div>

				<div class="modal-body text-center">
					<div class="col-md-2"></div>

					<div class="col-md-12">
						
          				<div class="row">
				          	<div class="col-12 col-sm-6 text-right">
				            	<p>Name :</p>
				          	</div>
				          	<div class="col-12 col-sm-6 text-left">
				            	<strong><?php echo $row['Name']?></strong>
	          				</div>
          				</div>
          				<div class="row">
				          	<div class="col-12 col-sm-6 text-right">
				            	<p>Email :</p>
				          	</div>
				          	<div class="col-12 col-sm-6 text-left">
				            	<strong><?php echo $row['Email']?></strong>
	          				</div>
          				</div>
          				<div class="row">
				          	<div class="col-12 col-sm-6 text-right">
				            	<p>Message :</p>
				          	</div>
				          	
          				</div>
          				<div class="row">
				          	<div class="col-12 col-sm-12">
				            	<textarea rows="4" cols="50" style="padding: 5px; border: none; outline: none;" readonly>"<?php echo $row['Comments']?>."</textarea>
				          	</div>
				      
          				</div>


					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer text-center">
					<div class="col-md-12">
						<button class="btn btn-primary" type="button" data-dismiss="modal">Okay</button>
					</div>
					
				</div>
				</div>
			</form>
		</div>
	</div>
</div>

