<div class="row">
	<div class="col-lg-3">
		<div class="hpanel stats">
			<div class="panel-body text-center h-200">
				<i class="pe-7s-display1 fa-4x"></i>
				<h1 class="m-xs"><span id = "total_monthly_surveys">100</span></h1>
				<h3 class="font-extra-bold no-margins text-success">Surveys</h3>
				<small>These are the number of surveys (<?= @date('F'); ?>)</small>
			</div>
			<div class="panel-footer text-center">
				<div class="row">
					<div class="col-xs-4">
						<span id = "month_counter_male">0</span> <br/>Male
					</div>
					<div class="col-xs-4">
						<span id = "month_counter_female">0</span> <br/>Female
					</div>
					<div class="col-xs-4">
						<span id = "month_counter_other">0</span> <br/>Other
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="hpanel stats">
			<div class="panel-body h-200">
				<div class="stats-title pull-left">
					<h4>Gender Statistcs</h4>
				</div>
				<div class="stats-icon pull-right">
					<i class="pe-7s-users fa-4x"></i>
				</div>
				<div class="clearfix"></div>
				<div class="flot-chart">
					<div class="flot-chart-content" id="flot-users-chart" style="height: 112px"></div>
				</div>
			</div>
			<div class="panel-footer text-center">
				<div class="row">
					<div class="col-xs-4">
						<span id = "gender_number_counter_male">0</span> <br/>Male
					</div>
					<div class="col-xs-4">
						<span id = "gender_number_counter_female">0</span> <br/>Female
					</div>
					<div class="col-xs-4">
						<span id = "gender_number_counter_other">0</span> <br/>Other
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="hpanel stats">
			<div class="panel-body text-center h-200">
				<i class="pe-7s-id fa-4x"></i>
				<h1 class="m-xs"><span id = "overall_average_age">25</span> Years</h1>
				<h3 class="font-extra-bold no-margins text-success">Average Age</h3>
				<small>The average age is calculated as per the surveys</small>
			</div>
			<div class="panel-footer text-center">
				<div class="row">
					<div class="col-xs-4">
						<span id = "age_counter_male">0</span> <br/>Male
					</div>
					<div class="col-xs-4">
						<span id = "age_counter_female">0</span> <br/>Female
					</div>
					<div class="col-xs-4">
						<span id = "age_counter_other">0</span> <br/>Other
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="hpanel stats">
			<div class="panel-body text-center h-200">
				<i class="pe-7s-id fa-4x"></i>
				<h1 class="m-xs"><span id = "overall_average_age">25</span> Years</h1>
				<h3 class="font-extra-bold no-margins text-success">Average Age</h3>
				<small>The average age is calculated as per the surveys</small>
			</div>
			<div class="panel-footer text-center">
				<div class="row">
					<div class="col-xs-4">
						<span id = "age_counter_male">0</span> <br/>Male
					</div>
					<div class="col-xs-4">
						<span id = "age_counter_female">0</span> <br/>Female
					</div>
					<div class="col-xs-4">
						<span id = "age_counter_other">0</span> <br/>Other
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-5">
		<div class="hpanel">
			<div class="panel-heading">
				Monthly Surveys Conducted By Users
			</div>
			<div class="panel-body">
				<div>
					<canvas id="monthlyCurve" height="140"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>