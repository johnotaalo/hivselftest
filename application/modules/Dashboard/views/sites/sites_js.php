<style type="text/css">
	.select2, .editable-input{
		width: 100% !important;
	}
</style>
<script type="text/javascript">
	// $('#wrapper div.content').removeClass('animate-panel');
	$.fn.editable.defaults.mode = 'inline';
	var aoColumnDefs = [
	{
		"aTargets": [0, 4, 5],
		"bSortable": false
	}];
	$('#facilities_list').DataTable({
		"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
		dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>rtp",
		buttons: [
			{extend: 'csv',title: 'Be Sure Facility Listing', className: 'btn-sm'},
			{extend: 'pdf', title: 'Be Sure Facility Listing', className: 'btn-sm'},
			{extend: 'print',className: 'btn-sm'}
		],
		"aoColumnDefs": aoColumnDefs,
		aaSorting: [[1, 'asc']],
		serverSide: true,
		processing: true,
		ajax: {
			url: "<?= @base_url('Dashboard/API/getFacilities'); ?>",
			type: "POST",
			error: function(){
				console.log("There was an error pulling in your data");
			}
		},
		fnRowCallback: function( nRow, mData, iDisplayIndex){
			$('.facility_latitude', nRow).editable();
			$('.facility_longitude', nRow).editable();
			$('.facility_nearest_town', nRow).editable();
			$('.facility_description', nRow).editable();
			$('.facility_county', nRow).editable({
				source: <?= @$counties; ?>
			});
			return nRow;
		}
	});

	$('#pharmacy_list').DataTable({
		"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
		dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>rtp",
		buttons: [
			{extend: 'copy',className: 'btn-sm'},
			{extend: 'csv',title: 'Be Sure Pharmacy Listing', className: 'btn-sm'},
			{extend: 'pdf', title: 'Be Sure Pharmacy Listing', className: 'btn-sm'},
			{extend: 'print',className: 'btn-sm'}
		],
		"aoColumnDefs": aoColumnDefs,
		aaSorting: [[1, 'asc']],
		serverSide: true,
		processing: true,
		ajax: {
			url: "<?= @base_url('Dashboard/API/getPharmacies'); ?>",
			type: "POST",
			error: function(){
				console.log("There was an error pulling in your data");
			}
		},
		fnRowCallback: function( nRow, mData, iDisplayIndex){
			$('span[class^="pharmacy_"]', nRow).editable();
			$('span.sel_pharmacy_county', nRow).editable({
				source: <?= @$counties; ?>
			});
			return nRow;
		}
	});

	$('#pharmacy_county').select2({
		data: <?= @$counties; ?>
	});
	$('#add-pharmacy').click(function(){	
	});

	$('#facilities_list').on('click', '.remove-facility', function(){
		var id = $(this).attr('data-id');
		swal({
			title: "Are you sure?!",
			text: "By removing this entry, the data will be completely lost. Continue?",
			type: "info",
			showCancelButton: true,
			closeOnConfirm: false,
			showLoaderOnConfirm: false,
		}, function(){
			$.ajax({
				'url' 		: 	"<?= @base_url('Dashboard/Sites/removeFacility/'); ?>",
				'method'	:	"POST",
				'data'		:	{
					'id'		:	id,
					'confirmed' :	true
				},
				success: function(res){
					swal('Success', 'Successfully removed referral site', 'success');
					location.reload();
				},
				error : function(xhr, status, error){
					swal('Error', 'There was an error:' + xhr.responseJSON.message, 'error');
				}
			});
			// window.location = "/Dashboard/Sites/remove/" + id;
		});
	});

	$('#pharmacy_list').on('click', '.remove', function(){
		var id = $(this).attr('data-id');
		swal({
			title: "Are you sure?!",
			text: "By removing this entry, the data will be completely lost. Continue?",
			type: "info",
			showCancelButton: true,
			closeOnConfirm: false,
			showLoaderOnConfirm: false,
		}, function(){
			$.ajax({
				'url' 		: 	"<?= @base_url('Dashboard/Sites/remove/'); ?>",
				'method'	:	"POST",
				'data'		:	{
					'id'		:	id,
					'confirmed' :	true
				},
				success: function(res){
					swal('Success', 'Successfully removed pharmacy', 'success');
					location.reload();
				},
				error : function(xhr, status, error){
					swal('Error', 'There was an error:' + xhr.responseJSON.message, 'error');
				}
			});
			// window.location = "/Dashboard/Sites/remove/" + id;
		});

	});
</script>