<?php get_header(); ?>

<main class="site-main" id="main">

	<!-- ═══════════════════════════════════════════════
	     HERO
	     Split: sinistra video hero / destra tagline
	═══════════════════════════════════════════════ -->
	<section class="hero" id="home" aria-label="Hero">
		<div class="hero__media">
			<?php
			$uploads   = wp_upload_dir();
			$video_url = trailingslashit( $uploads['baseurl'] ) . 'video_hero.mp4';
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
			<!-- Sostituire src con il percorso della foto reale -->
			<img
				src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/foto-coach.jpg' ); ?>"
				alt="Coach"
				class="about__photo-img"
				onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
			>
			<div class="about__photo-placeholder" style="display:none;">
				<span>Foto Coach</span>
			</div>
		</div>

		<div class="about__blocks">

			<div class="about__block reveal">
				<div class="about__accent-bar"></div>
				<div class="about__block-content">
					<h2 class="about__block-title">Un po' di me</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
			</div>

			<div class="about__block reveal">
				<div class="about__accent-bar"></div>
				<div class="about__block-content">
					<h3 class="about__block-title about__block-title--sm">Cosa faccio</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
			</div>

			<div class="about__block reveal">
				<div class="about__accent-bar"></div>
				<div class="about__block-content">
					<h3 class="about__block-title about__block-title--sm">(A chi?)</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
		<div class="video-banner__text reveal">
			<p class="video-banner__quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
		</div>
		<div class="video-banner__media">
			<!-- Sostituire con immagine/video reale -->
			<div class="media-placeholder dark">
				<span>Video / Immagine</span>
			</div>
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

			<!-- Punto 1 -->
			<div class="manifesto__item" tabindex="0" role="article">
				<div class="manifesto__default">
					<span class="manifesto__number" aria-hidden="true">1.</span>
					<h3 class="manifesto__item-title">Chiarezza sulla visione</h3>
					<p class="manifesto__item-intro">Definire dove vuoi portare il tuo business.</p>
				</div>
				<div class="manifesto__hover-layer" aria-hidden="true">
					<div class="manifesto__hover-photo">
						<div class="media-placeholder light"><span>Foto</span></div>
					</div>
					<div class="manifesto__hover-text">
						<span class="manifesto__number">1.</span>
						<h3 class="manifesto__item-title">Chiarezza sulla visione</h3>
						<p>Definire dove vuoi portare il tuo business: obiettivi, valori, stile di vita desiderato e impatto che vuoi creare.</p>
					</div>
				</div>
			</div>

			<!-- Punto 2 -->
			<div class="manifesto__item" tabindex="0" role="article">
				<div class="manifesto__default">
					<span class="manifesto__number" aria-hidden="true">2.</span>
					<h3 class="manifesto__item-title">Piano d'azione</h3>
					<p class="manifesto__item-intro">Tradurre la strategia in azioni concrete.</p>
				</div>
				<div class="manifesto__hover-layer" aria-hidden="true">
					<div class="manifesto__hover-photo">
						<div class="media-placeholder light"><span>Foto</span></div>
					</div>
					<div class="manifesto__hover-text">
						<span class="manifesto__number">2.</span>
						<h3 class="manifesto__item-title">Piano d'azione</h3>
						<p>Tradurre la strategia in azioni concrete, con step, tempistiche e obiettivi misurabili.</p>
					</div>
				</div>
			</div>

			<!-- Punto 3 -->
			<div class="manifesto__item" tabindex="0" role="article">
				<div class="manifesto__default">
					<span class="manifesto__number" aria-hidden="true">3.</span>
					<h3 class="manifesto__item-title">Monitoraggio e ottimizzazione</h3>
					<p class="manifesto__item-intro">Analizzare i risultati e migliorare continuamente.</p>
				</div>
				<div class="manifesto__hover-layer" aria-hidden="true">
					<div class="manifesto__hover-photo">
						<div class="media-placeholder light"><span>Foto</span></div>
					</div>
					<div class="manifesto__hover-text">
						<span class="manifesto__number">3.</span>
						<h3 class="manifesto__item-title">Monitoraggio e ottimizzazione</h3>
						<p>Analizzare i risultati, capire cosa funziona e migliorare continuamente la strategia.</p>
					</div>
				</div>
			</div>

			<!-- Punto 4 -->
			<div class="manifesto__item" tabindex="0" role="article">
				<div class="manifesto__default">
					<span class="manifesto__number" aria-hidden="true">4.</span>
					<h3 class="manifesto__item-title">Espansione e crescita</h3>
					<p class="manifesto__item-intro">Scalare il business al prossimo livello.</p>
				</div>
				<div class="manifesto__hover-layer" aria-hidden="true">
					<div class="manifesto__hover-photo">
						<div class="media-placeholder light"><span>Foto</span></div>
					</div>
					<div class="manifesto__hover-text">
						<span class="manifesto__number">4.</span>
						<h3 class="manifesto__item-title">Espansione e crescita</h3>
						<p>Scalare il business, consolidare i risultati e preparare il prossimo livello di sviluppo.</p>
					</div>
				</div>
			</div>

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
			<p class="blog-video__quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
			<a href="/blog" class="blog-video__scopri">Scopri <span aria-hidden="true">›</span></a>
		</div>
	</section>

	<!-- ═══════════════════════════════════════════════
	     ATTIVITÀ — 3 card con hover overlay
	     Per Aziende | Self | Gruppi
	═══════════════════════════════════════════════ -->
	<section class="attivita" id="attivita" aria-label="Le attività">
		<div class="attivita__grid">

			<!-- Card: Per Aziende -->
			<div class="attivita__card attivita__card--dark" tabindex="0">
				<div class="attivita__card-bg">
					<div class="media-placeholder dark"></div>
				</div>
				<div class="attivita__card-label">
					<h3>Per Aziende</h3>
				</div>
				<div class="attivita__card-overlay">
					<h3>Per Aziende</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<a href="#contatti" class="btn btn--white">Scopri <span aria-hidden="true">›</span></a>
				</div>
			</div>

			<!-- Card: Self -->
			<div class="attivita__card attivita__card--light" tabindex="0">
				<div class="attivita__card-bg">
					<div class="media-placeholder light"></div>
				</div>
				<div class="attivita__card-label">
					<h3>Self</h3>
				</div>
				<div class="attivita__card-overlay">
					<h3>Self</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<a href="#contatti" class="btn btn--dark">Scopri <span aria-hidden="true">›</span></a>
				</div>
			</div>

			<!-- Card: Gruppi -->
			<div class="attivita__card attivita__card--dark" tabindex="0">
				<div class="attivita__card-bg">
					<div class="media-placeholder dark"></div>
				</div>
				<div class="attivita__card-label">
					<h3>Gruppi</h3>
				</div>
				<div class="attivita__card-overlay">
					<h3>Gruppi</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
			<p class="cta-section__note">Pulsante a contact form e/o contatti</p>
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
