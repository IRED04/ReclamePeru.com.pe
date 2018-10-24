<div class="container">
  <div class="row">
      <div class="col-sm-1"> </div>
      <div class="col-sm-10"> 

      <div class="container">

        	<!-- 2 columns form -->
				 <div class="card-body card">

						<form action="#">
							<div class="row">
								
								<div class="col-md-6">
									<fieldset>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">TYPE PAYMNET:</label>
											<div class="col-lg-9">
												<select name="TypePayment" id="TypePayment" data-placeholder="Select your state" class="form-control form-control-select2" style="opacity: 100" data-fouc>
													<option value="0">ALL</option>
													<option value="3">CREDIT CARD / DEBIT CARD</option>
													<option value="1">BANK TRANSFER</option>
													<option value="2">CASH</option>
												</select>

											</div>
										</div>


										<div class="form-group row">
											<label class="col-lg-3 col-form-label">STATUS:</label>
											<div class="col-lg-9">
												<select id="SelStatus" name="SelStatus" data-placeholder="Select your state" class="form-control form-control-select2" style="opacity: 100" data-fouc>
													<option value="all">ALL</option>
													<option value="2">Completed</option>
													<option value="0">Expired</option>
													<option value="1">Pending</option>
												</select>

											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label" >DATE:</label>
											<div class="col-lg-9">
												<!--
												<select name="periodo" id="periodo" data-placeholder="Select your state" class="form-control form-control-select2" style="opacity: 100" data-fouc>
													<option value="0">ALL</option>
													<option value="1">1 Week</option>
													<option value="2">2 Week</option>
													<option value="3">15 Dais</option>
													<option value="4">1 Month</option>
													<option value="5">3 Month</option>
													<option value="6">Periodo</option>
												</select>


											   



											    <div class="form-group row">
											      <label class="col-lg-3 col-form-label" style="color:#797070">Star:</label>
											      <div class="col-md-9">
												     <input id="periodo" name="periodo" type="date" placeholder="desde" class="form-control">
											      </div>
											      <label class="col-lg-3 col-form-label" style="color:#797070">End:</label>
											      <div class="col-md-9">
												     <input id="periodo" name="periodo" type="date" placeholder="desde" class="form-control">
											      </div>
											    </div> -->

												<div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text"><i class="icon-calendar22"></i></span>
													</span>
													<input name="periodo" id="periodo"  type="text" class="form-control daterange-basic" value="01/01/2015 - 01/31/2015"> 
												</div>



											</div>
										</div>


									</fieldset>
								</div>

								<div class="col-md-6">
									<fieldset>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">OPERATION</label>
											<div class="col-lg-9">
												<div class="row">
													<div class="col-md-12">
														<input id="operation" name="operation" type="text" placeholder="" class="form-control">
													</div>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label"> REFERENCE: </label>
											<div class="col-lg-9">
												<div class="row">
													<div class="col-md-12">
														<input name="reference" id="reference" type="text" placeholder="" class="form-control">
													</div>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>


							<div class="text-right">
								<button type="button" class="btn btn-primary" id="serchOperation"  name="serchOperation"> Search <i class="icon-search4 ml-2"></i></button>
							</div>
						</form>
				 </div>
				<!-- /2 columns form -->	

			</div>

			<!-- Content area -->
			<div class="content" id="tableOperatopn" style="display: block">

			 	<!-- Basic datatable -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Result query</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="reload">  </a>
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>

	                	</div>

	               
					</div>

					<div class="card-body">
					
					</div>

					<table class="table datatable-basic"> 
						<thead>
							<tr>
								<th>OperationID</th>
								<th>References</th>
								<th>Currency</th>
								<th>Ammount</th>
								<th>Status</th>
								
							</tr>
						</thead>
						<tbody id="MyOperation">
							
							
														

						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->

     		</div>
			<!-- /content area -->
    


      </div>


      </div>
      <div class="col-sm-1"> </div>
  </div>

 
</div>


			



