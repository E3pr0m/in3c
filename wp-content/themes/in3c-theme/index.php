<?php
/**
 * Fallback template — usato solo se front-page.php non viene caricato.
 * Per il sito one-page, impostare in WP Admin > Impostazioni > Lettura:
 * "La tua homepage mostra" → Una pagina statica → seleziona una pagina vuota.
 */
get_header(); ?>

<main class="site-main">
	<div style="padding: 8rem 2rem; text-align: center; min-height: 60vh; display: flex; align-items: center; justify-content: center; flex-direction: column; gap: 1rem;">
		<p style="font-family: 'Montserrat', sans-serif; color: #999; font-size: 0.875rem; letter-spacing: 0.1em; text-transform: uppercase;">
			<?php esc_html_e( 'Configura la homepage in WP Admin → Impostazioni → Lettura', 'in3c-theme' ); ?>
		</p>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article><?php the_content(); ?></article>
		<?php endwhile; endif; ?>
	</div>
</main>

<?php get_footer(); ?>
