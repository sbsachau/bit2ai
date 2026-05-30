<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
    <div class="site-header__inner container">

        <!-- Logo -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="bit2ai – Zur Startseite">
            <span class="logo-bit">bit</span><span class="logo-2">2</span><span class="logo-ai">ai</span>
        </a>

        <!-- Primary Navigation -->
        <nav class="site-nav" id="site-nav" aria-label="Hauptnavigation">
            <?php
            wp_nav_menu( [
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'site-nav__list',
                'fallback_cb'    => 'bit2ai_fallback_nav',
            ] );
            ?>
            <a href="<?php echo esc_url( home_url( '/kontakt' ) ); ?>" class="btn btn--primary site-nav__cta">
                Kontakt
            </a>
        </nav>

        <!-- Hamburger toggle (mobile) -->
        <button
            class="hamburger"
            id="hamburger-btn"
            aria-label="Navigation öffnen"
            aria-expanded="false"
            aria-controls="site-nav"
        >
            <span class="hamburger__bar"></span>
            <span class="hamburger__bar"></span>
            <span class="hamburger__bar"></span>
        </button>

    </div>
</header>

<?php
function bit2ai_fallback_nav() {
    echo '<ul class="site-nav__list">';
    echo '<li><a href="' . esc_url( home_url( '/leistungen' ) ) . '">Leistungen</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/ueber-mich' ) ) . '">Über mich</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/kontakt' ) ) . '">Kontakt</a></li>';
    echo '</ul>';
}
?>
