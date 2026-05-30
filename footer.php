<footer class="site-footer">
    <div class="site-footer__main container">

        <!-- Brand column -->
        <div class="site-footer__brand">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="bit2ai">
                <span class="logo-bit">bit</span><span class="logo-2">2</span><span class="logo-ai">ai</span>
            </a>
            <p class="site-footer__claim">From bit to AI</p>
            <p class="site-footer__tagline">Web · Apps · AI · Automatisierung</p>
        </div>

        <!-- Nav column -->
        <nav class="site-footer__nav" aria-label="Footer Navigation">
            <?php
            wp_nav_menu( [
                'theme_location' => 'footer',
                'container'      => false,
                'menu_class'     => 'site-footer__nav-list',
                'fallback_cb'    => 'bit2ai_fallback_footer_nav',
            ] );
            ?>
        </nav>

        <!-- Contact column -->
        <div class="site-footer__contact">
            <p class="site-footer__contact-label">Kontakt</p>
            <a href="mailto:info@bit2ai.de" class="site-footer__email">info@bit2ai.de</a>
        </div>

    </div>

    <div class="site-footer__bottom">
        <div class="container">
            <p>
                &copy; <?php echo esc_html( date( 'Y' ) ); ?> bit2ai &middot; Alle Rechte vorbehalten
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="<?php echo esc_url( home_url( '/impressum' ) ); ?>">Impressum</a>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="<?php echo esc_url( home_url( '/datenschutz' ) ); ?>">Datenschutz</a>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

<?php
function bit2ai_fallback_footer_nav() {
    $links = [
        'Leistungen' => '/leistungen',
        'Über mich'  => '/ueber-mich',
        'Kontakt'    => '/kontakt',
        'Impressum'  => '/impressum',
        'Datenschutz'=> '/datenschutz',
    ];
    echo '<ul class="site-footer__nav-list">';
    foreach ( $links as $label => $path ) {
        echo '<li><a href="' . esc_url( home_url( $path ) ) . '">' . esc_html( $label ) . '</a></li>';
    }
    echo '</ul>';
}
?>
