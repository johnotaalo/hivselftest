<?php $assets_url = $this->config->item('assets_url'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>HIV Self-Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1, max-scale=1">

    <?= @$page_css; ?>
</head>
<body>
    
        <?= $this->load->view($partial, $partialData); ?>
  
    

    <?= @$page_js; ?>
</body>
</html>