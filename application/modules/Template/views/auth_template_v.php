<?php $assets_url = $this->config->item('assets_url');?>
<!DOCTYPE html>

<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo $pagetitle;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <?= @$page_css;?>

  
  <!-- / Demo assets -->
</head>
<body>
 
  <?= $this->load->view($partial, $partialData); ?>

  <?= @$page_js; ?>
  <?php if(isset($javascript_file)) { ?>
    <?php $this->load->view($javascript_file, $javascript_data); ?>
  <?php } ?>

</body>

</html>
