<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Polite
 */
$GLOBALS['polite_theme_options'] = polite_get_options_value();
global $polite_theme_options;
$offcanvas = absint($polite_theme_options['polite_enable_offcanvas']);
$search_header = absint($polite_theme_options['polite_enable_search']);
?>

<header class="header-1">		
	<div class="mega_ts_menu">
         <div class="navbar fixed-nav transparent-white">
            <div class="nav-container clearfix_mn">	
				<?php if( 1 == $offcanvas ){ ?>
					<button class="js-canvi-open-button--left mobile-menu"><span></span></button>
				<?php } ?>
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
					$polite_description = get_bloginfo( 'description', 'display' );
					if ( $polite_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $polite_description; /* WPCS: xss ok. */ ?></p>
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
		   	            		<!-- <form action="/" method="get">
								    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
								    <input type="submit" alt="Search"  />
								</form> -->
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
		<div class="head-img">
			<h1 class="wel-title">Welcome to Elementify</h1>
		</div>
	</div><!-- #masthead -->		

