<?php $assets_url = $this->config->item('assets_url'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>HIV Self-Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1, max-scale=1">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Josefin+Sans:700%7CUbuntu:400,500,700,400italic&subset=latin' type='text/css' media='all'/>
<link rel='stylesheet' href='<?= @$assets_url; ?>font-icons/fontello/css/apalodi-fontello.css' type='text/css' media='all'/>
<link rel='stylesheet' href='<?= @$assets_url; ?>css/style.css' type='text/css' media='all'/>
<link rel='stylesheet' href='<?= @$assets_url; ?>css/style-custom.css' type='text/css' media='all'/>
<script type='text/javascript' src='<?= @$assets_url; ?>js/vendor/jquery.js'></script>
<script type='text/javascript' src='<?= @$assets_url; ?>js/vendor/jquery-migrate.min.js'></script>
<script type='text/javascript' src='<?= @$assets_url; ?>js/vendor/modernizr.min.js'></script>
<style type="text/css">.custom-css-1488423852758{padding-top:300px;}.custom-css-1488423872205{padding-top:50px;padding-right:12%;padding-bottom:50px;padding-left:12%;}.custom-css-1488422976635{padding-top:50px;padding-right:12%;padding-bottom:50px;padding-left:12%;background-color:#FFC107;}.custom-css-1488423931362{padding-top:200px;}.custom-css-1488423939872{padding-top:200px;}.custom-css-1488423223527{padding-top:50px;padding-right:12%;padding-bottom:50px;padding-left:12%;background-color:#9373de;}</style>
    <?= @$page_css; ?>
</head>
<body class="no-page-heading fluid-width no-top-content-padding no-bottom-content-padding">
<div id="page" class="site">
<header id="masthead" class="site-header header-resize">
<div class="header-cart">
<div class="mini-cart">
<div class="mini-cart-content">
<ul class="mini-cart-list">
<li class="mini-cart-item">
<a href="#" class="remove">&times;</a>
<a class="mini-cart-link" href="#">
<div class="image-thumbnail thumbnail-size">
<img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" class="mini-cart-image lazy-load-img" alt="photo-1436367050586-7c605120bf73" data-src="https://demo.apalodi.com/azra/wp-content/uploads/sites/2/2017/01/photo-1436367050586-7c605120bf73-150x150.jpg">
</div>
<div class="mini-cart-info">
<h4 class="mini-cart-title">Blue Suit</h4>
<span class="quantity">1 &times; <span class="price-amount"><span class="price-currency">&#36;</span>799.00</span></span>
</div>
</a>
</li>
<li class="mini-cart-item">
<a href="#" class="remove">&times;</a>
<a class="mini-cart-link" href="#">
<div class="image-thumbnail thumbnail-size">
<img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" class="mini-cart-image lazy-load-img" alt="Oldtimer" data-src="https://demo.apalodi.com/azra/wp-content/uploads/sites/2/2017/01/photo-1464219789935-c2d9d9aba644-150x150.jpg">
</div>
<div class="mini-cart-info">
<h4 class="mini-cart-title">Old Timers</h4>
<span class="quantity">1 &times; <span class="price-amount"><span class="price-currency">&#36;</span>899.00</span></span>
</div>
</a>
</li>
<li class="mini-cart-item">
<a href="#" class="remove">&times;</a>
<a class="mini-cart-link" href="shop/product.html">
<div class="image-thumbnail thumbnail-size">
<img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" class="mini-cart-image lazy-load-img" alt="Headphones" data-src="https://demo.apalodi.com/azra/wp-content/uploads/sites/2/2017/01/e-aupyxbjm-alice-moore-150x150.jpg">
</div>
<div class="mini-cart-info">
<h4 class="mini-cart-title">Headphones</h4>
<span class="quantity">1 &times; <span class="price-amount"><span class="price-currency">&#36;</span>99.00</span></span>
</div>
</a>
</li>
</ul>
</div>
<div class="mini-cart-meta">
<p class="mini-cart-total">
<span class="mini-cart-subtotal">Subtotal:</span>
<span class="mini-cart-subtotal-amount"><span class="price-amount"><span class="price-currency">&#36;</span>1,797.00</span></span>
</p>
<div class="mini-cart-actions">
<a href="shop/cart.html" class="button button-cart"><i class="apalodi-icon-cart-7"></i><span>View Cart</span></a>
<a href="shop/checkout.html" class="button button-checkout"><i class="apalodi-icon-right-circled-alt"></i><span>Checkout</span></a>
</div>
</div>
</div>
</div>
<div class="site-header-container container">
<div class="logo">
<a href="index.html" rel="home">
<img class="logo-default" src="<?= @$assets_url; ?>img/logo.png" alt="Azra">
</a>
</div>
<!-- <div class="site-actions">
<span class="header-cart-trigger site-action-trigger apalodi-icon-cart-7"> <span class="header-cart-count site-action-info">3</span></span>
<span class="header-cart-close-trigger site-action-close slide-out-action-close"><span></span></span>
<span class="header-search-trigger site-action-trigger apalodi-icon-search-alt"><span></span></span>
<span class="mobile-menu-trigger hamburger-menu"><span></span></span>
<span class="mobile-menu-close-trigger site-action-close slide-out-action-close"><span></span></span>
<span class="site-actions-overlay"></span>
</div> -->
<div class="site-header-inner">
<div class="header-search-form">
<form role="search" method="get" class="search-form" action="/">
<label>
<span class="screen-reader-text">Search for:</span>
<input type="search" class="search-field" placeholder="Search" value="" name="s"/>
</label>
<button type="submit" class="search-submit"><span>Search</span></button>
</form>
<span class="header-search-form-close site-action-close"></span>
</div>
<div class="site-navigation-wrapper">
<nav class="main-navigation">

<ul class="site-nav">
	<li class="menu-item menu-item-has-children menu-no-link mega-menu mm-col-2 mega-menu-center"><a><span><span class="menu-item-label">Home</span></span></a>
	</li>

	<li class="menu-item menu-item-has-children menu-no-link"><a href="#"><span><span class="menu-item-label">HIV Self-Test</span></span></a>
	</li>

	<li class="menu-item menu-item-has-children menu-no-link"><a><span><span class="menu-item-label">Conduct a Test</span></span></a>
		<ul class="sub-menu">
		<li class="menu-item"><a href="<?= @base_url('Home/videos/');?>"><span><span class="menu-item-label">Instructional Videos</span></span></a></li>
		<li class="menu-item menu-description"><a href="#"><span><span class="menu-item-label">Upload IFU</span></span></a></li>
		</ul>
	</li>

	<li class="menu-item menu-item-has-children menu-no-link"><a><span><span class="menu-item-label">Get a Kit</span></span></a>
		<ul class="sub-menu">
		<li class="menu-item menu-description"><a href="#"><span><span class="menu-item-label">Participating outlets</span></span></a></li>
		<li class="menu-item"><a href="#"><span><span class="menu-item-label">Google Maps</span></span></a></li>
		</ul>
	</li>

	<li class="menu-item menu-item-has-children menu-no-link"><a><span><span class="menu-item-label">Health Professionals</span></span></a>
		<ul class="sub-menu">
		
		<li class="menu-item"><a href="<?= @base_url('Map'); ?>"><span><span class="menu-item-label">Referral sites</span></span></a></li>
		<li class="menu-item menu-description"><a href="#"><span><span class="menu-item-label">PDFs</span></span></a></li>
		<li class="menu-item"><a href="#"><span><span class="menu-item-label">Gozee</span></span></a></li>
		</ul>
	</li>

	<li class="menu-item menu-item-has-children menu-no-link"><a><span><span class="menu-item-label">Resources</span></span></a>
		<ul class="sub-menu">
		
		<li class="menu-item"><a href="<?= @base_url('Resources/what_is_prep'); ?>"><span><span class="menu-item-label">What is a Prep</span></span></a></li>
		<li class="menu-item"><a href="blog/post.html"><span><span class="menu-item-label">LVCT online</span></span></a></li>
		<li class="menu-item"><a href="blog/post.html"><span><span class="menu-item-label">Manufacturer Website</span></span></a></li>
		</ul>
	</li>
	



<li class="menu-item menu-font-icon menu-button"><a target="_blank" href="#"><span><span class="menu-item-label">Login</span></span></a></li>
</ul>

</nav>
</div>
</div>
</div>
</header>


				<?= $this->load->view($partial, $partialData); ?>
  
    <footer id="colophon" class="site-footer">
<div class="site-footer-container container">
<div class="footer-logo">
<a href="index.html" rel="home">
<img src="<?= @$assets_url; ?>img/logo-footer.png" alt="Azra">
</a>
</div>
<div class="footer-content">
<nav class="footer-menu">
<ul>
<li class="menu-item"><a href="about-us.html">Do you need information, counseling or someone friendly to talk to about HIV & AIDS, Sex, STIs, Contraceptives, sexual and Gender Based Violence and other health, Teen or Youth related issues? CALL/SMS: 1190 Free from Safaricom line (Everyday 8am-8pm )</a></li>
<!-- <li class="menu-item"><a href="our-process.html">Terms of Use</a></li>
<li class="menu-item"><a href="contact-us-2.html">Contact</a></li>
<li class="menu-item"><a href="our-team.html">Carrers</a></li>
<li class="menu-item"><a href="our-services.html">Services</a></li> -->
</ul>
</nav>
<div class="copyright">
<p>© <a href="http://www.one2onekenya.org" target="_blank">One 2 One</a> and <a href="" target="_blank">LVCTHealth</a></p>
</div>
</div>
<div class="footer-social">
<div class="social-icons">
<a class="social-icon icon-facebook" href="https://www.facebook.com/One2one-ke-144444975612410/?hc_location=ufi" target="_blank"><span>facebook</span></a>
<a class="social-icon icon-twitter" href="https://twitter.com/one2oneke?lang=en" target="_blank"><span>twitter</span></a>
<a class="social-icon icon-instagram" href="https://www.instagram.com/onetooneke/?hl=en" target="_blank"><span>instagram</span></a>
</div>
</div>
</div>
</footer>
</div>

<link rel='stylesheet' href='<?= @$assets_url; ?>css/animate.min.css' type='text/css' media='all'/>
<script type='text/javascript' src='<?= @$assets_url; ?>js/plugins.js'></script>
<script type='text/javascript' src='<?= @$assets_url; ?>js/main.js'></script>

    <?= @$page_js; ?>
	<?php if(isset($javascript_file)) { ?>
		<?php $this->load->view($javascript_file, $javascript_data); ?>
	<?php } ?>
	<?php
		if($this->router->fetch_class() == "Map"){
	?>
		<script src="https://maps.googleapis.com/maps/api/js?key=<?= @$this->config->item('key'); ?>&callback=initMap" async defer></script>
	<?php  } ?>

</body>
</html>