<?= $this->extend('layout/page_layout') ?>

<?= $this->section('plugins') ?>
<link href="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.8/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/fc-4.3.0/fh-3.4.0/r-2.5.0/sb-1.6.0/sl-1.7.0/datatables.min.css" rel="stylesheet">

<style>
	thead input {
		width: 100%;
	}
</style>

<?= $this->endSection('plugins') ?>

<?= $this->section('content') ?>
<!-- BOX -->
<div class="row">
	<div class="col-lg-3 col-6">
		<div class="info-box bg-primary">
			<div class="info-box-content">
				<span class="info-box-text">Total Sales</span>
				<span class="info-box-number">
					<h4 id="boxTotalSales">0</h4>
				</span>
				<span class="info-box-number" id="boxGrowthSales">0</span>
			</div>
			<span class="info-box-icon"><i class="far fa-bag-shopping"></i></span>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<div class="info-box">
			<div class="info-box-content">
				<span class="info-box-text">Total Income</span>
				<span class="info-box-number">
					<h4 id="boxTotalIncome">Rp. 0</h4>
				</span>
				<span class="info-box-number" id="boxGrowthIncome">0</span>
			</div>
			<span class="info-box-icon"><i class="far fa-wallet"></i></span>
		</div>
	</div>

	<div class="col-lg-3 col-6">
	</div>

	<div class="col-lg-3 col-6">
		<div class="input-group mb-3">
			<input type="text" class="form-control" name="dashboardDate" id="dashboardDate" placeholder="tanggal">
			<div class="input-group-append">
				<span class="input-group-text"><i class="fas fa-calendar"></i></span>
			</div>
		</div>
	</div>
</div>

<!-- CHART -->
<div class="row">
	<div class="col-12">
		<div id="chart" style="margin-bottom: 1em;"></div>
	</div>
</div>

<!-- TABLE -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Recent Order</h3>
			</div>

			<div class="card-body">
				<table id="tbl" class="table table-bordered table-hover" style="width: 100%">
					<thead>
						<tr>
							<th style="text-align: center; vertical-align: middle;" width="20%">Name</th>
							<th style="text-align: center; vertical-align: middle;">Order Date</th>
							<th style="text-align: center; vertical-align: middle;" width="12%">Order Amount</th>
							<th style="text-align: center; vertical-align: middle;">Phone</th>
							<th style="text-align: center; vertical-align: middle;" width="20%">Sales</th>
							<th style="text-align: center; vertical-align: middle;">Office</th>
							<th style="text-align: center; vertical-align: middle;" width="2%">Action</th>
						</tr>
						<!-- <tr class="filters"></tr> -->
					</thead>

					<tbody></tbody>

					<tfoot></tfoot>
				</table>
			</div>

			<div class="overlay" id="overlayLoading">
				<i class="fa fa-2x fa-sync fa-spin"></i>
			</div>
		</div>
	</div>
</div>

<!-- MODAL DETAIL -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detail</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<table class="table table-bordered table-hover" style="width: 100%">
						<tbody>
							<tr>
								<td>Name</td>
								<td id="clientName"></td>
							</tr>
							<tr>
								<td>Email</td>
								<td id="clientMail"></td>
							</tr>
							<tr>
								<td>Phone</td>
								<td id="clientPhone"></td>
							</tr>
							<tr>
								<td>Order Item</td>
								<td id="orderItem"></td>
							</tr>
							<tr>
								<td>Order Amount</td>
								<td id="orderAmount"></td>
							</tr>
							<tr>
								<td>Order Date</td>
								<td id="orderDate"></td>
							</tr>
							<tr>
								<td>Sales</td>
								<td id="salesName"></td>
							</tr>
							<tr>
								<td>Email</td>
								<td id="salesMail"></td>
							</tr>
							<tr>
								<td>Phone</td>
								<td id="salesPhone"></td>
							</tr>
							<tr>
								<td>Office</td>
								<td id="salesOffice"></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection('content') ?>

