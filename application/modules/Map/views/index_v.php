<style type="text/css">.custom-css-1488398861560{padding-top:50px;padding-right:40px;padding-bottom:50px;padding-left:40px;background-color:#ffffff;}.custom-css-1488398881957{padding-top:50px;padding-right:40px;padding-bottom:50px;padding-left:40px;background-color:#9373de;}</style>
<style type="text/css">
	.table {
		width: 100%;
		max-width: 100%;
		margin-bottom: 1rem;
	}

	table{
		border-collapse: collapse;
		background-color: transparent;
	}

	.table thead th {
		vertical-align: bottom;
		border-bottom: 2px solid #eceeef;
	}

	.table td, .table th {
		padding: .75rem;
		vertical-align: top;
		border-top: 1px solid #eceeef;
	}

	th {
		text-align: left;
		text-transform: uppercase;
	}

	.table-striped tbody tr:nth-of-type(odd) {
		background-color: rgba(0,0,0,.05);
	}

	table thead th{
		color: #555 !important;
	}
</style>
<div id="content" class="site-content container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="content">
				<div class="row-wrapper">
					<div class = "row-container container row-full-width row-no-padding">
						<div class="row">
							<div class="column col-sm-12">
								<div class="column-inner">
									<div class="column-content">
										<div class="content-element google-map-wrapper">
											<div id="map" class = "google-map gmap-ratio-4-1 is-ready" style="position: relative; overflow: hidden;"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row-wrapper">
					<div class="row-container container">
						<div class="row columns-equal-height columns-no-margins">
							<div class="column col-sm-12">
								<div class="column-inner custom-css-1488398861560 col-has-fill">
									<div class="column-content">
										<div data-animation="fadeInUp" class="animate-element animate-stagger is-animated fadeInUp">
										<p>Contact phone at <a href="http://www.haltons.co.ke/"> Haltons Pharmacy</a></p>
											<h4 class="heading" style="margin-bottom: 15px;">
												Pharmacies List
											</h4>

											<div class="row">
												<div class="col-sm-12">
													<table class="table table-bodered" style="color: #555 !important;">
														<thead>
															<th>#</th>
															<th>Pharmacy Name</th>
															<th>Contact Person</th>
															<th>Location</th>
															<th>Region</th>
														</thead>
														<tbody>
															<?= @$pharmacy_table; ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> -->