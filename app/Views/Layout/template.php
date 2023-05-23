<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?= $this->renderSection('title') ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    
    <link rel="icon" href="<?= site_url('') ?>/assets/img/icon.ico" type="image/x-icon"/>
    
	<!-- Fonts and icons -->
	<script src="<?= site_url('') ?>/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
        WebFont.load({
            google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['<?= site_url('') ?>/assets/css/fonts.css']},
			active: function() {
                sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= site_url('') ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= site_url('') ?>/assets/css/azzara.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?= site_url('') ?>/assets/css/demo.css">
    <?= $this->renderSection('styles') ?>

</head>
<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="light-blue">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a class="logo">
					<img src="<?= site_url('') ?>/assets/img/logoazzara.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?= base_url().'uploads/users/images/'.session()->get('avatar') ?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="<?= base_url().'uploads/users/images/'.session()->get('avatar') ?>" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4><?= session()->get('name') ?></h4>
											<p class="text-muted"><?= session()->get('email') ?></p>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?= site_url() ?>user/profile">perfil</a>
									<a class="dropdown-item" href="/SignInController/logOut">sair</a>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?= base_url().'uploads/users/images/'.session()->get('avatar') ?>" alt="foto de perfil" class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?= session()->get('name') ?>
									<span class="user-level">Administrator</span>
								</span>
							</a>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item active">
							<a href="<?= site_url('dashboard') ?>">
								<i class="flaticon-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">MENU</h4>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('clients') ?>">
								<i class="flaticon-user-1"></i>
								<p>Clientes</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<?= $this->renderSection('content') ?>
			</div>
			
		</div>
		
	</div>

    <!--   Core JS Files   -->
	<script src="<?= site_url('') ?>/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= site_url('') ?>/assets/js/core/popper.min.js"></script>
	<script src="<?= site_url('') ?>/assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?= site_url('') ?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?= site_url('') ?>/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    
	<!-- jQuery Scrollbar -->
	<script src="<?= site_url('') ?>/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Moment JS -->
	<script src="<?= site_url('') ?>/assets/js/plugin/moment/moment.min.js"></script>
    
	<!-- Chart JS -->
	<script src="<?= site_url('') ?>/assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?= site_url('') ?>/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
    
	<!-- Chart Circle -->
	<script src="<?= site_url('') ?>/assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?= site_url('') ?>/assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?= site_url('') ?>/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- Bootstrap Toggle -->
	<script src="<?= site_url('') ?>/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    
	<!-- jQuery Vector Maps -->
	<script src="<?= site_url('') ?>/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= site_url('') ?>/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
    
	<!-- Google Maps Plugin -->
	<script src="<?= site_url('') ?>/assets/js/plugin/gmaps/gmaps.js"></script>
    
	<!-- Sweet Alert -->
	<script src="<?= site_url('') ?>/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    
	<!-- Azzara JS -->
	<script src="<?= site_url('') ?>/assets/js/ready.min.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>