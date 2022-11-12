<div class="modal hide" id="view_modal22<?php echo $row['ID']?>" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST">
				<div class="modal-header">
					<div class="col-md-12 text-center">
						<h3 class="modal-title">View <?php echo $row['Name']?>'s Logs</h3>
						<label>Here you can only view <?php echo $row['Name']?>'s logs.</label>
					</div>

				</div>

				<div class="modal-body text-center">
					<div class="col-md-2"></div>

					<div class="col-md-12">
						
          				<div class="row">
				          	<div class="col-12 col-sm-12 text-center">
				            	<p>Creation Date :</p>
				          	</div>
				          	<div class="col-12 col-sm-12 text-center">
				            	<strong><?php  
              $aptdate=$row['CreationDate'];
              $date=date_create("$aptdate");
              echo date_format($date,"F j, Y - D h:i A  :");
              ?></strong>
	          				</div>
          				</div>
          				
          				<div class="row">
				          	<div class="col-12 col-sm-12 text-center">
				            	<p>Status :</p>
				          	</div>
				          
				          	
          				</div>
          				<div class="row">
				          	<div class="col-12 col-sm-12 text-center">
				            	<textarea rows="2" cols="40" style="padding: 5px; border: none; outline: none; text-align: center;" readonly>"<?php echo $row['Status']?>."</textarea>
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

