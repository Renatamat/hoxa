<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Freeshifter
 */

namespace WP_Tailwind;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="icon" type="image/png" href="<?= get_stylesheet_directory_uri() . '/assets/images/favicon.png'; ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
	<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
  />
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

	<?php
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu( [
			'items_wrap'      => '<button style="right: 0;" class="toggle absolute pin-t pin-r mt-4 mr-4 button button-sm">X</button><ul id="%1$s" class="%2$s">%3$s</ul>',
			'theme_location'  => 'primary',
			'container'       => 'nav',
			'container_class' => 'nav-mobile',
			'container_id'    => 'mobile-menu',
			'menu_class'      => 'list-reset m-0 w-full pt-20'
		] );
	}?>

	<header class="header  pt-8 z-50 relative bg-transparent">
		<div class="container mx-auto items-center lg:items-start lg:px-0">
		<?php
			echo '<a class="logo "  href="/"><img style="" src="'.get_field_o('logo').'"/></a>'; 

		
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu([
					'theme_location'  => 'primary',
					'container'       => 'nav',
					'container_class' => 'nav-primary ml-auto',
					'menu_class'      => 'list-reset m-0 md:flex md:justify-end md:items-center mt-2'
				]);
			} ?>
			<div class="menu-item">
				<button class="toggle highlight">
<svg class="fill-current text-primary-100 w-8" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<path style=";" d="M479.18,91.897H32.821C14.69,91.897,0,77.207,0,59.077s14.69-32.821,32.821-32.821H479.18
		c18.13,0,32.82,14.69,32.82,32.821S497.31,91.897,479.18,91.897z"/>
	<path style="" d="M295.385,288.821H32.821C14.69,288.821,0,274.13,0,256s14.69-32.821,32.821-32.821h262.564
		c18.13,0,32.821,14.69,32.821,32.821S313.515,288.821,295.385,288.821z"/>
</g>
<path style="" d="M479.18,288.821h-52.513c-18.13,0-32.821-14.69-32.821-32.821s14.69-32.821,32.821-32.821h52.513
	c18.13,0,32.82,14.69,32.82,32.821S497.31,288.821,479.18,288.821z"/>
<path style="" d="M479.18,485.744H32.821C14.69,485.744,0,471.053,0,452.923c0-18.13,14.69-32.821,32.821-32.821
	H479.18c18.13,0,32.82,14.69,32.82,32.821C512,471.053,497.31,485.744,479.18,485.744z"/>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
</button>
			</div>
		</div>
	</header>

	<main>