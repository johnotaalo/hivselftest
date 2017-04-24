<script type="text/javascript">
	$(document).ready(function(){
		createPieChart();
	});

	function createPieChart(){
		var pieChartOptions = {
			series: {
				pie: {
					show: true
				}
			},
			grid: {
				hoverable: true
			},
			tooltip: true,
			tooltipOpts: {
				content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
				shifts: {
					x: 20,
					y: 0
				},
				defaultTheme: false
			}
		};

		var sharpLineOptions = {
			responsive: true,
			legend: {
				display: false
			}
		};

		$.ajax({
			url: "<?= @base_url('Dashboard/Surveys/getAnalyticsData'); ?>",
			type: "POST",
			data: []
		})
		.done(function(res){
			var pieChartData = res.data.gender_counts;
			var sharpLineData = res.data.monthly_curve_data;

			$('#gender_number_counter_male').text(res.data.gendernos.Male);
			$('#gender_number_counter_female').text(res.data.gendernos.Female);
			$('#gender_number_counter_other').text(res.data.gendernos.Other);

			$('#overall_average_age').text(res.data.overall_average);
			$("#age_counter_male").text(res.data.average_ages.Male);
			$("#age_counter_female").text(res.data.average_ages.Female);
			$("#age_counter_other").text(res.data.average_ages.Other);

			$('#total_monthly_surveys').text(res.data.monthly_total);
			$("#month_counter_male").text(res.data.monthly_count.Male);
			$("#month_counter_female").text(res.data.monthly_count.Female);
			$("#month_counter_other").text(res.data.monthly_count.Other);

			var ctx = document.getElementById("monthlyCurve").getContext("2d");

			new Chart(ctx, {type: 'line', data: sharpLineData, options: sharpLineOptions});
			
			$.plot($("#flot-users-chart"), pieChartData, pieChartOptions);
		});
	}
</script>