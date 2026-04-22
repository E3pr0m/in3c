<?php get_header(); ?>

<?php
$acf_about        = get_field( 'about' )        ?: [];
$acf_video_banner = get_field( 'video_banner' )  ?: [];
$acf_manifesto    = get_field( 'manifesto' )     ?: [];
$acf_attivita     = get_field( 'attivita' )      ?: [];
$acf_blog         = get_field( 'blog' )          ?: [];
?>

<main class="site-main" id="main">

	<!-- ═══════════════════════════════════════════════
	     HERO
	     Split: sinistra video hero / destra tagline
	═══════════════════════════════════════════════ -->
	<section class="hero" id="home" aria-label="Hero">
		<div class="hero__media">
			<?php
			$video_field = get_field( 'hero_video' );
			$video_url   = $video_field ? $video_field['url'] : '';
			?>
			<video class="hero__video" autoplay muted loop playsinline>
				<source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4">
			</video>
		</div>
		<div class="hero__content">
			<h1 class="hero__title">
				<span class="hero__title-line">Coaching</span>
				<span class="hero__title-line hero__title-line--red">Creatività</span>
				<span class="hero__title-line">Crescita</span>
			</h1>
		</div>
	</section>

	<!-- ═══════════════════════════════════════════════
	     UN PO' DI ME + COSA FACCIO + (A CHI?)
	     Sinistra: foto coach / Destra: 3 blocchi testo
	═══════════════════════════════════════════════ -->
	<section class="about" id="chi-sono" aria-label="Chi sono">
		<div class="about__photo">
			<?php $foto_coach = $acf_about['about_foto_coach'] ?? null; ?>
			<?php if ( $foto_coach ) : ?>
				<img
					src="<?php echo esc_url( $foto_coach['url'] ); ?>"
					alt="<?php echo esc_attr( $foto_coach['alt'] ); ?>"
					class="about__photo-img"
				>
			<?php else : ?>
				<div class="about__photo-placeholder">
					<span>Foto Coach</span>
				</div>
			<?php endif; ?>
		</div>

		<div class="about__blocks">

			<div class="about__block reveal">
				<div class="about__accent-bar"></div>
				<div class="about__block-content">
					<h2 class="about__block-title">Un po' di me</h2>
					<p><?php echo esc_html( $acf_about['about_testo_me'] ?? '' ); ?></p>
				</div>
			</div>

			<div class="about__block reveal">
				<div class="about__accent-bar"></div>
				<div class="about__block-content">
					<h3 class="about__block-title about__block-title--sm">Cosa faccio</h3>
					<p><?php echo esc_html( $acf_about['about_testo_faccio'] ?? '' ); ?></p>
				</div>
			</div>

			<div class="about__block reveal">
				<div class="about__accent-bar"></div>
				<div class="about__block-content">
					<h3 class="about__block-title about__block-title--sm">(A chi?)</h3>
					<p><?php echo esc_html( $acf_about['about_testo_achi'] ?? '' ); ?></p>
				</div>
			</div>

		</div>
	</section>

	<!-- ═══════════════════════════════════════════════
	     MARQUEE — testo scorrevole
	═══════════════════════════════════════════════ -->
	<div class="marquee-banner" aria-hidden="true">
		<div class="marquee-track">
			<?php for ( $i = 0; $i < 5; $i++ ) : ?>
				<span class="marquee-item">COACHING</span><span class="marquee-dot">·</span>
				<span class="marquee-item">CREATIVITÀ</span><span class="marquee-dot">·</span>
				<span class="marquee-item">CRESCITA</span><span class="marquee-dot">·</span>
			<?php endfor; ?>
		</div>
	</div>

	<!-- ═══════════════════════════════════════════════
	     VIDEO BANNER
	     Sfondo scuro: testo rosso grande + media
	═══════════════════════════════════════════════ -->
	<section class="video-banner" id="percorsi" aria-label="Video banner">
		<div class="video-banner__text">
			<p class="video-banner__quote"><?php echo esc_html( $acf_video_banner['banner_citazione'] ?? '' ); ?></p>
		</div>
		<div class="video-banner__media">
			<?php $banner_media = $acf_video_banner['banner_media'] ?? null; ?>
			<?php if ( $banner_media ) : ?>
				<img
					src="<?php echo esc_url( $banner_media['url'] ); ?>"
					alt="<?php echo esc_attr( $banner_media['alt'] ); ?>"
				>
			<?php else : ?>
				<div class="media-placeholder dark">
					<span>Video / Immagine</span>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- ═══════════════════════════════════════════════
	     MANIFESTO — 4 punti con hover effect
	     Default: numero + titolo + intro
	     Hover:   foto + testo completo
	═══════════════════════════════════════════════ -->
	<section class="manifesto" id="manifesto" aria-label="Manifesto coaching">
		<div class="manifesto__header reveal">
			<span class="manifesto__label">Coaching</span>
		</div>

		<div class="manifesto__grid">

			<?php
			$manifesto_items = array(
				1 => array(
					'titolo' => $acf_manifesto['manifesto_1_titolo'] ?? '',
					'intro'  => $acf_manifesto['manifesto_1_intro']  ?? '',
					'testo'  => $acf_manifesto['manifesto_1_testo']  ?? '',
					'foto'   => $acf_manifesto['manifesto_1_foto']   ?? null,
				),
				2 => array(
					'titolo' => $acf_manifesto['manifesto_2_titolo'] ?? '',
					'intro'  => $acf_manifesto['manifesto_2_intro']  ?? '',
					'testo'  => $acf_manifesto['manifesto_2_testo']  ?? '',
					'foto'   => $acf_manifesto['manifesto_2_foto']   ?? null,
				),
				3 => array(
					'titolo' => $acf_manifesto['manifesto_3_titolo'] ?? '',
					'intro'  => $acf_manifesto['manifesto_3_intro']  ?? '',
					'testo'  => $acf_manifesto['manifesto_3_testo']  ?? '',
					'foto'   => $acf_manifesto['manifesto_3_foto']   ?? null,
				),
				4 => array(
					'titolo' => $acf_manifesto['manifesto_4_titolo'] ?? '',
					'intro'  => $acf_manifesto['manifesto_4_intro']  ?? '',
					'testo'  => $acf_manifesto['manifesto_4_testo']  ?? '',
					'foto'   => $acf_manifesto['manifesto_4_foto']   ?? null,
				),
			);

			foreach ( $manifesto_items as $n => $item ) :
			?>
			<div class="manifesto__item" tabindex="0" role="article">
				<div class="manifesto__default">
					<span class="manifesto__number" aria-hidden="true"><?php echo esc_html( $n ); ?>.</span>
					<h3 class="manifesto__item-title"><?php echo esc_html( $item['titolo'] ); ?></h3>
					<p class="manifesto__item-intro"><?php echo esc_html( $item['intro'] ); ?></p>
				</div>
				<div class="manifesto__hover-layer" aria-hidden="true">
					<div class="manifesto__hover-photo">
						<?php if ( $item['foto'] ) : ?>
							<img
								src="<?php echo esc_url( $item['foto']['url'] ); ?>"
								alt="<?php echo esc_attr( $item['foto']['alt'] ); ?>"
							>
						<?php else : ?>
							<div class="media-placeholder light"><span>Foto</span></div>
						<?php endif; ?>
					</div>
					<div class="manifesto__hover-text">
						<span class="manifesto__number"><?php echo esc_html( $n ); ?>.</span>
						<h3 class="manifesto__item-title"><?php echo esc_html( $item['titolo'] ); ?></h3>
						<p><?php echo esc_html( $item['testo'] ); ?></p>
					</div>
				</div>
			</div>
			<?php endforeach; ?>

		</div>
	</section>

	<!-- ═══════════════════════════════════════════════
	     BLOG VIDEO
	     Sinistra: video + link blog / Destra: citazione + scopri
	═══════════════════════════════════════════════ -->
	<section class="blog-video" aria-label="Video dal blog">
		<div class="blog-video__media">
			<div class="blog-video__video-wrap">
				<!-- Sostituire con <video> o <iframe> reale -->
				<div class="media-placeholder dark"><span>Video</span></div>
			</div>
			<a href="/blog" class="blog-video__blog-link">← Pagina al blog</a>
		</div>
		<div class="blog-video__content reveal">
			<p class="blog-video__quote"><?php echo esc_html( $acf_blog['blog_citazione'] ?? '' ); ?></p>
			<a href="/blog" class="blog-video__scopri">Scopri <span aria-hidden="true">›</span></a>
		</div>
	</section>

	<!-- ═══════════════════════════════════════════════
	     ATTIVITÀ — 3 card con hover overlay
	     Per Aziende | Self | Gruppi
	═══════════════════════════════════════════════ -->
	<?php
	$img_aziende = $acf_attivita['attivita_aziende_img'] ?? null;
	$img_self    = $acf_attivita['attivita_self_img']    ?? null;
	$img_gruppi  = $acf_attivita['attivita_gruppi_img']  ?? null;
	?>
	<section class="attivita" id="attivita" aria-label="Le attività">
		<div class="attivita__grid">

			<!-- Card: Per Aziende -->
			<div class="attivita__card attivita__card--dark" tabindex="0">
				<div class="attivita__card-bg">
					<?php if ( $img_aziende ) : ?>
						<img src="<?php echo esc_url( $img_aziende['url'] ); ?>" alt="<?php echo esc_attr( $img_aziende['alt'] ); ?>">
					<?php else : ?>
						<div class="media-placeholder dark"></div>
					<?php endif; ?>
				</div>
				<div class="attivita__card-label">
					<h3>Per Aziende</h3>
				</div>
				<div class="attivita__card-overlay">
					<h3>Per Aziende</h3>
					<p><?php echo esc_html( $acf_attivita['attivita_aziende_testo'] ?? '' ); ?></p>
					<a href="#contatti" class="btn btn--white">Scopri <span aria-hidden="true">›</span></a>
				</div>
			</div>

			<!-- Card: Self -->
			<div class="attivita__card attivita__card--light" tabindex="0">
				<div class="attivita__card-bg">
					<?php if ( $img_self ) : ?>
						<img src="<?php echo esc_url( $img_self['url'] ); ?>" alt="<?php echo esc_attr( $img_self['alt'] ); ?>">
					<?php else : ?>
						<div class="media-placeholder light"></div>
					<?php endif; ?>
				</div>
				<div class="attivita__card-label">
					<h3>Self</h3>
				</div>
				<div class="attivita__card-overlay">
					<h3>Self</h3>
					<p><?php echo esc_html( $acf_attivita['attivita_self_testo'] ?? '' ); ?></p>
					<a href="#contatti" class="btn btn--dark">Scopri <span aria-hidden="true">›</span></a>
				</div>
			</div>

			<!-- Card: Gruppi -->
			<div class="attivita__card attivita__card--dark" tabindex="0">
				<div class="attivita__card-bg">
					<?php if ( $img_gruppi ) : ?>
						<img src="<?php echo esc_url( $img_gruppi['url'] ); ?>" alt="<?php echo esc_attr( $img_gruppi['alt'] ); ?>">
					<?php else : ?>
						<div class="media-placeholder dark"></div>
					<?php endif; ?>
				</div>
				<div class="attivita__card-label">
					<h3>Gruppi</h3>
				</div>
				<div class="attivita__card-overlay">
					<h3>Gruppi</h3>
					<p><?php echo esc_html( $acf_attivita['attivita_gruppi_testo'] ?? '' ); ?></p>
					<a href="#contatti" class="btn btn--white">Scopri <span aria-hidden="true">›</span></a>
				</div>
			</div>

		</div>
	</section>

	<!-- ═══════════════════════════════════════════════
	     CTA — "Costruiamo il tuo percorso insieme"
	═══════════════════════════════════════════════ -->
	<section class="cta-section" aria-label="Call to action">
		<div class="cta-section__inner reveal">
			<p class="cta-section__pretitle">Costruiamo il tuo percorso</p>
			<p class="cta-section__script"><em>insieme</em><span class="cta-section__arrow" aria-hidden="true"> →</span></p>
			<a href="#contatti" class="cta-section__btn">Iniziamo</a>
		</div>
	</section>

	<!-- ═══════════════════════════════════════════════
	     CONTACT FORM
	     Form AJAX custom, stilizzato in coerenza col sito
	═══════════════════════════════════════════════ -->
	<section class="contact-section" id="contatti" aria-label="Modulo di contatto">
		<div class="contact-section__inner">
			<div class="contact-section__header reveal">
				<h2 class="contact-section__title">Scrivimi</h2>
				<p class="contact-section__sub">Compila il modulo e ti risponderò al più presto.</p>
			</div>

			<form class="contact-form" id="in3c-contact-form" novalidate aria-label="Modulo contatti">
				<div class="contact-form__row">
					<div class="contact-form__field">
						<label for="cf-nome">Nome <span aria-hidden="true">*</span></label>
						<input type="text" id="cf-nome" name="nome" required autocomplete="given-name" placeholder="Il tuo nome">
					</div>
					<div class="contact-form__field">
						<label for="cf-email">Email <span aria-hidden="true">*</span></label>
						<input type="email" id="cf-email" name="email" required autocomplete="email" placeholder="La tua email">
					</div>
				</div>
				<div class="contact-form__field">
					<label for="cf-telefono">Telefono <span class="optional">(opzionale)</span></label>
					<input type="tel" id="cf-telefono" name="telefono" autocomplete="tel" placeholder="+39 000 0000000">
				</div>
				<div class="contact-form__field">
					<label for="cf-messaggio">Messaggio <span aria-hidden="true">*</span></label>
					<textarea id="cf-messaggio" name="messaggio" required rows="6" placeholder="Raccontami di te e di cosa stai cercando..."></textarea>
				</div>
				<div class="contact-form__footer">
					<button type="submit" class="contact-form__submit">
						<span class="btn-label">Invia il messaggio</span>
						<span class="btn-loading" aria-hidden="true">Invio in corso…</span>
					</button>
					<div class="contact-form__feedback" role="alert" aria-live="polite"></div>
				</div>
			</form>
		</div>
	</section>

</main><!-- /#main -->

<?php get_footer(); ?>
