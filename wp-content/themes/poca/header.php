<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Poca - Podcast &amp; Audio Template">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/core-img/favicon.ico">
  
  <!-- Title -->
  <title>Poca - Podcast &amp; Audio Template</title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- Preloader -->
	<div id="preloader">
		<div class="preloader-thumbnail">
		<img src="<?php echo get_template_directory_uri(); ?>/img/core-img/preloader.png" alt="">
		</div>
	</div>

	<!-- **** Header Area Start **** -->
	<header class="header-area">
		<!-- Main Header Start -->
		<div class="main-header-area">
		<div class="classy-nav-container breakpoint-off">
			<!-- Classy Menu -->
			<nav class="classy-navbar justify-content-between" id="pocaNav">

			<!-- Logo -->
			<?php
			the_custom_logo(); ?>
			<a class="nav-brand" href=""><img src="<?php echo get_template_directory_uri(); ?>/img/core-img/logo.png" alt=""></a>

			<!-- Navbar Toggler -->
			<div class="classy-navbar-toggler">
				<span class="navbarToggler"><span></span><span></span><span></span></span>
			</div>

			<!-- Menu -->
			<div class="classy-menu">

				<!-- Menu Close Button -->
				<div class="classycloseIcon">
				<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
				</div>

				<!-- Nav Start -->
				<div class="classynav">
				<?php
					wp_nav_menu(
						array(
							'container_class' => 'main-nav',
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
				?>

				<!-- Top Search Area -->
				<div class="top-search-area">
					<form action="index.html" method="post">
					<input type="search" name="top-search-bar" class="form-control" placeholder="Search and hit enter...">
					<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>

				<!-- Top Social Area -->
				<div class="top-social-area">
					<a href="#" class="fa fa-facebook" aria-hidden="true"></a>
					<a href="#" class="fa fa-twitter" aria-hidden="true"></a>
					<a href="#" class="fa fa-pinterest" aria-hidden="true"></a>
					<a href="#" class="fa fa-instagram" aria-hidden="true"></a>
					<a href="#" class="fa fa-youtube-play" aria-hidden="true"></a>
				</div>

				</div>
				<!-- Nav End -->
			</div>
			</nav>
		</div>
		</div>
	</header>
  <!-- **** Header Area End **** -->