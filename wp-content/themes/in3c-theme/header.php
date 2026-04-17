<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
	<div class="header-inner">

		<!-- Logo -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo" aria-label="<?php bloginfo( 'name' ); ?>">
			<img
				src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>"
				alt="<?php bloginfo( 'name' ); ?>"
				class="header-logo__img"
				width="120"
				height="40"
			>
		</a>

		<!-- Navigation -->
		<nav class="header-nav" id="header-nav" aria-label="Menu principale">
			<ul class="header-nav__list">
				<li><a href="#home">Home</a></li>
				<li><a href="#percorsi">Percorsi</a></li>
				<li><a href="#attivita">Attività</a></li>
				<li><a href="#contatti">Contatti</a></li>
			</ul>
		</nav>

		<!-- Social & Actions -->
		<div class="header-actions">
			<?php
			$home_id         = get_option( 'page_on_front' );
			$url_instagram   = get_field( 'social_instagram', $home_id );
			$url_linkedin    = get_field( 'social_linkedin', $home_id );
			$url_facebook    = get_field( 'social_facebook', $home_id );
			?>

			<!-- Email -->
			<a href="mailto:info@in3c.it" class="header-actions__icon" aria-label="Email">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
					<rect x="2" y="4" width="20" height="16" rx="2"/>
					<path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
				</svg>
			</a>

			<!-- Instagram -->
			<a href="<?php echo esc_url( $url_instagram ?: 'https://www.instagram.com/' ); ?>" target="_blank" rel="noopener noreferrer" class="header-actions__icon" aria-label="Instagram">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
					<rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
					<path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
					<line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
				</svg>
			</a>

			<!-- LinkedIn -->
			<a href="<?php echo esc_url( $url_linkedin ?: 'https://www.linkedin.com/' ); ?>" target="_blank" rel="noopener noreferrer" class="header-actions__icon" aria-label="LinkedIn">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
					<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
					<rect x="2" y="9" width="4" height="12"/>
					<circle cx="4" cy="4" r="2"/>
				</svg>
			</a>

			<!-- Facebook -->
			<a href="<?php echo esc_url( $url_facebook ?: 'https://www.facebook.com/' ); ?>" target="_blank" rel="noopener noreferrer" class="header-actions__icon" aria-label="Facebook">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
					<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
				</svg>
			</a>

			<!-- Mobile burger -->
			<button class="header-burger" id="header-burger" aria-label="Apri menu" aria-expanded="false" aria-controls="header-nav">
				<span></span>
				<span></span>
				<span></span>
			</button>

		</div><!-- /.header-actions -->
	</div><!-- /.header-inner -->
</header>
