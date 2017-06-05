<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>
		  <li class="active">Customer</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Customer</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addCustomerModalBtn" data-target="#addCustomerModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Customer </button>
				</div>
				<!-- /div-action -->

				<table class="table" id="manageCustomerTable">
					<thead>
						<tr>
							<th style="width:10%;">Client Id</th>
							<th>Client Name</th>
							<th>Phone number</th>
							<th>Address</th>
							<th>Landmark</th>
							<th>Family Type</th>
							<th>Family Count</th>
			<!--				<th>Google Map</th>-->
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add product -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitCustomerForm" action="php_action/createCustomer.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Customer</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-customer-messages"></div>

	        <div class="form-group">
	        	<label for="clientName" class="col-sm-3 control-label">Client Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="clientName" placeholder="Client Name" name="clientName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="phone-number" class="col-sm-3 control-label">Phone number: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="phone-number" placeholder="Phone number" name="phone-number" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	         <div class="form-group">
	        	<label for="secondary-number" class="col-sm-3 control-label">Secondary number: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="secondary-number" placeholder="Secondary number" name="secondary-number" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->
	        <div class="form-group">
	        	<label for="address" class="col-sm-3 control-label">Address: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="address" placeholder="Address" name="address" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	          <div class="form-group">
	        	<label for="landmark" class="col-sm-3 control-label">Landmark: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="landmark" placeholder="Landmark" name="landmark" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->
	        <div class="form-group">
	        	<label for="family-type" class="col-sm-3 control-label">Family type</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="family-type" placeholder="Family type" name="family-type" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="family-count" class="col-sm-3 control-label">Family count</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="family-count" placeholder="Family count" name="family-count" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->
	      </div> <!-- /modal-body -->

	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

	        <button type="submit" class="btn btn-primary" id="createCustomerBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->
     	</form> <!-- /.form -->
    </div> <!-- /modal-content -->
  </div> <!-- /modal-dailog -->
</div>
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Customer</h4>
	      </div>




							    	<form class="form-horizontal" id="editCustomerForm" action="php_action/editCustomer.php" method="POST">

								      <div class="modal-body" style="max-height:450px; overflow:auto;">

								      	<div id="edit-customer-messages"></div>

								        <div class="form-group">
								        	<label for="editClientName" class="col-sm-3 control-label">Client Name: </label>
								        	<label class="col-sm-1 control-label">: </label>
											    <div class="col-sm-8">
											      <input type="text" class="form-control" id="editClientName" placeholder="Client Name" name="editClientName" autocomplete="off">
											    </div>
								        </div> <!-- /form-group-->

								        <div class="form-group">
								        	<label for="editPhone-number" class="col-sm-3 control-label">Phone number: </label>
								        	<label class="col-sm-1 control-label">: </label>
											    <div class="col-sm-8">
											      <input type="text" class="form-control" id="editPhone-number" placeholder="Phone number" name="editPhone-number" autocomplete="off">
											    </div>
								        </div> <!-- /form-group-->

								         <div class="form-group">
								        	<label for="editSecondary-number" class="col-sm-3 control-label">Secondary number: </label>
								        	<label class="col-sm-1 control-label">: </label>
											    <div class="col-sm-8">
											      <input type="text" class="form-control" id="editSecondary-number" placeholder="Secondary number" name="editSecondary-number" autocomplete="off">
											    </div>
								        </div> <!-- /form-group-->
								        <div class="form-group">
								        	<label for="editAddress" class="col-sm-3 control-label">Address: </label>
								        	<label class="col-sm-1 control-label">: </label>
											    <div class="col-sm-8">
											      <input type="text" class="form-control" id="editAddress" placeholder="Address" name="editAddress" autocomplete="off">
											    </div>
								        </div> <!-- /form-group-->

								          <div class="form-group">
								        	<label for="editLandmark" class="col-sm-3 control-label">Landmark: </label>
								        	<label class="col-sm-1 control-label">: </label>
											    <div class="col-sm-8">
											      <input type="text" class="form-control" id="editLandmark" placeholder="Landmark" name="editLandmark" autocomplete="off">
											    </div>
								        </div> <!-- /form-group-->
								        <div class="form-group">
								        	<label for="editFamily-type" class="col-sm-3 control-label">Family type</label>
								        	<label class="col-sm-1 control-label">: </label>
											    <div class="col-sm-8">
											      <input type="text" class="form-control" id="editFamily-type" placeholder="Family type" name="editFamily-type" autocomplete="off">
											    </div>
								        </div> <!-- /form-group-->

								        <div class="form-group">
								        	<label for="editFamily-count" class="col-sm-3 control-label">Family count</label>
								        	<label class="col-sm-1 control-label">: </label>
											    <div class="col-sm-8">
											      <input type="text" class="form-control" id="editFamily-count" placeholder="Family count" name="editFamily-count" autocomplete="off">
											    </div>
								        </div> <!-- /form-group-->
								      </div> <!-- /modal-body -->

								      <div class="modal-footer">
												<div class="editcustomerFooter"></div>
												<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

											 <button type="submit" class="btn btn-success" id="editCustomerBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
								      </div> <!-- /modal-footer -->
							     	</form> <!-- /.form -->






    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeCustomerModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Customer</h4>
      </div>
      <div class="modal-body">

      	<div class="removeCustomerMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeCustomerFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeCustomerBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->


<script src="custom/js/customer.js"></script>

<?php require_once 'includes/footer.php'; ?>
