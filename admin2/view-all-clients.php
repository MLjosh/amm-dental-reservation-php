<div class="modal hide" id="view_modal<?php echo $row['ID']?>" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
				          	<div class="col-12 col-sm-6">
				            	<p>Client Name :</p>
				          	</div>
				          	<div class="col-12 col-sm-6">
				            	<strong><?php echo $row['Name']?></strong>
	          				</div>
          				</div>
          				<div class="row">
				          	<div class="col-12 col-sm-6">
				            	<p>Client Number :</p>
				          	</div>
				          	<div class="col-12 col-sm-6">
				            	<strong><?php echo $row['MobileNumber']?></strong>
	          				</div>
          				</div>
          				<div class="row">
				          	<div class="col-12 col-sm-6">
				            	<p>Date Created :</p>
				          	</div>
				          	<div class="col-12 col-sm-6">
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
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Okay</button>
						<a class="btn btn-primary" type="button" href="all-clients-prevapp.php?viewname=<?php echo $row['Name']; ?>">View Prev. Appnt</a>
					</div>
					
				</div>
				</div>
			</form>
		</div>
	</div>
</div>






