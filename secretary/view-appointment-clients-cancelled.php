<div class="modal hide" id="update_modal<?php echo $row['ID']?>" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST">
				<div class="modal-header">
					<div class="col-md-12 text-center">
						<h3 class="modal-title">View <?php echo $row['Name']?>'s Appointment</h3>
						<label>Here you can only view <?php echo $row['Name']?>'s Status.</label>
					</div>

				</div>

				<div class="modal-body text-center">
					<div class="col-md-2"></div>

					<div class="col-md-12">
						<div class="row">
				          	<div class="col-12 col-sm-6 text-right">
				            	<p>Appointment No. :</p>
				          	</div>
				          	<div class="col-12 col-sm-6 text-left">
				            	<strong><?php echo $row['AptNumber']?></strong>
	          				</div>
          				</div>
          				<div class="row">
				          	<div class="col-12 col-sm-6 text-right">
				            	<p>Client Name :</p>
				          	</div>
				          	<div class="col-12 col-sm-6 text-left">
				            	<strong><?php echo $row['Name']?></strong>
	          				</div>
          				</div>
          				<div class="row">
				          	<div class="col-12 col-sm-6 text-right">
				            	<p>Service :</p>
				          	</div>
				          	<div class="col-12 col-sm-6 text-left">
				            	<strong><?php echo $row['Services']?></strong>
	          				</div>
          				</div>
          				<div class="row">
				          	<div class="col-12 col-sm-6 text-right">
				            	<p>Date :</p>
				          	</div>
				          	<div class="col-12 col-sm-6 text-left">
				            	<strong>
				            		<?php  
						              $aptdate=$row['AptDate'];
						              $date=date_create("$aptdate");
						              echo date_format($date,"F j, Y");
						              ?>
				            	</strong>
	          				</div>
          				</div>
          				<div class="row">
				          	<div class="col-12 col-sm-6 text-right">
				            	<p>Time :</p>
				          	</div>
				          	<div class="col-12 col-sm-6 text-left">
				            	<strong>
				            	<?php
					              $time=$row['AptTime'];
					              $newDateTime = date('h:i A', strtotime($time));
					              echo $newDateTime;
					              ?>
				            	</strong>
	          				</div>
          				</div>
          				<div class="row">
				          	<div class="col-12 col-sm-6 text-right">
				            	<p>Doctor :</p>
				          	</div>
				          	<div class="col-12 col-sm-6 text-left">
				            	<strong><?php echo $row['doctors']?></strong>
	          				</div>
          				</div>
          				<div class="row">
				          	<div class="col-12 col-sm-6 text-right">
				            	<p>Status :</p>
				          	</div>
				          	<div class="col-12 col-sm-6 text-left">
				            	<?php 
				            	$stats=$row['Status'];
				            	if ($stats==1) { ?>
				            		<strong><?php echo "ACCEPTED"; ?></strong>
				            	<?php }elseif ($stats==2) { ?>
				            		<strong><?php echo "CANCELLED"; ?></strong>
				            	<?php }
				            	?>
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

