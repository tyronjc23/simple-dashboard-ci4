<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?= base_url('favicon.ico') ?>" />
	<title>Mega Tech Test</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

	<?= $this->renderSection('plugins') ?>
</head>

<body class=" hold-transition sidebar-mini layout-fixed sidebar-collapse">
	<div class="wrapper">
		<!-- NAVBAR -->
		<?= $this->include('layout/navbar') ?>

		<!-- SIDEBAR -->
		<?= $this->include('layout/sidebar') ?>

		<!-- CONTENT -->
		<div class="content-wrapper">
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0"><?= $title ?></h1>
						</div>

						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="home">Home</a></li>
								<li class="breadcrumb-item active"><?= $title ?></li>
							</ol>
						</div>
					</div>
				</div>
			</div>

			<section class="content">
				<div class="container-fluid">
					<?= $this->renderSection('content') ?>
				</div>
			</section>
		</div>

		<!-- FOOTER -->
		<?= $this->include('layout/footer') ?>
	</div>

	<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
	<script src="<?= base_url('assets/js/FormatMoney.js') ?>"></script>

	<script>
		const baseUrl = '<?= base_url() ?>';
	</script>

	<?= $this->renderSection('scripts') ?>
</body>

</html>