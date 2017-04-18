<script> 
   $(document).ready(function(){
// alert("reached");
    	$('#myModal').on('shown.bs.modal', function () {
		  $('#myInput').focus()
		});

		$('#myModal').modal('show');

		$('#survey-submit').click(function (e) { 
			// alert("clicked");
		 	e.preventDefault();
	  		var formData = $('#survey-form').serialize();

  // 		$('#ptround-form').validate({
		// 	rules: {
		// 		question_1: {
		// 			required: true
		// 		},
		// 		question_2: {
		// 			required: true
		// 		},
		// 		question_3: {
		// 			required: true
		// 		},
		// 		question_5: {
		// 			required: true
		// 		}
		// 	},
		// 	messages : {
		// 		question_1: {
		// 			required: "Please select answer for Question 1"
		// 		},
		// 		question_2: {
		// 			required: "Please select answer for Question 2"
		// 		},
		// 		question_3: {
		// 			required: "Please select answer for Question 3"
		// 		},
		// 		question_5: {
		// 			required: "Please select answer for Question 5"
		// 		}
		// 	}
		// });
			
			surveySubmit(formData);
	});


	function surveySubmit(formData){
	  // alert(formData);
		$.ajax({
		   	type: "POST",
		   	url: "<?= @base_url('Home/Survey'); ?>",
		   	dataType: 'json',
			data: formData,
		   success: function(response){   
		   		if(response){
					//alert("response");
                	swal({title: response.title,text: response.message,timer: 3000,showConfirmButton: true, type:response.type});
                	
                	$('#myModal').modal('toggle');
                }	
		   },
		   beforeSend:function()
		   {
			swal({title: "Loading",text: "Sending your data",showConfirmButton: true});
		   }
	  	});
	}



    });
</script>