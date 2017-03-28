<?php $assets_url = $this->config->item('assets_url');?>
<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="EQA::">
	<meta name="author" content="Willy Mareka, Chispine Otaalo, Richard Karsan">
	<title>HIV Self-Test::<?= @$pagetitle; ?></title>
	

	<?= @$page_css; ?>
	
</head>
<body>
	
	<?= $this->load->view($partial, $partialData); ?>
			

	<?= @$page_js; ?>
	<?php if(isset($javascript_file)) { ?>
		<?php $this->load->view($javascript_file, $javascript_data); ?>
	<?php } ?>
</body>
</html>