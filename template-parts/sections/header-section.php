<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Springy
 */
$GLOBALS['springy_theme_options'] = springy_get_options_value();
global $springy_theme_options;
$search_header = absint($springy_theme_options['springy_enable_search']);
$header_text = esc_html($springy_theme_options['springy_header_image_text']);
$header_subtext = esc_html($springy_theme_options['springy_header_image_sub_heading']);
$header_btn = esc_html($springy_theme_options['springy_header_image_button_text']);
$header_link = esc_url($springy_theme_options['springy_header_image_button_link']);
?>

<header class="header-1">		
	<div class="mega_ts_menu">
         <div class="navbar fixed-nav transparent-white">
            <div class="nav-container clearfix_mn">	
				<div class="logo">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
					else :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					endif;
					$springy_description = get_bloginfo( 'description', 'display' );
					if ( $springy_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $springy_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div>
				<!-- .site-logo -->
				<nav>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'container' => 'ul',
						'menu_class'      => 'main-nav',
					));
					?>
				</nav>
				<!-- end of nav -->
				<?php if( 1 == $search_header ){ ?>	               	
					<!-- search box -->
	               	<div class="right-nav">
		               	<div class="search-box-wrapper clearfix_ts">
		   	            	<a href="#0" class="search-box"><i class="ti-search"></i></a>
		   	            	<div class="search-input">
		   	            		<?php echo get_search_form(); ?>
		   	            	</div>
		               	</div>
	               </div>
				<?php } ?>
				<!-- hamburger -->
               	<div class="menu-box">
	               	<div class="hum-line line-1"></div>
	               	<div class="hum-line line-2"></div>
	               	<div class="hum-line line-3"></div>
               	</div><!-- end of menu-box -->
			</div>
		</div>
	</div>
</header>
<div class="main-content">
<?php $header_image = esc_url(get_header_image());
	$header_class = ($header_image == "") ? '' : 'header-image';
	?>
	<div class="main-header <?php echo esc_attr($header_class); ?>" style="background-image:url(<?php echo esc_url($header_image) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
		<div class="container">
			<div class="head-img-wrapper">
				<div class="head-content">
					<h1 class="wel-title"><?php esc_html_e($header_text); ?></h1>
					<p class="wel-title"><?php esc_html_e($header_subtext); ?></p>
					<a href="<?php echo esc_url($header_link); ?>"><?php esc_html_e($header_btn); ?></a>
				</div>
			</div>
		</div>
	</div><!-- #masthead -->		

