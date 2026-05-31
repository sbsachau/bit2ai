<?php
/**
 * bit2ai Theme — page-datenschutz.php
 * Template Name: Datenschutz
 *
 * Shows WP editor content if set, otherwise falls back to hardcoded default.
 */

get_header();

$custom_content = '';
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        $custom_content = get_the_content();
    }
}
?>

<main id="main-content">

    <section class="page-hero page-hero--small section--dark-dot">
        <div class="container">
            <h1>Datenschutzerklärung</h1>
        </div>
    </section>

    <section class="section section--light legal-page">
        <div class="container legal-page__content">
            <?php if ( ! empty( trim( $custom_content ) ) ) : ?>
                <?php echo apply_filters( 'the_content', $custom_content ); ?>
            <?php else : ?>
                <div class="legal-page__notice">
                    <strong>Hinweis:</strong> [VOR LIVEGANG VON ANWALT PRÜFEN LASSEN]
                </div>

                <h2>1. Verantwortlicher</h2>
                <p>
                    Sajib Chaudhury<br>
                    [ADRESSE EINTRAGEN]<br>
                    E-Mail: <a href="mailto:info@bit2ai.de">info@bit2ai.de</a>
                </p>

                <h2>2. Datenerhebung auf dieser Website</h2>
                <h3>Kontaktformular</h3>
                <p>Wenn Sie uns per Kontaktformular eine Anfrage zukommen lassen, werden Ihre Angaben zwecks Bearbeitung der Anfrage bei uns gespeichert. Rechtsgrundlage: Art. 6 Abs. 1 lit. b und f DSGVO.</p>

                <h3>Server-Log-Dateien</h3>
                <p>Der Provider erhebt automatisch Informationen in Server-Log-Dateien: Browsertyp, Betriebssystem, Referrer-URL, IP-Adresse. Rechtsgrundlage: Art. 6 Abs. 1 lit. f DSGVO.</p>

                <h2>3. Cookies</h2>
                <p>Diese Website verwendet ausschließlich technisch notwendige Cookies (§ 25 Abs. 2 TTDSG).</p>

                <h2>4. Ihre Rechte</h2>
                <p>
                    Sie haben das Recht auf Auskunft (Art. 15), Berichtigung (Art. 16), Löschung (Art. 17),
                    Einschränkung (Art. 18) und Datenübertragbarkeit (Art. 20 DSGVO).<br>
                    Kontakt: <a href="mailto:info@bit2ai.de">info@bit2ai.de</a>
                </p>

                <h2>5. Beschwerderecht</h2>
                <p>Sie haben das Recht, sich bei einer Datenschutz-Aufsichtsbehörde zu beschweren.</p>

                <h2>6. Hosting</h2>
                <p>
                    Hosting durch all-inkl.com, Server in Deutschland.<br>
                    <a href="https://all-inkl.com/datenschutzinformationen/" rel="noopener noreferrer" target="_blank">https://all-inkl.com/datenschutzinformationen/</a>
                </p>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
