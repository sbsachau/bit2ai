<?php
/**
 * bit2ai Theme — functions.php
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Version: 1.0.2

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

    // style.css — CSS reset, variables (:root), global base styles
    wp_enqueue_style(
        'bit2ai-style',
        get_stylesheet_uri(),
        [ 'google-fonts-ibm-plex' ],
        '1.0.0'
    );

    // Main stylesheet — all component/layout styles
    wp_enqueue_style(
        'bit2ai-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [ 'bit2ai-style' ],
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

// Remove block library and global-styles CSS
// Priority 100 ensures this runs after WordPress registers everything
add_action( 'wp_enqueue_scripts', function () {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'classic-theme-styles' );
    wp_deregister_style( 'global-styles' );
}, 100 );

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
// Theme Activation Setup — auto-create pages, menus, front page
// Runs once when the theme is activated. Safe to re-run (checks
// for existing slugs before creating).
// ============================================================
function bit2ai_run_setup() {
    // Pages: [ 'Title', 'slug', 'Template Name' or '' ]
    $pages = [
        [ 'Startseite',      '',             '' ],          // homepage — no template needed
        [ 'Leistungen',      'leistungen',   'Leistungen' ],
        [ 'Über mich',       'ueber-mich',   'Über mich' ],
        [ 'Kontakt',         'kontakt',      'Kontakt' ],
        [ 'Impressum',       'impressum',    'Impressum' ],
        [ 'Datenschutz',     'datenschutz',  'Datenschutz' ],
    ];

    $front_page_id = 0;

    foreach ( $pages as $page_data ) {
        list( $title, $slug, $template ) = $page_data;

        // Skip if a page with this slug already exists
        $existing = $slug
            ? get_page_by_path( $slug, OBJECT, 'page' )
            : get_page_by_path( 'startseite', OBJECT, 'page' );

        if ( $existing ) {
            if ( $slug === '' ) {
                $front_page_id = $existing->ID;
            }
            continue;
        }

        $page_slug = $slug ?: 'startseite';

        $page_id = wp_insert_post( [
            'post_title'   => $title,
            'post_name'    => $page_slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ] );

        if ( $page_id && ! is_wp_error( $page_id ) ) {
            if ( $template ) {
                // Map display name to filename
                $template_map = [
                    'Leistungen'  => 'page-leistungen.php',
                    'Über mich'   => 'page-ueber-mich.php',
                    'Kontakt'     => 'page-kontakt.php',
                    'Impressum'   => 'page-impressum.php',
                    'Datenschutz' => 'page-datenschutz.php',
                ];
                if ( isset( $template_map[ $template ] ) ) {
                    update_post_meta( $page_id, '_wp_page_template', $template_map[ $template ] );
                }
            }

            if ( $slug === '' ) {
                $front_page_id = $page_id;
            }
        }
    }

    // Set static front page
    if ( $front_page_id ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id );
    }

    // Set pretty permalinks (post name)
    update_option( 'permalink_structure', '/%postname%/' );
    flush_rewrite_rules();

    // Create Primary menu
    $primary_menu_id = wp_create_nav_menu( 'Hauptnavigation' );
    if ( ! is_wp_error( $primary_menu_id ) ) {
        $primary_items = [ 'Leistungen' => 'leistungen', 'Über mich' => 'ueber-mich' ];
        foreach ( $primary_items as $label => $slug ) {
            $page = get_page_by_path( $slug, OBJECT, 'page' );
            if ( $page ) {
                wp_update_nav_menu_item( $primary_menu_id, 0, [
                    'menu-item-title'     => $label,
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page->ID,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ] );
            }
        }
        $locations = get_theme_mod( 'nav_menu_locations', [] );
        $locations['primary'] = $primary_menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    // Create Footer menu
    $footer_menu_id = wp_create_nav_menu( 'Footer Navigation' );
    if ( ! is_wp_error( $footer_menu_id ) ) {
        $footer_items = [
            'Leistungen'  => 'leistungen',
            'Über mich'   => 'ueber-mich',
            'Kontakt'     => 'kontakt',
            'Impressum'   => 'impressum',
            'Datenschutz' => 'datenschutz',
        ];
        foreach ( $footer_items as $label => $slug ) {
            $page = get_page_by_path( $slug, OBJECT, 'page' );
            if ( $page ) {
                wp_update_nav_menu_item( $footer_menu_id, 0, [
                    'menu-item-title'     => $label,
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page->ID,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ] );
            }
        }
        $locations = get_theme_mod( 'nav_menu_locations', [] );
        $locations['footer'] = $footer_menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    // Populate legal page content
    bit2ai_populate_legal_pages();

    // Mark setup as done
    update_option( 'bit2ai_setup_done', '1' );
}
add_action( 'after_switch_theme', 'bit2ai_run_setup' );

// ============================================================
// Populate Impressum + Datenschutz content if empty
// Called on activation and also on admin_init as a safety net
// ============================================================
function bit2ai_populate_legal_pages() {
    $legal = [
        'impressum' => [
            'title'   => 'Impressum',
            'content' => '<!-- wp:heading {"level":2} --><h2>Angaben gemäß § 5 TMG</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Sajib Chaudhury<br>[STRASSE UND HAUSNUMMER EINTRAGEN]<br>[PLZ ORT EINTRAGEN]<br>Deutschland</p><!-- /wp:paragraph --><!-- wp:heading {"level":2} --><h2>Kontakt</h2><!-- /wp:heading --><!-- wp:paragraph --><p>E-Mail: <a href="mailto:info@bit2ai.de">info@bit2ai.de</a><br>Website: <a href="https://bit2ai.de">bit2ai.de</a></p><!-- /wp:paragraph --><!-- wp:heading {"level":2} --><h2>Umsatzsteuer</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Kleinunternehmer gemäß § 19 UStG. Gemäß § 19 Abs. 1 UStG wird keine Umsatzsteuer berechnet.</p><!-- /wp:paragraph --><!-- wp:heading {"level":2} --><h2>Verantwortlich für den Inhalt nach § 18 Abs. 2 MStV</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Sajib Chaudhury<br>[ADRESSE EINTRAGEN]</p><!-- /wp:paragraph --><!-- wp:heading {"level":2} --><h2>Streitschlichtung</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung bereit: <a href="https://ec.europa.eu/consumers/odr/" target="_blank" rel="noopener noreferrer">https://ec.europa.eu/consumers/odr/</a></p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p><!-- /wp:paragraph --><!-- wp:heading {"level":2} --><h2>Haftung für Inhalte</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Als Diensteanbieter sind wir gemäß § 7 Abs. 1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich.</p><!-- /wp:paragraph --><!-- wp:heading {"level":2} --><h2>Urheberrecht</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht.</p><!-- /wp:paragraph -->',
        ],
        'datenschutz' => [
            'title'   => 'Datenschutz',
            'content' => '<!-- wp:paragraph --><p><strong>Hinweis:</strong> [VOR LIVEGANG VON ANWALT PRÜFEN LASSEN]</p><!-- /wp:paragraph --><!-- wp:heading {"level":2} --><h2>1. Verantwortlicher</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Sajib Chaudhury<br>[ADRESSE EINTRAGEN]<br>E-Mail: <a href="mailto:info@bit2ai.de">info@bit2ai.de</a></p><!-- /wp:paragraph --><!-- wp:heading {"level":2} --><h2>2. Datenerhebung auf dieser Website</h2><!-- /wp:heading --><!-- wp:heading {"level":3} --><h3>Kontaktformular</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Wenn Sie uns per Kontaktformular eine Anfrage zukommen lassen, werden Ihre Angaben zwecks Bearbeitung der Anfrage bei uns gespeichert. Rechtsgrundlage: Art. 6 Abs. 1 lit. b und f DSGVO.</p><!-- /wp:paragraph --><!-- wp:heading {"level":3} --><h3>Server-Log-Dateien</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Der Provider erhebt automatisch Informationen in Server-Log-Dateien: Browsertyp, Betriebssystem, Referrer-URL, IP-Adresse. Rechtsgrundlage: Art. 6 Abs. 1 lit. f DSGVO.</p><!-- /wp:paragraph --><!-- wp:heading {"level":2} --><h2>3. Cookies</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Diese Website verwendet ausschließlich technisch notwendige Cookies (§ 25 Abs. 2 TTDSG).</p><!-- /wp:paragraph --><!-- wp:heading {"level":2} --><h2>4. Ihre Rechte</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Sie haben das Recht auf Auskunft (Art. 15), Berichtigung (Art. 16), Löschung (Art. 17), Einschränkung (Art. 18) und Datenübertragbarkeit (Art. 20 DSGVO). Kontakt: <a href="mailto:info@bit2ai.de">info@bit2ai.de</a></p><!-- /wp:paragraph --><!-- wp:heading {"level":2} --><h2>5. Hosting</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Hosting durch all-inkl.com, Server in Deutschland. <a href="https://all-inkl.com/datenschutzinformationen/" target="_blank" rel="noopener noreferrer">Datenschutzinfos all-inkl.com</a></p><!-- /wp:paragraph -->',
        ],
    ];

    foreach ( $legal as $slug => $data ) {
        $page = get_page_by_path( $slug, OBJECT, 'page' );
        if ( $page && empty( trim( $page->post_content ) ) ) {
            wp_update_post( [
                'ID'           => $page->ID,
                'post_content' => $data['content'],
            ] );
        }
    }
}

// Run on every admin load — only updates pages that are still empty
add_action( 'admin_init', 'bit2ai_populate_legal_pages' );

// ============================================================
// WPForms Lite
// NOTE: To install WPForms Lite manually:
//   Dashboard → Plugins → Add New → search "WPForms Lite" → Install & Activate
//   Then create a "Simple Contact Form" and embed with [wpforms id="X"]
// The contact page uses a pure HTML/PHP form as fallback — no plugin required.
// ============================================================
