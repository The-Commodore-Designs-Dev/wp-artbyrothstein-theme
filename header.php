<!DOCTYPE html>
<html lang="en"> 
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Art By Rothstein Theme">
    <meta name="author" content="https://www.gregorypaulrothstein.dev">    
    <link rel="shortcut icon" href="/wp-content/themes/artbyrothsteintheme/assets/images/logo.png"> 
    <!-- CSS Injection -->
	<?php
	wp_head();
	?>
</head>
<body>
    
	<header class="art-header">
		<div class="art-header__logo-nav--sticky" style="">
			<div class="art-header__wrapper">
				<div class="container-fluid">
					<div class="art-header__toolbar">
					</div>
					<div class="art-header__logo-nav">
						<a href="#" rel="home" class="ct-logo">
							<?php
								if (function_exists('the_custom_logo')) {
									$custom_logo_id = get_theme_mod( 'custom_logo' );
									$logo = wp_get_attachment_image_src($custom_logo_id, 'full' );
								}
							?>
							<img class="art-logo__image" src="<?php echo $logo[0] ?>" alt="Art Gallery WP">
						</a>
						<label id="art-main-nav__toggle-navigation" for="art-main-nav__toggle-navigation-main">Menu <i class="ti-align-justify"></i></label>
						<div id="art-main-nav">
							<input type="checkbox" hidden="" id="art-main-nav__toggle-navigation-main">
							<nav id="art-main-nav__wrapper">
								<?php
									wp_nav_menu(
										array(
											'menu' => 'primary',
											'container' => '',
											'theme_location' => 'primary',
											'items_wrap' => '<ul id="menu-menu" class="art-main-navigation">%3$s</ul>'
										)
									);
								?>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
    <div class="main-wrapper">