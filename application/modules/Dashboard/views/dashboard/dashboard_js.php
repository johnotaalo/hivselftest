<script type="text/javascript">
	$(document).ready(function(){
		getViewsData();
	});

	function getViewsData(){
		var numberBox = $('.google_numbers');

		numberBox.html("pulling...");

		$.get('<?= @base_url('Dashboard/getSessions'); ?>', function(data){
			if (data.type == true) {
				numberBox.text(data.data.views);
			}
		});
	}
</script>