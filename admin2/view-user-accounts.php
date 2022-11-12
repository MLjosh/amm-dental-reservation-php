<div class="modal hide" id="view_modal23<?php echo $row['ID']?>" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST">
				<div class="modal-header">
					<div class="col-md-12 text-center">
						<h3 class="modal-title">View <?php echo $row['Name']?>'s Account</h3>
						<label>Here you can only view <?php echo $row['Name']?>'s account.</label>
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
				            	<p>Mobile No. :</p>
				          	</div>
				          	<div class="col-12 col-sm-6 text-left">
				            	<strong><?php echo $row['MobileNumber']?></strong>
	          				</div>
          				</div>
          				<div class="row">
				          	<div class="col-12 col-sm-6 text-right">
				            	<p>Email :</p>
				          	</div>
				          	<div class="col-12 col-sm-6 text-left">
				            	<strong>
				            		<?php

				            		$checkmail=$row['Email'];
				            		if($checkmail==''){
				            			echo "N/A" ;
				            		}else{
				            			echo $checkmail;
				            		}

				            	 	?>
				            	 	
				            	 </strong>
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

