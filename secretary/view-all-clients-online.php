<div class="modal hide" id="view_modal2<?php echo $row['ID']?>" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST">
				<div class="modal-header">
					<div class="col-md-12 text-center">
						<h3 class="modal-title">View Clients</h3>
						<label>Here you can only view <?php echo $row['Name']?>'s Information.</label>
					</div>

				</div>

				<div class="modal-body text-center">
					<div class="col-md-2"></div>

					<div class="col-md-12">
          				<div class="row">
				          	<div class="col-12 col-sm-6 text-right">
				            	<p>Client Name :</p>
				          	</div>
				          	<div class="col-12 col-sm-6 text-left">
				            	<strong><?php echo $row['Name']?></strong>
	          				</div>
          				</div>
          				<?php
          				$nomaill=$row['Email'];
          				if ($nomaill=='') {
          					
          				}else{ ?>

          				<div class="row">
				          	<div class="col-12 col-sm-6 text-right">
				            	<p>Client Email :</p>
				          	</div>
				          	<div class="col-12 col-sm-6 text-left">
				            	<strong><?php echo $row['Email']?></strong>
	          				</div>
          				</div>

          				<?php } ?>


          				<div class="row">
				          	<div class="col-12 col-sm-6 text-right">
				            	<p>Client Number :</p>
				          	</div>
				          	<div class="col-12 col-sm-6 text-left">
				            	<strong><?php echo $row['MobileNumber']?></strong>
	          				</div>
          				</div>
          				<div class="row">
				          	<div class="col-12 col-sm-6 text-right">
				            	<p>Date Created :</p>
				          	</div>
				          	<div class="col-12 col-sm-6 text-left">
				            	<strong>
			<?php  
              $aptdate=$row['CreationDate'];
              $date=date_create("$aptdate");
              echo date_format($date,"F j, Y");
              ?></strong>
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

