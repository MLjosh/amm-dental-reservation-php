
<div id="printThis">
<div class="modal hide" id="view_print_doctor" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST">
				<div class="modal-header">
					<div class="col-md-12 text-center">
						<h3 class="modal-title">AMM DOCTORS</h3>
						<label>Here are the list of AMM Doctors.</label>
					</div>

				</div>

				<div class="modal-body text-center">
					<div class="col-md-2"></div>

					<div class="col-md-12 text-center">
          				<div class="row">
          					<div class="col-md-2">
          					</div>
				          	<div class="col-md-8">
				          <table class="table tablesorter" id="example3">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Doctor's Name
                        </th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php

            $ret=mysqli_query($con,"select * from  tbldoctors order by CreationDate DESC");

            $cnt=1;
            while ($row=mysqli_fetch_array($ret)) {

            ?>

                      <tr>
                        <th scope="row">
                          <?php echo $cnt;?>
                        </th>

                        <td>
                          <?php  echo $row['doctors'];?>
                        </td>
                        
                      </tr>
                      <?php 
              $cnt=$cnt+1;
              }?>
                    </tbody>
                  </table>

				          	</div>
		
          				</div>
          				

					</div>
				</div>
				<div style="clear:both;"></div>
				
				<div class="modal-footer text-center">
					<div class="col-md-12">
						<button class="btn btn-primary" type="button" id="btnPrint" >Print</button>
						<button class="btn btn-danger" type="button" data-dismiss="modal" >Close</button>
					</div>
					
				</div>
				</div>
			</form>
		</div>
	</div>
</div>


