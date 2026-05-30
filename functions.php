<?php
/**
 * bit2ai Theme — functions.php
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ============================================================
// Theme Support
// ============================================================
function bit2ai_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ] );

    register_nav_menus( [
        'primary' => __( 'Hauptnavigation', 'bit2ai-theme' ),
        'footer'  => __( 'Footer Navigation', 'bit2ai-theme' ),
    ] );
}
add_action( 'after_setup_theme', 'bit2ai_setup' );

// ============================================================
// Enqueue Styles & Scripts
// ============================================================
function bit2ai_enqueue_assets() {
    // Google Fonts — IBM Plex Sans + IBM Plex Mono
    wp_enqueue_style(
        'google-fonts-ibm-plex',
        'https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@300;400&family=IBM+Plex+Sans:wght@300;400;500;600&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'bit2ai-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [ 'google-fonts-ibm-plex' ],
        '1.0.0'
    );

    // Main JavaScript (deferred)
    wp_enqueue_script(
        'bit2ai-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        '1.0.0',
        [ 'strategy' => 'defer', 'in_footer' => true ]
    );
}
add_action( 'wp_enqueue_scripts', 'bit2ai_enqueue_assets' );

// ============================================================
// Remove default WP emoji scripts / styles
// ============================================================
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Remove block library CSS if not using Gutenberg blocks on frontend
add_action( 'wp_enqueue_scripts', function () {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'global-styles' );
}, 20 );

// ============================================================
// Contact Form — handle submission
// ============================================================
function bit2ai_handle_contact_form() {
    if (
        ! isset( $_POST['bit2ai_contact_nonce'] ) ||
        ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bit2ai_contact_nonce'] ) ), 'bit2ai_contact' )
    ) {
        return;
    }

    // Honeypot check
    if ( ! empty( $_POST['website'] ) ) {
        return;
    }

    $vorname   = sanitize_text_field( wp_unslash( $_POST['vorname'] ?? '' ) );
    $nachname  = sanitize_text_field( wp_unslash( $_POST['nachname'] ?? '' ) );
    $email     = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
    $nachricht = sanitize_textarea_field( wp_unslash( $_POST['nachricht'] ?? '' ) );

    if ( empty( $vorname ) || empty( $email ) || empty( $nachricht ) ) {
        wp_safe_redirect( add_query_arg( 'kontakt', 'fehler', wp_get_referer() ) );
        exit;
    }

    if ( ! is_email( $email ) ) {
        wp_safe_redirect( add_query_arg( 'kontakt', 'fehler', wp_get_referer() ) );
        exit;
    }

    $to      = 'info@bit2ai.de';
    $subject = 'Neue Kontaktanfrage von ' . $vorname . ' ' . $nachname;
    $message = "Name: {$vorname} {$nachname}\n";
    $message .= "E-Mail: {$email}\n\n";
    $message .= "Nachricht:\n{$nachricht}";

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $email,
    ];

    wp_mail( $to, $subject, $message, $headers );

    wp_safe_redirect( add_query_arg( 'kontakt', 'success', wp_get_referer() ) );
    exit;
}
add_action( 'admin_post_nopriv_bit2ai_contact', 'bit2ai_handle_contact_form' );
add_action( 'admin_post_bit2ai_contact', 'bit2ai_handle_contact_form' );

// ============================================================
// WPForms Lite
// NOTE: To install WPForms Lite manually:
//   Dashboard → Plugins → Add New → search "WPForms Lite" → Install & Activate
//   Then create a "Simple Contact Form" and embed with [wpforms id="X"]
// The contact page uses a pure HTML/PHP form as fallback — no plugin required.
// ============================================================
