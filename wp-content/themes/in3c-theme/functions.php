<?php
defined( 'ABSPATH' ) || exit;

// ═══════════════════════════════════════════════════════
// Theme Support & Setup
// ═══════════════════════════════════════════════════════
function in3c_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',
	] );

	register_nav_menus( [
		'primary' => __( 'Menu Principale', 'in3c-theme' ),
	] );
}
add_action( 'after_setup_theme', 'in3c_theme_setup' );

// ═══════════════════════════════════════════════════════
// Enqueue Assets
// ═══════════════════════════════════════════════════════
function in3c_enqueue_assets() {
	// Google Fonts: Bebas Neue + Montserrat + Dancing Script
	wp_enqueue_style(
		'in3c-fonts',
		'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Dancing+Script:wght@700&display=swap',
		[],
		null
	);

	// Main stylesheet
	wp_enqueue_style(
		'in3c-main',
		get_template_directory_uri() . '/assets/css/main.css',
		[ 'in3c-fonts' ],
		'1.0.0'
	);

	// Main script (footer, no jQuery)
	wp_enqueue_script(
		'in3c-main',
		get_template_directory_uri() . '/assets/js/main.js',
		[],
		'1.0.0',
		true
	);

	// Pass AJAX data to JS
	wp_localize_script( 'in3c-main', 'in3cAjax', [
		'url'   => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'in3c_contact_nonce' ),
	] );
}
add_action( 'wp_enqueue_scripts', 'in3c_enqueue_assets' );

// ═══════════════════════════════════════════════════════
// Contact Form — AJAX Handler
// ═══════════════════════════════════════════════════════
function in3c_handle_contact() {
	check_ajax_referer( 'in3c_contact_nonce', 'nonce' );

	$nome      = sanitize_text_field( $_POST['nome']      ?? '' );
	$email     = sanitize_email( $_POST['email']          ?? '' );
	$telefono  = sanitize_text_field( $_POST['telefono']  ?? '' );
	$messaggio = sanitize_textarea_field( $_POST['messaggio'] ?? '' );

	if ( ! $nome || ! $email || ! is_email( $email ) || ! $messaggio ) {
		wp_send_json_error( [ 'msg' => 'Compila tutti i campi obbligatori.' ] );
	}

	$to      = get_option( 'admin_email' );
	$subject = "[in3c] Nuovo messaggio da {$nome}";
	$body    = "Nome: {$nome}\nEmail: {$email}\nTelefono: {$telefono}\n\nMessaggio:\n{$messaggio}";
	$headers = [
		'Content-Type: text/plain; charset=UTF-8',
		"Reply-To: {$nome} <{$email}>",
	];

	if ( wp_mail( $to, $subject, $body, $headers ) ) {
		wp_send_json_success( [ 'msg' => 'Grazie! Ti contatterò al più presto.' ] );
	} else {
		wp_send_json_error( [ 'msg' => "Errore nell'invio. Riprova o scrivimi direttamente." ] );
	}
}
add_action( 'wp_ajax_in3c_contact',        'in3c_handle_contact' );
add_action( 'wp_ajax_nopriv_in3c_contact', 'in3c_handle_contact' );
