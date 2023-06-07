<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Newsmatic
 */
use Newsmatic\CustomizerDefault as ND;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1693765719535392"
     crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?> <?php newsmatic_schema_body_attributes(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'newsmatic' ); ?></a>
	<div class="newsmatic_ovelay_div"></div>
	<?php
		/**
		 * hook - newsmatic_page_prepend_hook
		 * 
		 * @package Newsmatic
		 * @since 1.0.0
		 */
		do_action( "newsmatic_page_prepend_hook" );
	?>
	
	<header id="masthead" class="site-header layout--default layout--one">
		<?php
			/**
			 * Function - newsmatic_top_header_html
			 * 
			 * @since 1.0.0
			 * 
			 */
			newsmatic_top_header_html();

			/**
			 * Function - newsmatic_header_html
			 *  
			 * @since 1.0.0
			 * 
			 */
			newsmatic_header_html();
		?>
	</header><!-- #masthead -->
	
	<?php
	/**
	 * function - newsmatic_after_header_html
	 * 
	 * @since 1.0.0
	 */
	newsmatic_after_header_html();