<?= $this->section('scripts') ?>
<!-- DATATABLE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.8/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/fc-4.3.0/fh-3.4.0/r-2.5.0/sb-1.6.0/sl-1.7.0/datatables.min.js"></script>
<!-- HIGH CHARTS -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
	let orders = [];
	let sumOrders = [];
	let sales = 0;
	let income = 0;

	$('#tbl thead tr')
		.clone(true)
		.addClass('filters')
		.appendTo('#tbl thead');

	const orderTable = new DataTable('#tbl', {
		autoWidth: true,
		scrollX: true,
		scrollY: 400,
		scrollCollapse: true,
		processing: true,
		deferRender: true,
		fixedColumns: true,
		orderCellsTop: true,
		fixedHeader: true,
		pageLength: 25,
		lengthMenu: [
			[25, 50, 100, -1],
			[25, 50, 100, 'all']
		],
		columnDefs: [{
			targets: [6],
			orderable: false,
			searchable: false,
		}],
		columns: [{
				data: 'client_name',
			},
			{
				data: 'order_date',
				render: function(data) {
					return moment(data).format("D MMM YYYY");
				}
			},
			{
				data: 'order_amount',
				render: function(data, type, row) {
					return FormatMoney(data, '', '', ',', '.', 2, 2);
				},
				className: "text-right"
			},
			{
				data: 'client_phone',
			},
			{
				data: 'sales_name',
			},
			{
				data: 'office',
			},
			{
				data: null,
				render: function(data, type, row) {
					const detailBtn = `<button class="btn btn-flat btn-info btn-xs" data-toggle="tooltip" data-placement="bottom" title="details" onClick="orderDetail(${row.id})"><span class="fa fa-search"></span></button>`;

					return ` ${detailBtn}`;
				},
				className: "text-center"
			}
		],
		initComplete: function() {
			const api = this.api();

			// For each column
			api.columns().eq(0).each(function(colIdx) {
				// Set the header cell to contain the input element
				const cell = $('.filters th').eq($(api.column(colIdx).header()).index());

				if (colIdx === 6) {
					$(cell).html('');
					return;
				}

				$(cell).html(`<input type="text" class="form-control" placeholder="&#x1F50D; search" />`);

				// On every keypress in this input
				$('input', $('.filters th').eq($(api.column(colIdx).header()).index()))
					.off('keyup change')
					.on('change', function(e) {
						// Search the column for that value
						api.column(colIdx)
							.search(this.value != '' ? this.value : '', this.value != '', this.value == '')
							.draw();
					})
					.on('keyup', function(e) {
						e.stopPropagation();
						$(this).trigger('change');
					});
			});
		},
		buttons: ["csv", "excel"],
	});
	orderTable.buttons().container().appendTo('#tbl_wrapper .col-md-6:eq(0)');

	$(document).ready(async function() {
		initialValue();
		eventHandler();
		await getSales();
		dashboardData();
	});

	function eventHandler() {
		$('body').on('change', '#dashboardDate', async function() {
			await getSales();
			dashboardData();
		});

		orderTable.on('draw', function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	}

	function initialValue() {
		$('#dashboardDate').daterangepicker({
			autoApply: true,
			alwaysShowCalendars: false,
			showDropdowns: true,
			showCustomRangeLabel: false,
			maxDate: moment().endOf('day'),
			startDate: moment().startOf('month'),
			endDate: moment().endOf('day'),
			locale: {
				format: 'YYYY-MM-DD',
				separator: " s.d "
			},
		});
	}

	function dashboardData() {
		// DATA TABLES
		orderTable.clear().rows.add(orders).draw();

		// DASHBOARD CARDS
		const salesData = orders.map(order => Number(order.order_amount));
		const totalIncome = salesData.length === 0 ? 0 : salesData.reduce((a, b) => a + b);
		const totalSales = salesData.length === 0 ? 0 : salesData.length;
		const growthSales = totalSales - sales;
		const growthIncome = totalIncome - income;
		sales = totalSales;
		income = totalIncome;

		$('#boxTotalSales').html(FormatMoney(totalSales, '', '', ',', '.', 0, 0));
		$('#boxGrowthSales').html(FormatMoney(Math.abs(growthSales), growthSales < 0 ? '-' : '+', '', ',', '.', 0, 0));
		$('#boxTotalIncome').html(FormatMoney(totalIncome, 'Rp. ', '', ',', '.', 0, 0));
		$('#boxGrowthIncome').html(FormatMoney(Math.abs(growthIncome), growthIncome < 0 ? '-' : '+', '', ',', '.', 0, 0));

		// CHART
		const teamData = sumOrders.map(order => order.sales_name);
		const salesTotalChart = sumOrders.map(order => Number(order.total_sales));
		const chartData = [{
			name: 'sales',
			data: salesTotalChart
		}];
		const data = [teamData, chartData];
		createChart(data);
	}

	async function getSales() {
		$('#overlayLoading').show();
		const url = `${baseUrl}dashSales`;
		const period = $('#dashboardDate').val();

		try {
			const responseData = await $.get(url, {
				period
			});
			orders = responseData.orderData;
			sumOrders = responseData.sumData;
		} catch (error) {
			console.error(error);
			error.status === 500 ? alert(error.responseJSON.message) : alert(error.responseJSON);
		}

		$('#overlayLoading').hide();
	}

	function orderDetail(orderId) {
		const order = orders.filter(order => order.id == orderId)[0];
		$('#clientName').html(order.client_name);
		$('#clientMail').html(order.client_email);
		$('#clientPhone').html(order.client_phone);
		$('#orderItem').html(order.order_item);
		$('#orderAmount').html(FormatMoney(order.order_amount, 'Rp. ', '', ',', '.', '0', '0'));
		$('#orderDate').html(moment(order.order_date).format('D MMM YYYY'));
		$('#salesName').html(order.sales_name);
		$('#salesMail').html(order.sales_email);
		$('#salesPhone').html(order.sales_phone);
		$('#salesOffice').html(order.office);
		$('#modalDetail').modal('show');
	}

	function createChart(data) {
		const chart = new Highcharts.Chart('chart', {
			chart: {
				type: 'column',
			},
			title: {
				text: 'Sales Performance',
				style: {
					fontSize: '20px'
				},
				align: 'left',
			},
			xAxis: {
				categories: data[0]
			},
			yAxis: {
				title: {
					text: 'Sales',
					style: {
						fontSize: '14px'
					},
				},
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'middle',
				borderWidth: 0,
			},
			series: data[1],
		});
	}
</script>
<?= $this->endSection('scripts') ?>