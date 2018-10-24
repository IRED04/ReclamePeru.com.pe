<?php
  
  $m_id = $_SESSION["m_id"];
  $getDataMerchant =  MVCControllerMerchantJP::getDataMerchantC($m_id); 

?>


<!-- Page content -->
	<div class="page-content pt-0">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md align-self-start">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Main sidebar</span>
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body card-img-top">
						<div class="card-body text-center">
							<a href="#">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded-circle shadow-2 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark"> <?php echo $getDataMerchant[3]; ?>  </h6>
							<span class="font-size-sm text-white text-shadow-dark"> <?php echo $getDataMerchant[4]; ?> </span>
						</div>
													
						
					</div>
				</div>
				<!-- /user menu -->


				<!-- Navigation -->
				<div class="card card-sidebar-mobile">
					<div class="card-header header-elements-inline">
						<h6 class="card-title">Menu</h6>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
							</div>
						</div>
					</div>

					<div class="card-body p-0">
						<ul class="nav nav-sidebar" data-nav-type="accordion">

							<!-- Main -->
							<li class="nav-item-header pt-0 mt-0"> <i class="icon-menu" title="Main"></i></li>
							<li class="nav-item">
								<a href="index.php" class="nav-link active">
									<i class="icon-meter-slow"></i>
									<span>
										DASHBOARD
										<span class="d-block font-weight-normal opacity-50">No active orders</span>
									</span>
								</a>
							</li>
							<li class="nav-item nav-item-submenu">
								<a href="#" class="nav-link"><i class="icon-puzzle4"></i> <span>ACTIVITY</span></a>

								<ul class="nav nav-group-sub" data-submenu-title="Layouts">
									<li class="nav-item"><a href="index.php?action=operations" class="nav-link">OPERATION</a></li>
									<li class="nav-item"><a href="index.php?action=reports" class="nav-link">REPORTS</a></li>
									
								</ul>
							</li>

							<li class="nav-item nav-item-submenu">
								<a href="#" class="nav-link"><i class="icon-user-tie"></i> <span>PROFILES</span></a>

								<ul class="nav nav-group-sub" data-submenu-title="Themes">
									<li class="nav-item"><a href="index.php?action=account" class="nav-link">ACCOUNT</a></li>
									<li class="nav-item"><a href="index.php?action=credentials" class="nav-link ">CREDENTIALS</a></li>

									<li class="nav-item"><a href="index.php?action=notification" class="nav-link ">NOTIFICTIONS</a></li>
									
									<li class="nav-item" style="display: none"><a href="index.php?action=accountBank" class="nav-link " disabled>ACCOUNT BANK</a></li>
																	
								</ul>
							</li>

							<li class="nav-item nav-item-submenu">
								<a href="#" class="nav-link"><i class="icon-cog"></i> <span>SETTING</span></a>

								<ul class="nav nav-group-sub" data-submenu-title="Starter kit">
									<li class="nav-item"><a href="#" class="nav-link">CHECK-OUT</a></li>
									<li class="nav-item"><a href="#" class="nav-link">NEW USER</a></li>
									<li class="nav-item"><a href="#" class="nav-link">UPDATE PASSWORD</a></li>
								</ul>
							</li>

							<li class="nav-item">
								<a href="index.php?action=salir" class="nav-link active">
									<i class="icon-switch2"></i>
									<span>
										CLOSE SESSION
									</span>
								</a>
							</li>
							
							<!-- /main -->

							
								
						</ul>
					</div>
					

				</div>
				<!-- /navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<?php
			$getContent = new MVCControllerMerchantJP();
			$getContent-> enlacesAdminMerchant();

				//include ("operations.php");
	    ?>
		



		


	</div>
	<!-- /page content -->