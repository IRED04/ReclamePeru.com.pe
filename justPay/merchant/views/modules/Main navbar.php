

<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark bg-indigo">
		<div class="navbar-brand wmin-200">
			<a href="index.html" class="d-inline-block">
				<img src="views/global_assets/images/logo2.png" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			

			<span class="navbar-text ml-md-auto mr-md-3">
				<span class="badge bg-light shadow-1 text-indigo-700"></span>
			</span>

			<ul class="navbar-nav">


				<li class="nav-item dropdown dropdown-user">
					<span> user: <?php echo $_SESSION["u_name"]; ?></span>

					

				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
