<div class="row">
<div class="pull-right">
	<a class="btn btn-default btn-xs" id="add-user" data-toggle="modal" data-target="#myModal15">Add User</a>
</div>


<div class="modal fade hmodal-danger" id="myModal15" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class = "form-horizontal" action = "<?= @base_url('Dashboard/addUser/'); ?>" method = "POST">
				<!-- <div class="color-line"></div> -->
				<div class="modal-header">
					<h4 class="modal-title">Add User</h4>
					<small class="font-bold">Add a new user as an admin</small>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label" for="first_name">First Name</label>
						<div class="input-group m-b">
							<span class="input-group-addon"><i class = "fa fa-user"></i></span>
							<input class="form-control" id = "first_name" name = "first_name"></input>
						</div>						
					</div>

					<div class="form-group">
						<label class = "control-label" for = "last_name">Last Name</label>
						<div class="input-group m-b">
							<span class="input-group-addon"><i class = "fa fa-user"></i></span>
							<input class="form-control" id = "last_name" name = "last_name"></input>
						</div>
					</div>

					<div class="form-group">
						<label class = "control-label" for = "email">Email</label>
						<div class="input-group m-b">
							<span class="input-group-addon"><i class = "fa fa-phone"></i></span>
							<input class="form-control" id = "email" name = "email"></input>
						</div>
					</div>

					<div class="form-group">
						<label class = "control-label" for = "password">Password</label>
						<div class="input-group m-b">
							<span class="input-group-addon"><i class = "fa fa-globe"></i></span>
							<input class="form-control" id = "password" name = "password"></input>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
					<button class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>





	<div class="col-lg-12">

		<div class="hpanel">
		
			<div class="panel-heading">
				<div class="panel-tools">
					<a class="showhide"><i class="fa fa-chevron-up"></i></a>
					<a class="closebox"><i class="fa fa-times"></i></a>
				</div>
				Dashboard information and statistics
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3 text-center">
						<div class="small">
							<i class="fa fa-bolt"></i> Page views
						</div>
						<div>
						<h1 class="font-extra-bold m-t-xl m-b-xs">
							<span class = "google_numbers">226,802</span>
						</h1>
						<small>Page views in <span class = "number_of_days">Last 7 Days</span></small>
						</div>
						<div class="small m-t-xl">
							<i class="fa fa-clock-o"></i> <span class = "from_date">Data from January</span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="text-center small">
							<i class="fa fa-laptop"></i> Active users in current month (December)
						</div>
						<div class="flot-chart" style="height: 160px">
							<div class="flot-chart-content" id="flot-line-chart"></div>
						</div>
					</div>
					<div class="col-md-3 text-center">
						<div class="small">
							<i class="fa fa-calendar-o"></i> Statistics duration
						</div>
						<div>
							<h1 class="font-extra-bold m-t-xl m-b-xs">
								7 Days
							</h1>
							<small>Data From Google Analytics</small>
						</div>
						<div class="small m-t-xl">
						<i class="fa fa-clock-o"></i> Last active in 12.10.2015
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer">
			<span class="pull-right">
			You have two new messages from <a href="#">Monica Bolt</a>
			</span>
			Last update: 21.05.2015
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-3">
		<div class="hpanel">
			<div class="panel-body h-200">
				<div class="stats-title pull-left">
					<h4>Page Views</h4>
				</div>
				<div class="stats-icon pull-right">
					<i class="pe-7s-monitor fa-4x"></i>
				</div>
				<div class="m-t-xl">
					<h1 class="text-success"><span class = "google_numbers">860k+</span></h1>
					<span class="font-bold no-margins">
						Users
					</span>
					<br>
					<small>
						There are statistics from Google Analytics.<br>
						Data from last 7 Days
					</small>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="hpanel">
			<div class="panel-body h-200">
				<div class="stats-title pull-left">
					<h4>Surveys</h4>
				</div>
				<div class="stats-icon pull-right">
					<i class="pe-7s-news-paper fa-4x"></i>
				</div>
				<div class="m-t-xl">
					<h1 class="text-success"><span id = "numbers"><?= @$stats['surveys']; ?></span></h1>
					<span class="font-bold no-margins">
						Users
					</span>
					<br>
					<small>
						Users have filled in some surveys<br>
						Data from last 7 Days
					</small>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="hpanel">
			<div class="panel-body h-200">
				<div class="stats-title pull-left">
					<h4>PHARMACIES</h4>
				</div>
				<div class="stats-icon pull-right">
					<i class="fa fa-medikit fa-4x"></i>
				</div>
				<div class="m-t-xl">
					<h1 class="text-success"><span id = "numbers"><?= @$stats['pharmacies']; ?></span></h1>
					<span class="font-bold no-margins">
						Available
					</span>
					<br>
					<small>
						These are the total number of pharmacies where the patients can find the test kits
					</small>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="hpanel">
			<div class="panel-body h-200">
				<div class="stats-title pull-left">
					<h4>REFERAL SITES</h4>
				</div>
				<div class="stats-icon pull-right">
					<i class="fa fa-hospital-o fa-4x"></i>
				</div>
				<div class="m-t-xl">
					<h1 class="text-success"><span id = "numbers"><?= @$stats['referrals']; ?></span></h1>
					<span class="font-bold no-margins">
						Available
					</span>
					<br>
					<small>
						These are the total number of facilities that the users can visit
					</small>
				</div>
			</div>
		</div>
	</div>
</div>